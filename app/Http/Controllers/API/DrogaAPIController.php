<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDrogaAPIRequest;
use App\Http\Requests\API\UpdateDrogaAPIRequest;
use App\Models\Droga;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\DrogaResource;
use Response;

/**
 * Class DrogaController
 * @package App\Http\Controllers\API
 */

class DrogaAPIController extends AppBaseController
{
    /**
     * Display a listing of the Droga.
     * GET|HEAD /drogas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Droga::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $drogas = $query->get();

        return $this->sendResponse(DrogaResource::collection($drogas), 'Drogas retrieved successfully');
    }

    /**
     * Store a newly created Droga in storage.
     * POST /drogas
     *
     * @param CreateDrogaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDrogaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Droga $droga */
        $droga = Droga::create($input);

        return $this->sendResponse(new DrogaResource($droga), 'Droga saved successfully');
    }

    /**
     * Display the specified Droga.
     * GET|HEAD /drogas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Droga $droga */
        $droga = Droga::find($id);

        if (empty($droga)) {
            return $this->sendError('Droga not found');
        }

        return $this->sendResponse(new DrogaResource($droga), 'Droga retrieved successfully');
    }

    /**
     * Update the specified Droga in storage.
     * PUT/PATCH /drogas/{id}
     *
     * @param int $id
     * @param UpdateDrogaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDrogaAPIRequest $request)
    {
        /** @var Droga $droga */
        $droga = Droga::find($id);

        if (empty($droga)) {
            return $this->sendError('Droga not found');
        }

        $droga->fill($request->all());
        $droga->save();

        return $this->sendResponse(new DrogaResource($droga), 'Droga updated successfully');
    }

    /**
     * Remove the specified Droga from storage.
     * DELETE /drogas/{id}
     *
     * @param int $id
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
            return $this->sendError('Droga not found');
        }

        $droga->delete();

        return $this->sendSuccess('Droga deleted successfully');
    }
}
