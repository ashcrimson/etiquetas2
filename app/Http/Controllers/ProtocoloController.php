<?php

namespace App\Http\Controllers;

use App\DataTables\ProtocoloDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProtocoloRequest;
use App\Http\Requests\UpdateProtocoloRequest;
use App\Models\Protocolo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProtocoloController extends AppBaseController
{
    /**
     * Display a listing of the Protocolo.
     *
     * @param ProtocoloDataTable $protocoloDataTable
     * @return Response
     */
    public function index(ProtocoloDataTable $protocoloDataTable)
    {
        return $protocoloDataTable->render('protocolos.index');
    }

    /**
     * Show the form for creating a new Protocolo.
     *
     * @return Response
     */
    public function create()
    {
        return view('protocolos.create');
    }

    /**
     * Store a newly created Protocolo in storage.
     *
     * @param CreateProtocoloRequest $request
     *
     * @return Response
     */
    public function store(CreateProtocoloRequest $request)
    {
        $input = $request->all();

        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::create($input);

        Flash::success('Protocolo saved successfully.');

        return redirect(route('protocolos.index'));
    }

    /**
     * Display the specified Protocolo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::find($id);

        if (empty($protocolo)) {
            Flash::error('Protocolo not found');

            return redirect(route('protocolos.index'));
        }

        return view('protocolos.show')->with('protocolo', $protocolo);
    }

    /**
     * Show the form for editing the specified Protocolo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::find($id);

        if (empty($protocolo)) {
            Flash::error('Protocolo not found');

            return redirect(route('protocolos.index'));
        }

        return view('protocolos.edit')->with('protocolo', $protocolo);
    }

    /**
     * Update the specified Protocolo in storage.
     *
     * @param  int              $id
     * @param UpdateProtocoloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProtocoloRequest $request)
    {
        /** @var Protocolo $protocolo */
        $protocolo = Protocolo::find($id);

        if (empty($protocolo)) {
            Flash::error('Protocolo not found');

            return redirect(route('protocolos.index'));
        }

        $protocolo->fill($request->all());
        $protocolo->save();

        Flash::success('Protocolo updated successfully.');

        return redirect(route('protocolos.index'));
    }

    /**
     * Remove the specified Protocolo from storage.
     *
     * @param  int $id
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
            Flash::error('Protocolo not found');

            return redirect(route('protocolos.index'));
        }

        $protocolo->delete();

        Flash::success('Protocolo deleted successfully.');

        return redirect(route('protocolos.index'));
    }
}
