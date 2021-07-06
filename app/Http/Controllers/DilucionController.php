<?php

namespace App\Http\Controllers;

use App\DataTables\DilucionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDilucionRequest;
use App\Http\Requests\UpdateDilucionRequest;
use App\Models\Dilucion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DilucionController extends AppBaseController
{
    /**
     * Display a listing of the Dilucion.
     *
     * @param DilucionDataTable $dilucionDataTable
     * @return Response
     */
    public function index(DilucionDataTable $dilucionDataTable)
    {
        return $dilucionDataTable->render('dilucions.index');
    }

    /**
     * Show the form for creating a new Dilucion.
     *
     * @return Response
     */
    public function create()
    {
        return view('dilucions.create');
    }

    /**
     * Store a newly created Dilucion in storage.
     *
     * @param CreateDilucionRequest $request
     *
     * @return Response
     */
    public function store(CreateDilucionRequest $request)
    {
        $input = $request->all();

        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::create($input);

        Flash::success('Dilucion saved successfully.');

        return redirect(route('dilucions.index'));
    }

    /**
     * Display the specified Dilucion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::find($id);

        if (empty($dilucion)) {
            Flash::error('Dilucion not found');

            return redirect(route('dilucions.index'));
        }

        return view('dilucions.show')->with('dilucion', $dilucion);
    }

    /**
     * Show the form for editing the specified Dilucion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::find($id);

        if (empty($dilucion)) {
            Flash::error('Dilucion not found');

            return redirect(route('dilucions.index'));
        }

        return view('dilucions.edit')->with('dilucion', $dilucion);
    }

    /**
     * Update the specified Dilucion in storage.
     *
     * @param  int              $id
     * @param UpdateDilucionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDilucionRequest $request)
    {
        /** @var Dilucion $dilucion */
        $dilucion = Dilucion::find($id);

        if (empty($dilucion)) {
            Flash::error('Dilucion not found');

            return redirect(route('dilucions.index'));
        }

        $dilucion->fill($request->all());
        $dilucion->save();

        Flash::success('Dilucion updated successfully.');

        return redirect(route('dilucions.index'));
    }

    /**
     * Remove the specified Dilucion from storage.
     *
     * @param  int $id
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
            Flash::error('Dilucion not found');

            return redirect(route('dilucions.index'));
        }

        $dilucion->delete();

        Flash::success('Dilucion deleted successfully.');

        return redirect(route('dilucions.index'));
    }
}
