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
}
