<?php

namespace App\Http\Controllers;

use App\DataTables\ServicioDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Models\Servicio;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ServicioController extends AppBaseController
{
    /**
     * Display a listing of the Servicio.
     *
     * @param ServicioDataTable $servicioDataTable
     * @return Response
     */
    public function index(ServicioDataTable $servicioDataTable)
    {
        return $servicioDataTable->render('servicios.index');
    }

    /**
     * Show the form for creating a new Servicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created Servicio in storage.
     *
     * @param CreateServicioRequest $request
     *
     * @return Response
     */
    public function store(CreateServicioRequest $request)
    {
        $input = $request->all();

        /** @var Servicio $servicio */
        $servicio = Servicio::create($input);

        Flash::success('Servicio guardado exitosamente.');

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified Servicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Servicio $servicio */
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        return view('servicios.show')->with('servicio', $servicio);
    }

    /**
     * Show the form for editing the specified Servicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Servicio $servicio */
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        return view('servicios.edit')->with('servicio', $servicio);
    }

    /**
     * Update the specified Servicio in storage.
     *
     * @param  int              $id
     * @param UpdateServicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicioRequest $request)
    {
        /** @var Servicio $servicio */
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        $servicio->fill($request->all());
        $servicio->save();

        Flash::success('Servicio actualizado con éxito.');

        return redirect(route('servicios.index'));
    }

    /**
     * Remove the specified Servicio from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Servicio $servicio */
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        $servicio->delete();

        Flash::success('Servicio deleted successfully.');

        return redirect(route('servicios.index'));
    }
}
