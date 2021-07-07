<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProtocoloAPIRequest;
use App\Http\Requests\API\UpdateProtocoloAPIRequest;
use App\Models\Protocolo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProtocoloController
 * @package App\Http\Controllers\API
 */

class ProtocoloAPIController extends AppBaseController
{
    /**
     * Display a listing of the Protocolo.
     * GET|HEAD /protocolos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Protocolo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $protocolos = $query->get();

        return $this->sendResponse($protocolos->toArray(), 'Protocolos retrieved successfully');
    }

    /**
     * Store a newly created Protocolo in storage.
     * POST /protocolos
     *
     * @param CreateProtocoloAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProtocoloAPIRequest $request)
    {
        $input = $request->all();

        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::create($input);

        return $this->sendResponse($protocolo->toArray(), 'Protocolo guardado exitosamente');
    }

    /**
     * Display the specified Protocolo.
     * GET|HEAD /protocolos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::find($id);

        if (empty($protocolo)) {
            return $this->sendError('Protocolo not found');
        }

        return $this->sendResponse($protocolo->toArray(), 'Protocolo retrieved successfully');
    }

    /**
     * Update the specified Protocolo in storage.
     * PUT/PATCH /protocolos/{id}
     *
     * @param int $id
     * @param UpdateProtocoloAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProtocoloAPIRequest $request)
    {
        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::find($id);

        if (empty($protocolo)) {
            return $this->sendError('Protocolo not found');
        }

        $protocolo->fill($request->all());
        $protocolo->save();

        return $this->sendResponse($protocolo->toArray(), 'Protocolo actualizado con éxito');
    }

    /**
     * Remove the specified Protocolo from storage.
     * DELETE /protocolos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::find($id);

        if (empty($protocolo)) {
            return $this->sendError('Protocolo not found');
        }

        $protocolo->delete();

        return $this->sendSuccess('Protocolo deleted successfully');
    }
}
