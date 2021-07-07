<?php

namespace App\Http\Controllers;

use App\DataTables\PreparacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePreparacionRequest;
use App\Http\Requests\UpdatePreparacionRequest;
use App\Models\Preparacion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreparacionController extends AppBaseController
{
    /**
     * Display a listing of the Preparacion.
     *
     * @param PreparacionDataTable $preparacionDataTable
     * @return Response
     */
    public function index(PreparacionDataTable $preparacionDataTable)
    {
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
        $input = $request->all();

        /** @var Preparacion $preparacion */
        $preparacion = Preparacion::create($input);

        Flash::success('Preparacion saved successfully.');

        return redirect(route('preparacions.index'));
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

        if (empty($preparacion)) {
            Flash::error('Preparacion not found');

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

    public function imprimeEtiqueta(Preparacion $preparacion)
    {
        $fecha = $preparacion->fecha_admision->format('d/m/Y');

        $print_data = "^XA
                    ^LH0,0
                    ^FO4,2
                    ^GB804,798,4
                    ^FS
                    ^FO4,2 ^GB548,52,4
                    ^FS ^FO19,12 ^ADN,36,20
                    ^FDHospital Naval A.Nef ^FS ^FO548,2 ^GB260,52,4

                    ^FS ^FO611,16
                    ^ADN,36,10 ^FD1:3
                    ^FO21,100 ^ADN,15,15 ^FR ^FDNombre:
                    ^FS
                    ^FO321,100
                    ^ADN,25,15 ^FR ^FD".$preparacion->paciente->nombre_completo."


                    ^FS
                    ^FO21,130 ^ADN,15,15 ^FR ^FDRut:
                    ^FS
                    ^FO321,130
                    ^ADN,25,15 ^FR ^FD".$preparacion->paciente->run."

                    ^FS
                    ^FO21,160 ^ADN,15,15 ^FR ^FDFecha Adm:
                    ^FS
                    ^FO321,160
                    ^ADN,25,15 ^FR ^FD".$fecha."

                    ^FS
                    ^FO21,190 ^ADN,15,15 ^FR ^FDDroga:
                    ^FS
                    ^FO321,190
                    ^ADN,25,15 ^FR ^FD".$preparacion->droga->nombre."

                    ^FS
                    ^FO21,220 ^ADN,15,15 ^FR ^FDVol. Total:
                    ^FS
                    ^FO321,220
                    ^ADN,25,15 ^FR ^FD".$preparacion->volumen_final." ML

                    ^FS
                    ^FO21,250
                    ^ADN,25,15 ^FR ^FDEsquema:
                    ^FS
                    ^FO231,250
                    ^ADN,25,10 ^FR ^FDBortez sem

                    ^FS
                    ^FO381,250 ^ADN,15,10 ^FR ^FDCiclo:
                    ^FS
                    ^FO461,250
                    ^ADN,15,10 ^FR ^FD2

                    ^FS
                    ^FO501,250 ^ADN,15,10 ^FR ^FDDia:
                    ^FS
                    ^FO560,250
                    ^ADN,15,10 ^FR ^FD8 (1,8, 15, 21)

                    ^FS
                    ^FO21,280 ^ADN,15,15 ^FR ^FDFecha Elab:
                    ^FS
                    ^FO321,280
                    ^ADN,15,10 ^FR ^FD05/05/2021 (vigente 8 hrs) hasta 18 hrs

                    ^FS
                    ^FO21,310 ^ADN,15,10 ^FR ^FDProteger de Luz:
                    ^FS
                    ^FO211,310
                    ^ADN,15,10 ^FR ^FDSi

                    ^FS
                    ^FO321,310 ^ADN,15,10 ^FR ^FDRefrigerar:
                    ^FS
                    ^FO451,310
                    ^ADN,15,10 ^FR ^FDNo

                      ^FS
                    ^XZ";

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
}
