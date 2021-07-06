<?php

namespace App\Http\Controllers;

use App\DataTables\EmpleadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\Empleado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EmpleadoController extends AppBaseController
{
    /**
     * Display a listing of the Empleado.
     *
     * @param EmpleadoDataTable $empleadoDataTable
     * @return Response
     */
    public function index(EmpleadoDataTable $empleadoDataTable)
    {
        return $empleadoDataTable->render('empleados.index');
    }

    /**
     * Show the form for creating a new Empleado.
     *
     * @return Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created Empleado in storage.
     *
     * @param CreateEmpleadoRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        $input = $request->all();

        /** @var Empleado $empleado */
        $empleado = Empleado::create($input);

        Flash::success('Empleado saved successfully.');

        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Empleado $empleado */
        $empleado = Empleado::find($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        return view('empleados.show')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Empleado $empleado */
        $empleado = Empleado::find($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        return view('empleados.edit')->with('empleado', $empleado);
    }

    /**
     * Update the specified Empleado in storage.
     *
     * @param  int              $id
     * @param UpdateEmpleadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadoRequest $request)
    {
        /** @var Empleado $empleado */
        $empleado = Empleado::find($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        $empleado->fill($request->all());
        $empleado->save();

        Flash::success('Empleado updated successfully.');

        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified Empleado from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Empleado $empleado */
        $empleado = Empleado::find($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        $empleado->delete();

        Flash::success('Empleado deleted successfully.');

        return redirect(route('empleados.index'));
    }
}
