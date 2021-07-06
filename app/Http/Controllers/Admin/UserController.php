<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Opm;
use App\Graduation;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{

    public function __construct(User $user)
    {

        $this->user = $user;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $opms = Opm::all();
        $graduations = Graduation::all();

        return view('admin.users.create', compact('opms','graduations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $user = $this->user::create($data);

        flash('Policial criado com sucesso!')->success();

        return redirect()->route('admin.users.index');
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
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {

        $user = $this->user::find($user);

        $opms = Opm::all();

        $graduations = Graduation::all();

        return view('admin.users.edit', compact('user', 'opms', 'graduations'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $user)
    {

        $data = $request->all();
        
        $user = $this->user->find($user);

        $user->update($data);

        flash('Policial atualizado com sucesso!')->success();

        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {

        $user = $this->user->find($user);

        $user->delete();

        flash('Policial excluído com sucesso!')->success();

        return redirect()->route('admin.users.index');
        
    }
}
