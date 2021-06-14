<?php

namespace App\Http\Controllers;

use App\DataTables\PacientePrevisionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePacientePrevisionRequest;
use App\Http\Requests\UpdatePacientePrevisionRequest;
use App\Models\PacientePrevision;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PacientePrevisionController extends AppBaseController
{
    /**
     * Display a listing of the PacientePrevision.
     *
     * @param PacientePrevisionDataTable $pacientePrevisionDataTable
     * @return Response
     */
    public function index(PacientePrevisionDataTable $pacientePrevisionDataTable)
    {
        return $pacientePrevisionDataTable->render('paciente_previsions.index');
    }

    /**
     * Show the form for creating a new PacientePrevision.
     *
     * @return Response
     */
    public function create()
    {
        return view('paciente_previsions.create');
    }

    /**
     * Store a newly created PacientePrevision in storage.
     *
     * @param CreatePacientePrevisionRequest $request
     *
     * @return Response
     */
    public function store(CreatePacientePrevisionRequest $request)
    {
        $input = $request->all();

        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::create($input);

        Flash::success('Paciente Prevision saved successfully.');

        return redirect(route('pacientePrevisions.index'));
    }

    /**
     * Display the specified PacientePrevision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::find($id);

        if (empty($pacientePrevision)) {
            Flash::error('Paciente Prevision not found');

            return redirect(route('pacientePrevisions.index'));
        }

        return view('paciente_previsions.show')->with('pacientePrevision', $pacientePrevision);
    }

    /**
     * Show the form for editing the specified PacientePrevision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::find($id);

        if (empty($pacientePrevision)) {
            Flash::error('Paciente Prevision not found');

            return redirect(route('pacientePrevisions.index'));
        }

        return view('paciente_previsions.edit')->with('pacientePrevision', $pacientePrevision);
    }

    /**
     * Update the specified PacientePrevision in storage.
     *
     * @param  int              $id
     * @param UpdatePacientePrevisionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacientePrevisionRequest $request)
    {
        /** @var PacientePrevision $pacientePrevision */
        $pacientePrevision = PacientePrevision::find($id);

        if (empty($pacientePrevision)) {
            Flash::error('Paciente Prevision not found');

            return redirect(route('pacientePrevisions.index'));
        }

        $pacientePrevision->fill($request->all());
        $pacientePrevision->save();

        Flash::success('Paciente Prevision updated successfully.');

        return redirect(route('pacientePrevisions.index'));
    }

    /**
     * Remove the specified PacientePrevision from storage.
     *
     * @param  int $id
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
            Flash::error('Paciente Prevision not found');

            return redirect(route('pacientePrevisions.index'));
        }

        $pacientePrevision->delete();

        Flash::success('Paciente Prevision deleted successfully.');

        return redirect(route('pacientePrevisions.index'));
    }
}
