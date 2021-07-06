<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Opm;
use App\Http\Requests\OpmRequest;

class OpmController extends Controller
{

    private $opm;
    
    public function __construct(Opm $opm)
    {

        $this->opm = $opm;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $opms = $this->opm->paginate(10);

        return view('admin.opm.index', compact('opms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.opm.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpmRequest $request)
    {

        $data = $request->all();

        $opm = $this->opm->create($data);

        flash('OPM criada com sucesso!')->success();

        return redirect()->route('admin.opm.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($opm)
    {

        $opm = $this->opm->find($opm);

        return view('admin.opm.edit', compact('opm'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $opm
     * @return \Illuminate\Http\Response
     */
    public function update(OpmRequest $request, $opm)
    {

        $data = $request->all();

        $opm = $this->opm->find($opm);

        $opm->update($data);

        flash('OPM atualizada com sucesso!')->success();

        return redirect()->route('admin.opm.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $opm
     * @return \Illuminate\Http\Response
     */
    public function destroy($opm)
    {

        $opm = $this->opm->find($opm);

        $opm->delete();

        flash('OPM excluída com sucesso!')->success();

        return redirect()->route('admin.opm.index');

    }
}
