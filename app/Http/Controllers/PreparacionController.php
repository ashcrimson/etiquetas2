<?php

namespace App\Http\Controllers;

use App\DataTables\PreparacionDataTable;
use App\DataTables\Scopes\ScopePreparacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePreparacionRequest;
use App\Http\Requests\UpdatePreparacionRequest;
use App\Models\Empleado;
use App\Models\Paciente;
use App\Models\Preparacion;
use App\Models\PreparacionEstado;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class PreparacionController extends AppBaseController
{
    /**
     * Display a listing of the Preparacion.
     *
     * @param PreparacionDataTable $preparacionDataTable
     * @return Response
     */
    public function index(PreparacionDataTable $preparacionDataTable,Request $request)
    {
        $scope = new ScopePreparacionDataTable();

        $scope->del = $request->del ?? null;
        $scope->al = $request->al ?? null;

        $preparacionDataTable->addScope($scope);

        return $preparacionDataTable->render('preparacions.index');
    }

    /**
     * Show the form for creating a new Preparacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('preparacions.create');
    }

    /**
     * Store a newly created Preparacion in storage.
     *
     * @param CreatePreparacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePreparacionRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->procesaStore($request);

        } catch (\Exception $exception) {
            DB::rollBack();

            throw new \Exception($exception);
        }

        DB::commit();

        Flash::success('Preparacion saved successfully.');

        return redirect(route('preparacions.index'));
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
            'profesional_a_cargo' => Empleado::find($request->responsable_id)->nombre_completo,
            'paciente_id' => $paciente->id,
//            'estado_id' => PreparacionEstado::CONFIRMADO,
        ]);


        /** @var Preparacion $preparacion */
        $preparacion = Preparacion::create($request->all());


        return $preparacion;

//        dd(DB::getQueryLog());

    }


    /**
     * Display the specified Preparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Preparacion $preparacion */
        $preparacion = Preparacion::find($id);

        if (empty($preparacion)) {
            Flash::error('Preparacion not found');

            return redirect(route('preparacions.index'));
        }

        return view('preparacions.show')->with('preparacion', $preparacion);
    }

    /**
     * Show the form for editing the specified Preparacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Preparacion $preparacion */
        $preparacion = Preparacion::find($id);


        $preparacion = $this->addAttributos($preparacion);

        if (empty($preparacion)) {
            Flash::error('Preparacion not found');

            return redirect(route('preparacions.index'));
        }

        if (!$preparacion->puedeEditar()){
            Flash::error('No puede editar el registro!');

            return redirect(route('preparacions.index'));
        }

        return view('preparacions.edit')->with('preparacion', $preparacion);
    }

    /**
     * Update the specified Preparacion in storage.
     *
     * @param  int              $id
     * @param UpdatePreparacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreparacionRequest $request)
    {
        /** @var Preparacion $preparacion */
        $preparacion = Preparacion::find($id);

        if (empty($preparacion)) {
            Flash::error('Preparacion not found');

            return redirect(route('preparacions.index'));
        }

        $request->merge([
            'refrigerar' => $request->refrigerar ?? 0,
            'proteger_luz' => $request->proteger_luz ?? 0,
            'cerrada' => $request->cerrar ?? 0
        ]);

        $preparacion->fill($request->all());
        $preparacion->save();

        Flash::success('Preparacion updated successfully.');

        return redirect(route('preparacions.index'));
    }

    /**
     * Remove the specified Preparacion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Preparacion $preparacion */
        $preparacion = Preparacion::find($id);

        if (empty($preparacion)) {
            Flash::error('Preparacion not found');

            return redirect(route('preparacions.index'));
        }

        $preparacion->delete();

        Flash::success('Preparacion deleted successfully.');

        return redirect(route('preparacions.index'));
    }

    public function imprimeEtiqueta($tamanio,Preparacion $preparacion)
    {

        if ($tamanio==5){
             $print_data = "^XA
                         ^LH0,0
                         ^FO4,2
                         ^GB804,798,4
                         ^FS
                         ^FO4,2 ^GB548,52,4
                         ^FS
                         ^FO19,12
                         ^ADN,36,20
                         ^FDHospital Naval A.Nef
                         ^FS ^FO548,2 ^GB260,52,4

                         ^FS
                         ^FO611,16
                         ^ADN,36,10 ^FD1:3
                         ^FO21,70
                         ^ADN,15,15 ^FR ^FDNombre:
                         ^FS
                         ^FO321,70
                         ^ADN,15,10 ^FR ^FD".$preparacion->paciente->nombre_completo."


                         ^FS
                         ^FO21,105 ^ADN,15,15 ^FR ^FDRut:
                         ^FS
                         ^FO321,105
                         ^ADN,15,10 ^FR ^FD".$preparacion->paciente->run."

                         ^FS
                         ^FO21,140 ^ADN,15,15 ^FR ^FDFecha Adm:
                         ^FS
                         ^FO321,140
                         ^ADN,15,10 ^FR ^FD".$preparacion->fecha_admision."

                         ^FS
                         ^FO21,175 ^ADN,15,15 ^FR ^FDDroga:
                         ^FS
                         ^FO321,175
                         ^ADN,15,10 ^FR ^FD".$preparacion->droga->nombre."

                         ^FS
                         ^FO21,210 ^ADN,15,15 ^FR ^FDVol. Total:
                         ^FS
                         ^FO321,210
                         ^ADN,15,10 ^FR ^FD".$preparacion->volumen_final." ML

                         ^FS
                         ^FO21,245
                         ^ADN,25,15 ^FR ^FDEsquema:
                         ^FS
                         ^FO321,245
                         ^ADN,15,10 ^FR ^FDBortez sem

                         ^FS
                         ^FO500,245
                         ^ADN,15,15 ^FR ^FDCiclo:
                         ^FS
                         ^FO655,245
                         ^ADN,15,10 ^FR ^FD".$preparacion->ciclo."

                         ^FS
                         ^FO21,280 ^ADN,15,15 ^FR ^FDDia:
                         ^FS
                         ^FO321,280
                         ^ADN,15,10 ^FR ^FD".$preparacion->dia."

                         ^FS
                         ^FO21,315 ^ADN,15,15 ^FR ^FDFecha Elab:
                         ^FS
                         ^FO321,315
                         ^ADN,15,10 ^FR ^FD05/05/2021 (vigente 8 hrs) hasta 18 hrs

                         ^FS
                         ^FO21,350 ^ADN,15,15 ^FR ^FDProteger de Luz:
                         ^FS
                         ^FO400,350
                         ^ADN,15,10 ^FR ^FD".($preparacion->proteger_luz ? "Si" : "No")."

                         ^FS
                         ^FO21,385 ^ADN,15,15 ^FR ^FDRefrigerar:
                         ^FS
                         ^FO321,385
                         ^ADN,15,10 ^FR ^FD".($preparacion->refrigerar  ? "Si" : "No")."

                           ^FS
                         ^XZ";
        }

        if ($tamanio==10){
            $print_data = "^XA
                    ^LH0,0
                    ^FS
                    ^FO50,40
                    ^ADN,30,20
                    ^FDHospital Naval A.Nef

                    ^FS
                    ^FO600,40
                    ^ADN,30,20
                    ^FDFolio:
                    ^FS
                    ^FO750,40
                    ^ADN,30,20
                    ^FD".$preparacion->id."


                    ^FS
                    ^FO611,16
                    ^ADN,36,10 ^FD1:3
                    ^FO30,100
                    ^ADN,30,15 ^FDNOMBRE:
                    ^FS
                    ^FO290,100
                    ^ADN,30,10 ^FD".$preparacion->paciente->nombre_completo."


                    ^FS
                    ^FO30,150
                    ^ADN,30,15  ^FDRUT:
                    ^FS
                    ^FO290,150
                    ^ADN,30,10  ^FD".$preparacion->paciente->run."
                    ^FS
                    ^FO390,150
                    ^ADN,30,10  ^FD-".$preparacion->paciente->dv_run."

                    ^FS
                    ^FO30,200
                    ^ADN,30,15 ^FR ^FDFecha Val:
                    ^FS
                    ^FO290,200
                    ^ADN,30,10  ^FD".$preparacion->fecha_validez."

                    ^FS
                    ^FO30,250
                    ^ADN,30,15 ^FDDroga:
                    ^FS
                    ^FO290,250
                    ^ADN,30,10 ^FD".$preparacion->droga->nombre."

                    ^FS
                    ^FO30,300
                    ^ADN,30,15  ^FDDosis:
                    ^FS
                    ^FO290,300
                    ^ADN,30,10  ^FD".$preparacion->dosis." ML

                    ^FS
                    ^FO30,350
                    ^ADN,30,15  ^FDVol. Total:
                    ^FS
                    ^FO290,350
                    ^ADN,30,10  ^FD".$preparacion->volumen_final." ML

                    ^FS
                    ^FO30,400
                    ^ADN,30,15  ^FDEsquema:
                    ^FS
                    ^FO290,400
                    ^ADN,30,10 ^FDBortez sem

                    ^FS
                    ^FO30,450
                    ^ADN,30,15  ^FDCiclo:
                    ^FS
                    ^FO290,450
                    ^ADN,30,10 ^FD".$preparacion->ciclo."

                    ^FS
                    ^FO30,500
                    ^ADN,30,15 ^FDDia:
                    ^FS
                    ^FO290,500
                    ^ADN,30,10 ^FD".$preparacion->dia."

                    ^FS
                    ^FO30,550
                    ^ADN,30,15 ^FDFecha Elab:
                    ^FS
                    ^FO290,550
                    ^ADN,30,10 ^FD05/05/2021 (vigente 8 hrs) hasta 18 hrs

                    ^FS
                    ^FO30,600
                    ^ADN,30,15 ^FDProteger de Luz:
                    ^FS
                    ^FO420,600
                    ^ADN,30,10  ^FD".($preparacion->proteger_luz ? "Si" : "No")."

                    ^FS
                    ^FO30,650
                    ^ADN,30,15  ^FDRefrigerar:
                    ^FS
                    ^FO290,650
                    ^ADN,30,10 ^FD".($preparacion->refrigerar  ? "Si" : "No")."

                    ^FS
                    ^FO30,700
                    ^ADN,30,15  ^FDQF:
                    ^FS
                    ^FO290,700
                    ^ADN,30,10 ^FD".$preparacion->profesional_a_cargo."

                    ^FS
                    ^FO30,750
                    ^ADN,30,15  ^FDMedico:
                    ^FS
                    ^FO290,750
                    ^ADN,30,10 ^FD".$preparacion->medico->nombre_completo."


                    ^XZ";


        }





//            dd($print_data);


        try {
            $fp = pfsockopen("172.25.34.88", 9100);
            fputs($fp, $print_data);
            fclose($fp);

            echo 'Successfully Printed';
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        flash('Listo')->success();

        return redirect(route('preparacions.index'));

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

            'direccion' => $request->direccion,
            'familiar_responsable' => $request->familiar_responsable,
            'telefono' => $request->telefono,
            'telefono2' => $request->telefono2,
            'prevision_id' => $request->prevision_id,

        ]);



        return $paciente;
    }


    public function addAttributos(Preparacion $preparacion)
    {
        $preparacion->setAttribute("run" ,$preparacion->paciente->run);
        $preparacion->setAttribute("dv_run" ,$preparacion->paciente->dv_run);
        $preparacion->setAttribute("apellido_paterno" ,$preparacion->paciente->apellido_paterno);
        $preparacion->setAttribute("apellido_materno" ,$preparacion->paciente->apellido_materno);
        $preparacion->setAttribute("primer_nombre" ,$preparacion->paciente->primer_nombre);
        $preparacion->setAttribute("segundo_nombre" ,$preparacion->paciente->segundo_nombre);
        $preparacion->setAttribute("fecha_nac" ,Carbon::parse($preparacion->paciente->fecha_nac)->format('Y-m-d'));
        $preparacion->setAttribute("sexo" ,$preparacion->paciente->sexo == 'M' ? 1 : 0);

        $preparacion->setAttribute("direccion" ,$preparacion->paciente->direccion);
        $preparacion->setAttribute("familiar_responsable" ,$preparacion->paciente->familiar_responsable);
        $preparacion->setAttribute("telefono" ,$preparacion->paciente->telefono);


        if ($preparacion->fecha_admision){
            $preparacion->setAttribute("fecha_admision",Carbon::parse($preparacion->fecha_admision)->format('Y-m-d'));
        }
        if ($preparacion->fecha_validez){
            $preparacion->setAttribute("fecha_validez",Carbon::parse($preparacion->fecha_validez)->format('Y-m-d'));
        }
        if ($preparacion->fecha_elaboracion){
            $preparacion->setAttribute("fecha_elaboracion",Carbon::parse($preparacion->fecha_elaboracion)->format('Y-m-d'));
        }

      
        return $preparacion;


    }
}
