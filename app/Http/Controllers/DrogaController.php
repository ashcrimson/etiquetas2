<?php

namespace App\Http\Controllers;

use App\DataTables\DrogaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDrogaRequest;
use App\Http\Requests\UpdateDrogaRequest;
use App\Models\Droga;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DrogaController extends AppBaseController
{
    /**
     * Display a listing of the Droga.
     *
     * @param DrogaDataTable $drogaDataTable
     * @return Response
     */
    public function index(DrogaDataTable $drogaDataTable)
    {
        return $drogaDataTable->render('drogas.index');
    }

    /**
     * Show the form for creating a new Droga.
     *
     * @return Response
     */
    public function create()
    {
        return view('drogas.create');
    }

    /**
     * Store a newly created Droga in storage.
     *
     * @param CreateDrogaRequest $request
     *
     * @return Response
     */
    public function store(CreateDrogaRequest $request)
    {
        $input = $request->all();

        /** @var Droga $droga */
        $droga = Droga::create($input);

        Flash::success('Droga saved successfully.');

        return redirect(route('drogas.index'));
    }

    /**
     * Display the specified Droga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Droga $droga */
        $droga = Droga::find($id);

        if (empty($droga)) {
            Flash::error('Droga not found');

            return redirect(route('drogas.index'));
        }

        return view('drogas.show')->with('droga', $droga);
    }

    /**
     * Show the form for editing the specified Droga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Droga $droga */
        $droga = Droga::find($id);

        if (empty($droga)) {
            Flash::error('Droga not found');

            return redirect(route('drogas.index'));
        }

        return view('drogas.edit')->with('droga', $droga);
    }

    /**
     * Update the specified Droga in storage.
     *
     * @param  int              $id
     * @param UpdateDrogaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDrogaRequest $request)
    {
        /** @var Droga $droga */
        $droga = Droga::find($id);

        if (empty($droga)) {
            Flash::error('Droga not found');

            return redirect(route('drogas.index'));
        }

        $droga->fill($request->all());
        $droga->save();

        Flash::success('Droga updated successfully.');

        return redirect(route('drogas.index'));
    }

    /**
     * Remove the specified Droga from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Droga $droga */
        $droga = Droga::find($id);

        if (empty($droga)) {
            Flash::error('Droga not found');

            return redirect(route('drogas.index'));
        }

        $droga->delete();

        Flash::success('Droga deleted successfully.');

        return redirect(route('drogas.index'));
    }

    public function imprimeEtiqueta(Droga $droga)
    {
        $fecha = $droga->created_at->format('d/m/Y');

        // $print_data = "^XA
        //         ^LH0,0
        //         ^FO4,2
        //         ^GB804,798,4
        //         ^FS
        //         ^FO4,2 ^GB548,52,4 ^FS ^FO19,12 ^ADN,36,20
        //         ^FDHospital Naval A.Nef ^FS ^FO548,2 ^GB260,52,4
        //         ^FS
        //         ^FO561,16 ^ADN,36,10 ^FDP/V ^FS ^FO611,16
        //         ^ADN,36,10 ^FD1:3
        //         ^FO21,100 ^ADN,15,15 ^FR ^FDNombre:
        //         ^FS
        //         ^FO321,100
        //         ^ADN,25,15 ^FR ^FD".$droga->nombre."
        //         ^FS ^FO4,210 ^GB128,166,4 ^FS ^FO128,210 ^GB680,166,4 ^FS
        //         ^FO136,220 ^ADN,36,15 ^FDHospital Naval ^FS ^FO136,276 ^ADN,36,10 ^FDInformatica ^FS
        //         ^FO15,243 ^ADN,108,50 ^FDE3 ^FS ^FO136,338 ^ADN,36,14 ^FDuwu ^FS ^FO580,338 ^ADN,36,15 ^FDRX
        //         ^FS ^FO632,210 ^GB176,166,4 ^FS ^FO660,220
        //         ^AAN,18,5 ^FDuwu ^FS ^FO695,246 ^ADN,18,5 ^FDCNN ^FS ^FO632, 273
        //         ^GB176,103,4 ^FS ^FO640,280 ^ADN,18,5 ^FDPeso Kg ^FS ^FO680,318 ^ADN,36,20 ^FD68 ^FS
        //         ^FO632, 372 ^GB176,48,4 ^FS ^FO640,378 ^ADN,18,5 ^FDPuerto: ^FS ^FO658,398 ^ADN,18,10
        //         ^FDVALPO ^FS ^FO4,372 ^GB804,48,4 ^FS ^FO25,383 ^ADN,36,10 ^FDNota: ^FS ^FO88,383
        //         ^ADN,36,10 ^FDOJO ^FS ^FO640,650 ^XGE:GLSMINI.GRF,1,1 ^FS ^FO606,718
        //         ^GB202,82,4 ^FS ^FO4,718 ^GB606,82,4 ^FS ^FO240,718 ^GB144,80,40 ^FS ^FO242,724
        //         ^ADN,96,25 ^FR ^FD1-25 ^FS ^FO50,422 ^BY3 ^BCN,260,N,N,N,A ^FVWW540006975010RC ^FS
        //         ^FO50,685 ^ADN,27,15 ^FDWW 540006975 01 0 RC 01 ^FS
        //         ^XZ";

        // $print_data = "^XA
        //             ^LH0,0
        //             ^FO4,2
        //             ^GB804,798,4
        //             ^FS
        //             ^FO4,2 ^GB548,52,4 
        //             ^FS ^FO19,12 ^ADN,36,20
        //             ^FDHospital Naval A.Nef ^FS ^FO548,2 ^GB260,52,4

        //             ^FS ^FO611,16
        //             ^ADN,36,10 ^FD1:3
        //             ^FO21,100 ^ADN,15,15 ^FR ^FDNombre:
        //             ^FS
        //             ^FO321,100
        //             ^ADN,25,15 ^FR ^FDCLARISA BERNAL MOYA

                    
        //             ^FS 
        //             ^FO21,130 ^ADN,15,15 ^FR ^FDRut:
        //             ^FS
        //             ^FO321,130
        //             ^ADN,25,15 ^FR ^FD5.628.925-9

        //             ^FS 
        //             ^FO21,160 ^ADN,15,15 ^FR ^FDFecha Adm:
        //             ^FS
        //             ^FO321,160
        //             ^ADN,25,15 ^FR ^FD05/02/2021

        //             ^FS 
        //             ^FO21,190 ^ADN,15,15 ^FR ^FDDroga:
        //             ^FS
        //             ^FO321,190
        //             ^ADN,25,15 ^FR ^FDBORTEZOMIB 2,2MG

        //             ^FS 
        //             ^FO21,220 ^ADN,15,15 ^FR ^FDVol. Total:
        //             ^FS
        //             ^FO321,220
        //             ^ADN,25,15 ^FR ^FD0.88 ML

        //             ^FS 
        //             ^FO21,250 
        //             ^ADN,25,15 ^FR ^FDEsquema:
        //             ^FS
        //             ^FO231,250
        //             ^ADN,25,10 ^FR ^FDBortez sem

        //             ^FS 
        //             ^FO381,250 ^ADN,15,10 ^FR ^FDCiclo:
        //             ^FS
        //             ^FO461,250
        //             ^ADN,15,10 ^FR ^FD2

        //             ^FS 
        //             ^FO501,250 ^ADN,15,10 ^FR ^FDDia:
        //             ^FS
        //             ^FO560,250
        //             ^ADN,15,10 ^FR ^FD8 (1,8, 15, 21)

        //             ^FS 
        //             ^FO21,280 ^ADN,15,15 ^FR ^FDFecha Elab:
        //             ^FS
        //             ^FO321,280
        //             ^ADN,15,10 ^FR ^FD05/05/2021 (vigente 8 hrs) hasta 18 hrs

        //             ^FS 
        //             ^FO21,310 ^ADN,15,10 ^FR ^FDProteger de Luz:
        //             ^FS
        //             ^FO211,310
        //             ^ADN,15,10 ^FR ^FDSi

        //             ^FS 
        //             ^FO321,310 ^ADN,15,10 ^FR ^FDRefrigerar:
        //             ^FS
        //             ^FO451,310
        //             ^ADN,15,10 ^FR ^FDNo

        //               ^FS
        //             ^XZ";

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
                    ^ADN,25,15 ^FR ^FD".$droga->nombre."

                    
                    ^FS 
                    ^FO21,130 ^ADN,15,15 ^FR ^FDDosis:
                    ^FS
                    ^FO321,130
                    ^ADN,25,15 ^FR ^FD".$droga->dosis."

                    ^FS 
                    ^FO21,160 ^ADN,15,15 ^FR ^FDSuero Dilusion:
                    ^FS
                    ^FO321,160
                    ^ADN,25,15 ^FR ^FD".$droga->suero_dilusion."

                    ^FS 
                    ^FO21,190 ^ADN,15,15 ^FR ^FDVol Agregado:
                    ^FS
                    ^FO321,190
                    ^ADN,25,15 ^FR ^FD".$droga->vol_agregado."

                    ^FS 
                    ^FO21,220 ^ADN,15,15 ^FR ^FDVol. Final:
                    ^FS
                    ^FO321,220
                    ^ADN,25,15 ^FR ^FD".$droga->vol_final."

                    ^FS 
                    ^FO21,250 
                    ^ADN,25,15 ^FR ^FDBajada:
                    ^FS
                    ^FO231,250
                    ^ADN,25,10 ^FR ^FD".$droga->bajada."

                    

                      ^FS
                    ^XZ";


        try {
            $fp = pfsockopen("172.25.34.88", 9100);
            fputs($fp, $print_data);
            fclose($fp);

            echo 'Successfully Printed';
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        flash('listo')->success();

        return redirect()->back();

    }
}
