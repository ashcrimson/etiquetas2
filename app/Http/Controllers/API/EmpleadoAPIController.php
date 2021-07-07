<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmpleadoAPIRequest;
use App\Http\Requests\API\UpdateEmpleadoAPIRequest;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\EmpleadoResource;
use Response;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers\API
 */

class EmpleadoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Empleado.
     * GET|HEAD /empleados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Empleado::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $empleados = $query->get();

        return $this->sendResponse($empleados, 'Empleados retrieved successfully');
    }

    /**
     * Store a newly created Empleado in storage.
     * POST /empleados
     *
     * @param CreateEmpleadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Empleado $empleado */
        $empleado = Empleado::create($input);

        return $this->sendResponse($empleado, 'Empleado saved successfully');
    }

    /**
     * Display the specified Empleado.
     * GET|HEAD /empleados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Empleado $empleado */
        $empleado = Empleado::find($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado not found');
        }

        return $this->sendResponse($empleado, 'Empleado retrieved successfully');
    }

    /**
     * Update the specified Empleado in storage.
     * PUT/PATCH /empleados/{id}
     *
     * @param int $id
     * @param UpdateEmpleadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadoAPIRequest $request)
    {
        /** @var Empleado $empleado */
        $empleado = Empleado::find($id);

        if (empty($empleado)) {
            return $this->sendError('Empleado not found');
        }

        $empleado->fill($request->all());
        $empleado->save();

        return $this->sendResponse($empleado, 'Empleado updated successfully');
    }

    /**
     * Remove the specified Empleado from storage.
     * DELETE /empleados/{id}
     *
     * @param int $id
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
            return $this->sendError('Empleado not found');
        }

        $empleado->delete();

        return $this->sendSuccess('Empleado deleted successfully');
    }
}
