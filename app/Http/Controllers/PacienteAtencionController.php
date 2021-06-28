<?php

namespace App\Http\Controllers;

use App\DataTables\PacienteAtencionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePacienteAtencionRequest;
use App\Http\Requests\UpdatePacienteAtencionRequest;
use App\Models\PacienteAtencion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PacienteAtencionController extends AppBaseController
{
    /**
     * Display a listing of the PacienteAtencion.
     *
     * @param PacienteAtencionDataTable $pacienteAtencionDataTable
     * @return Response
     */
    public function index(PacienteAtencionDataTable $pacienteAtencionDataTable)
    {
        return $pacienteAtencionDataTable->render('paciente_atencions.index');
    }

    /**
     * Show the form for creating a new PacienteAtencion.
     *
     * @return Response
     */
    public function create()
    {
        return view('paciente_atencions.create');
    }

    /**
     * Store a newly created PacienteAtencion in storage.
     *
     * @param CreatePacienteAtencionRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteAtencionRequest $request)
    {
        $input = $request->all();

        /** @var PacienteAtencion $pacienteAtencion */
        $pacienteAtencion = PacienteAtencion::create($input);

        Flash::success('Paciente Atencion saved successfully.');

        return redirect(route('pacienteAtencions.index'));
    }

    /**
     * Display the specified PacienteAtencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PacienteAtencion $pacienteAtencion */
        $pacienteAtencion = PacienteAtencion::find($id);

        if (empty($pacienteAtencion)) {
            Flash::error('Paciente Atencion not found');

            return redirect(route('pacienteAtencions.index'));
        }

        return view('paciente_atencions.show')->with('pacienteAtencion', $pacienteAtencion);
    }

    /**
     * Show the form for editing the specified PacienteAtencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PacienteAtencion $pacienteAtencion */
        $pacienteAtencion = PacienteAtencion::find($id);

        if (empty($pacienteAtencion)) {
            Flash::error('Paciente Atencion not found');

            return redirect(route('pacienteAtencions.index'));
        }

        return view('paciente_atencions.edit')->with('pacienteAtencion', $pacienteAtencion);
    }

    /**
     * Update the specified PacienteAtencion in storage.
     *
     * @param  int              $id
     * @param UpdatePacienteAtencionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteAtencionRequest $request)
    {
        /** @var PacienteAtencion $pacienteAtencion */
        $pacienteAtencion = PacienteAtencion::find($id);

        if (empty($pacienteAtencion)) {
            Flash::error('Paciente Atencion not found');

            return redirect(route('pacienteAtencions.index'));
        }

        $pacienteAtencion->fill($request->all());
        $pacienteAtencion->save();

        Flash::success('Paciente Atencion updated successfully.');

        return redirect(route('pacienteAtencions.index'));
    }

    /**
     * Remove the specified PacienteAtencion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PacienteAtencion $pacienteAtencion */
        $pacienteAtencion = PacienteAtencion::find($id);

        if (empty($pacienteAtencion)) {
            Flash::error('Paciente Atencion not found');

            return redirect(route('pacienteAtencions.index'));
        }

        $pacienteAtencion->delete();

        Flash::success('Paciente Atencion deleted successfully.');

        return redirect(route('pacienteAtencions.index'));
    }
}
