<?php

namespace App\Http\Controllers;

use App\DataTables\RemaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRemaRequest;
use App\Http\Requests\UpdateRemaRequest;
use App\Models\Rema;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RemaController extends AppBaseController
{
    /**
     * Display a listing of the Rema.
     *
     * @param RemaDataTable $remaDataTable
     * @return Response
     */
    public function index(RemaDataTable $remaDataTable)
    {
        return $remaDataTable->render('remas.index');
    }

    /**
     * Show the form for creating a new Rema.
     *
     * @return Response
     */
    public function create()
    {
        return view('remas.create');
    }

    /**
     * Store a newly created Rema in storage.
     *
     * @param CreateRemaRequest $request
     *
     * @return Response
     */
    public function store(CreateRemaRequest $request)
    {
        $input = $request->all();

        /** @var Rema $rema */
        $rema = Rema::create($input);

        Flash::success('Rema saved successfully.');

        return redirect(route('remas.index'));
    }

    /**
     * Display the specified Rema.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        return view('remas.show')->with('rema', $rema);
    }

    /**
     * Show the form for editing the specified Rema.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        return view('remas.edit')->with('rema', $rema);
    }

    /**
     * Update the specified Rema in storage.
     *
     * @param  int              $id
     * @param UpdateRemaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRemaRequest $request)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        $rema->fill($request->all());
        $rema->save();

        Flash::success('Rema updated successfully.');

        return redirect(route('remas.index'));
    }

    /**
     * Remove the specified Rema from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rema $rema */
        $rema = Rema::find($id);

        if (empty($rema)) {
            Flash::error('Rema not found');

            return redirect(route('remas.index'));
        }

        $rema->delete();

        Flash::success('Rema deleted successfully.');

        return redirect(route('remas.index'));
    }
}
