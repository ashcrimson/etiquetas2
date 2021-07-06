<?php

namespace App\Http\Controllers;

use App\DataTables\PreparacionEstadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePreparacionEstadoRequest;
use App\Http\Requests\UpdatePreparacionEstadoRequest;
use App\Models\PreparacionEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreparacionEstadoController extends AppBaseController
{
    /**
     * Display a listing of the PreparacionEstado.
     *
     * @param PreparacionEstadoDataTable $preparacionEstadoDataTable
     * @return Response
     */
    public function index(PreparacionEstadoDataTable $preparacionEstadoDataTable)
    {
        return $preparacionEstadoDataTable->render('preparacion_estados.index');
    }

    /**
     * Show the form for creating a new PreparacionEstado.
     *
     * @return Response
     */
    public function create()
    {
        return view('preparacion_estados.create');
    }

    /**
     * Store a newly created PreparacionEstado in storage.
     *
     * @param CreatePreparacionEstadoRequest $request
     *
     * @return Response
     */
    public function store(CreatePreparacionEstadoRequest $request)
    {
        $input = $request->all();

        /** @var PreparacionEstado $preparacionEstado */
        $preparacionEstado = PreparacionEstado::create($input);

        Flash::success('Preparacion Estado saved successfully.');

        return redirect(route('preparacionEstados.index'));
    }

    /**
     * Display the specified PreparacionEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PreparacionEstado $preparacionEstado */
        $preparacionEstado = PreparacionEstado::find($id);

        if (empty($preparacionEstado)) {
            Flash::error('Preparacion Estado not found');

            return redirect(route('preparacionEstados.index'));
        }

        return view('preparacion_estados.show')->with('preparacionEstado', $preparacionEstado);
    }

    /**
     * Show the form for editing the specified PreparacionEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PreparacionEstado $preparacionEstado */
        $preparacionEstado = PreparacionEstado::find($id);

        if (empty($preparacionEstado)) {
            Flash::error('Preparacion Estado not found');

            return redirect(route('preparacionEstados.index'));
        }

        return view('preparacion_estados.edit')->with('preparacionEstado', $preparacionEstado);
    }

    /**
     * Update the specified PreparacionEstado in storage.
     *
     * @param  int              $id
     * @param UpdatePreparacionEstadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreparacionEstadoRequest $request)
    {
        /** @var PreparacionEstado $preparacionEstado */
        $preparacionEstado = PreparacionEstado::find($id);

        if (empty($preparacionEstado)) {
            Flash::error('Preparacion Estado not found');

            return redirect(route('preparacionEstados.index'));
        }

        $preparacionEstado->fill($request->all());
        $preparacionEstado->save();

        Flash::success('Preparacion Estado updated successfully.');

        return redirect(route('preparacionEstados.index'));
    }

    /**
     * Remove the specified PreparacionEstado from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PreparacionEstado $preparacionEstado */
        $preparacionEstado = PreparacionEstado::find($id);

        if (empty($preparacionEstado)) {
            Flash::error('Preparacion Estado not found');

            return redirect(route('preparacionEstados.index'));
        }

        $preparacionEstado->delete();

        Flash::success('Preparacion Estado deleted successfully.');

        return redirect(route('preparacionEstados.index'));
    }
}
