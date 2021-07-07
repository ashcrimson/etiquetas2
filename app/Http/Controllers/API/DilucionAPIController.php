<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDilucionAPIRequest;
use App\Http\Requests\API\UpdateDilucionAPIRequest;
use App\Models\Dilucion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DilucionController
 * @package App\Http\Controllers\API
 */

class DilucionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Dilucion.
     * GET|HEAD /dilucions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Dilucion::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $dilucions = $query->get();

        return $this->sendResponse($dilucions->toArray(), 'Dilucions retrieved successfully');
    }

    /**
     * Store a newly created Dilucion in storage.
     * POST /dilucions
     *
     * @param CreateDilucionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDilucionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::create($input);

        return $this->sendResponse($dilucion->toArray(), 'Dilucion guardado exitosamente');
    }

    /**
     * Display the specified Dilucion.
     * GET|HEAD /dilucions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::find($id);

        if (empty($dilucion)) {
            return $this->sendError('Dilucion not found');
        }

        return $this->sendResponse($dilucion->toArray(), 'Dilucion retrieved successfully');
    }

    /**
     * Update the specified Dilucion in storage.
     * PUT/PATCH /dilucions/{id}
     *
     * @param int $id
     * @param UpdateDilucionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDilucionAPIRequest $request)
    {
        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::find($id);

        if (empty($dilucion)) {
            return $this->sendError('Dilucion not found');
        }

        $dilucion->fill($request->all());
        $dilucion->save();

        return $this->sendResponse($dilucion->toArray(), 'Dilucion actualizado con éxito');
    }

    /**
     * Remove the specified Dilucion from storage.
     * DELETE /dilucions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::find($id);

        if (empty($dilucion)) {
            return $this->sendError('Dilucion not found');
        }

        $dilucion->delete();

        return $this->sendSuccess('Dilucion deleted successfully');
    }
}
