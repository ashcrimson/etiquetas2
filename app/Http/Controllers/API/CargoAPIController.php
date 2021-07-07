<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCargoAPIRequest;
use App\Http\Requests\API\UpdateCargoAPIRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CargoController
 * @package App\Http\Controllers\API
 */

class CargoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Cargo.
     * GET|HEAD /cargos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Cargo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $cargos = $query->get();

        return $this->sendResponse($cargos->toArray(), 'Cargos retrieved successfully');
    }

    /**
     * Store a newly created Cargo in storage.
     * POST /cargos
     *
     * @param CreateCargoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cargo $cargo */
        $cargo = Cargo::create($input);

        return $this->sendResponse($cargo->toArray(), 'Cargo guardado exitosamente');
    }

    /**
     * Display the specified Cargo.
     * GET|HEAD /cargos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            return $this->sendError('Cargo not found');
        }

        return $this->sendResponse($cargo->toArray(), 'Cargo retrieved successfully');
    }

    /**
     * Update the specified Cargo in storage.
     * PUT/PATCH /cargos/{id}
     *
     * @param int $id
     * @param UpdateCargoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoAPIRequest $request)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            return $this->sendError('Cargo not found');
        }

        $cargo->fill($request->all());
        $cargo->save();

        return $this->sendResponse($cargo->toArray(), 'Cargo actualizado con éxito');
    }

    /**
     * Remove the specified Cargo from storage.
     * DELETE /cargos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            return $this->sendError('Cargo not found');
        }

        $cargo->delete();

        return $this->sendSuccess('Cargo deleted successfully');
    }
}
