<?php

namespace App\Http\Controllers;

use App\DataTables\RemaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRemaRequest;
use App\Http\Requests\UpdateRemaRequest;
use App\Models\Paciente;
use App\Models\PacienteAtencion;
use App\Models\Rema;
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
     */
    public function store(CreateRemaRequest $request)
    {


        try {
            DB::beginTransaction();

            $this->procesaStore($request);

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        Flash::success('Rema saved successfully.');

        return redirect(route('remas.index'));
    }

    public function procesaStore(Request $request)
    {
        /**
         * @var  Paciente $paciente
         */
        $paciente = $this->creaOactualizaPaciente($request);

        $request->merge([
            'user_id' => auth()->user()->id,
            'paciente_id' => $paciente->id,
        ]);

        /** @var Rema $rema */
        $rema = Rema::create($request->all());

        $request->merge([
            'rema_id' => $rema->id,
        ]);

        $atencion = $this->creaAtencion($request);

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

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        return view('remas.edit')->with('rema', $rema);
    }

    /**
     * Update the specified Rema in storage.
     *
     * @param  int              $id
     * @param UpdateRemaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRemaRequest $request)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        $rema->fill($request->all());
        $rema->save();

        Flash::success('Rema updated successfully.');

        return redirect(route('remas.index'));
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
}
