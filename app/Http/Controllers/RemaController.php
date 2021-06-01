<?php

namespace App\Http\Controllers;

use App\DataTables\RemaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRemaRequest;
use App\Http\Requests\UpdateRemaRequest;
use App\Models\Paciente;
use App\Models\PacienteAtencion;
use App\Models\Rema;
use App\Models\RemaEstado;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class RemaController extends AppBaseController
{
    /**
     * Display a listing of the Rema.
     *
     * @param RemaDataTable $remaDataTable
     * @return Response
     */
    public function index(RemaDataTable $remaDataTable)
    {
        return $remaDataTable->render('remas.index');
    }

    /**
     * Show the form for creating a new Rema.
     *
     * @return Response
     */
    public function create()
    {
        return view('remas.create');
    }

    /**
     * Store a newly created Rema in storage.
     *
     * @param CreateRemaRequest $request
     *
     * @return Response
     * @throws \Exception
     */
    public function store(CreateRemaRequest $request)
    {


        try {
            DB::beginTransaction();

            $this->procesaStore($request);

        } catch (\Exception $exception) {
            DB::rollBack();

            throw new \Exception($exception);
        }

        DB::commit();

        Flash::success('Rema saved successfully.');

        return redirect(route('remas.index'));
    }

    public function procesaStore(Request $request)
    {

//        DB::enableQueryLog();

        /**
         * @var  Paciente $paciente
         */
        $paciente = $this->creaOactualizaPaciente($request);

        $request->merge([
            'user_id' => auth()->user()->id,
            'paciente_id' => $paciente->id,
            'hora_de_llamada' => timeToDateTime($request->hora_de_llamada),
            'hora_de_salida' => timeToDateTime($request->hora_de_salida),
            'hora_de_llegada' => timeToDateTime($request->hora_de_llegada),
            'estado_id' => RemaEstado::CREADA,
        ]);


        /** @var Rema $rema */
        $rema = Rema::create($request->all());

        $request->merge([
            'rema_id' => $rema->id,
        ]);

        $atencion = $this->creaAtencion($request);

//        dd(DB::getQueryLog());

    }

    /**
     * Display the specified Rema.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        return view('remas.show')->with('rema', $rema);
    }

    /**
     * Show the form for editing the specified Rema.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        $rema = $this->addAttributosRema($rema);


        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        return view('remas.edit')->with('rema', $rema);
    }

    /**
     * Update the specified Rema in storage.
     *
     * @param int $id
     * @param UpdateRemaRequest $request
     *
     * @return Response
     * @throws \Exception
     */
    public function update($id, UpdateRemaRequest $request)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }


        try {
            DB::beginTransaction();

            $this->procesaUpdate($request,$rema);

        } catch (\Exception $exception) {
            DB::rollBack();

            throw new \Exception($exception);
        }

        DB::commit();

        Flash::success('Rema updated successfully.');

        return redirect(route('remas.index'));
    }

    public function procesaUpdate(Request $request,Rema $rema)
    {
        //        DB::enableQueryLog();

        /**
         * @var  Paciente $paciente
         */
        $paciente = $this->creaOactualizaPaciente($request);

        $request->merge([
            'paciente_id' => $paciente->id,
            'hora_de_llamada' => timeToDateTime($request->hora_de_llamada),
            'hora_de_salida' => timeToDateTime($request->hora_de_salida),
            'hora_de_llegada' => timeToDateTime($request->hora_de_llegada),
            'estado_id' => RemaEstado::CREADA,
        ]);


        /** @var Rema $rema */
        $rema->fill($request->all());
        $rema->save();

        $atencion = $rema->atencion;

        $atencion->fill($request->all());
        $atencion->save();

        return $rema;

//        dd(DB::getQueryLog());
    }

    /**
     * Remove the specified Rema from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        $rema->delete();

        Flash::success('Rema deleted successfully.');

        return redirect(route('remas.index'));
    }

    public function creaOactualizaPaciente(Request $request)
    {
        $paciente = Paciente::updateOrCreate([
            'run' => $request->run,
            'dv_run' => $request->dv_run,

        ],[
            'run' => $request->run,
            'fecha_nac' => $request->fecha_nac,
            'dv_run' => $request->dv_run,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,

            'sexo' => $request->sexo ? 'M' : 'F',
        ]);



        return $paciente;
    }

    public function creaAtencion(Request $request)
    {
        /**
         * @var PacienteAtencion $atencion
         */
        $atencion = PacienteAtencion::create([
            'paciente_id' => $request->paciente_id,
            'rema_id' => $request->rema_id,
            'motivo_consulta' => $request->motivo_consulta,
            'clasificacion_triaje' => $request->clasificacion_triaje,
            'presion_arterial' => $request->presion_arterial,
            'frecuencia_cardiaca' => $request->frecuencia_cardiaca,
            'frecuencia_respiratoria' => $request->frecuencia_respiratoria,
            'temperatura' => $request->temperatura,
            'saturacion_oxigeno' => $request->saturacion_oxigeno,
            'atencion_enfermeria' => $request->atencion_enfermeria,
            'antecedentes_morbidos' => $request->antecedentes_morbidos,
            'alergias' => $request->alergias,
            'medicamentos_habituales' => $request->medicamentos_habituales
        ]);


        return $atencion;
    }

    public function addAttributosRema(Rema $rema)
    {



        $rema->setAttribute("run" ,$rema->paciente->run);
        $rema->setAttribute("dv_run" ,$rema->paciente->dv_run);
        $rema->setAttribute("apellido_paterno" ,$rema->paciente->apellido_paterno);
        $rema->setAttribute("apellido_materno" ,$rema->paciente->apellido_materno);
        $rema->setAttribute("primer_nombre" ,$rema->paciente->primer_nombre);
        $rema->setAttribute("segundo_nombre" ,$rema->paciente->segundo_nombre);
        $rema->setAttribute("fecha_nac" ,Carbon::parse($rema->paciente->fecha_nac)->format('Y-m-d'));
        $rema->setAttribute("sexo" ,$rema->paciente->sexo == 'M' ? 1 : 0);
//        $rema->setAttribute("sigla_grado" ,$rema->paciente->sigla_grado);
//        $rema->setAttribute("unid_rep_dot" ,$rema->paciente->unid_rep_dot);
//        $rema->setAttribute("cond_alta_dot" ,$rema->paciente->cond_alta_dot);



        $rema->setAttribute("motivo_consulta" ,$rema->atencion->motivo_consulta);
        $rema->setAttribute("clasificacion_triaje" ,$rema->atencion->clasificacion_triaje);
        $rema->setAttribute("presion_arterial" ,$rema->atencion->presion_arterial);
        $rema->setAttribute("frecuencia_cardiaca" ,$rema->atencion->frecuencia_cardiaca);
        $rema->setAttribute("frecuencia_respiratoria" ,$rema->atencion->frecuencia_respiratoria);
        $rema->setAttribute("temperatura" ,$rema->atencion->temperatura);
        $rema->setAttribute("saturacion_oxigeno" ,$rema->atencion->saturacion_oxigeno);
        $rema->setAttribute("atencion_enfermeria" ,$rema->atencion->atencion_enfermeria);
        $rema->setAttribute("antecedentes_morbidos" ,$rema->atencion->antecedentes_morbidos);
        $rema->setAttribute("alergias" ,$rema->atencion->alergias);
        $rema->setAttribute("medicamentos_habituales" ,$rema->atencion->medicamentos_habituales);

        $rema->setAttribute("hora_de_llamada" ,Carbon::parse($rema->hora_de_llamada)->format("H:i"));
        $rema->setAttribute("hora_de_salida" ,Carbon::parse($rema->hora_de_salida)->format("H:i"));
        $rema->setAttribute("hora_de_llegada" ,Carbon::parse($rema->hora_de_llegada)->format("H:i"));

        return $rema;
    }
}
