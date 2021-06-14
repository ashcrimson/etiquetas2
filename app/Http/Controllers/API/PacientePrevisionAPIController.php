<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientePrevisionAPIRequest;
use App\Http\Requests\API\UpdatePacientePrevisionAPIRequest;
use App\Models\PacientePrevision;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PacientePrevisionResource;
use Response;

/**
 * Class PacientePrevisionController
 * @package App\Http\Controllers\API
 */

class PacientePrevisionAPIController extends AppBaseController
{
    /**
     * Display a listing of the PacientePrevision.
     * GET|HEAD /pacientePrevisions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = PacientePrevision::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $pacientePrevisions = $query->get();

        return $this->sendResponse(PacientePrevisionResource::collection($pacientePrevisions), 'Paciente Previsions retrieved successfully');
    }

    /**
     * Store a newly created PacientePrevision in storage.
     * POST /pacientePrevisions
     *
     * @param CreatePacientePrevisionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacientePrevisionAPIRequest $request)
    {
        $input = $request->all();

        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::create($input);

        return $this->sendResponse(new PacientePrevisionResource($pacientePrevision), 'Paciente Prevision saved successfully');
    }

    /**
     * Display the specified PacientePrevision.
     * GET|HEAD /pacientePrevisions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::find($id);

        if (empty($pacientePrevision)) {
            return $this->sendError('Paciente Prevision not found');
        }

        return $this->sendResponse(new PacientePrevisionResource($pacientePrevision), 'Paciente Prevision retrieved successfully');
    }

    /**
     * Update the specified PacientePrevision in storage.
     * PUT/PATCH /pacientePrevisions/{id}
     *
     * @param int $id
     * @param UpdatePacientePrevisionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacientePrevisionAPIRequest $request)
    {
        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::find($id);

        if (empty($pacientePrevision)) {
            return $this->sendError('Paciente Prevision not found');
        }

        $pacientePrevision->fill($request->all());
        $pacientePrevision->save();

        return $this->sendResponse(new PacientePrevisionResource($pacientePrevision), 'PacientePrevision updated successfully');
    }

    /**
     * Remove the specified PacientePrevision from storage.
     * DELETE /pacientePrevisions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::find($id);

        if (empty($pacientePrevision)) {
            return $this->sendError('Paciente Prevision not found');
        }

        $pacientePrevision->delete();

        return $this->sendSuccess('Paciente Prevision deleted successfully');
    }
}
