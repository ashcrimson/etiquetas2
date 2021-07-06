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
}
