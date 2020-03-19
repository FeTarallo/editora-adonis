<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Usuários',
            'users' => User::paginate(10),
        ];

        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    function list(Request $request, $status) {

        $users = new User;

        if ($request['pesquisa']) {
            $users = $users->where('name', 'like', '%' . $request['pesquisa'] . '%');
        }

        if ($status == 'inativos') {
            $users = $users->onlyTrashed();
        }

        $users = $users->paginate(10);

        return view('admin.user.table', compact('users', 'status'));
    }

    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if($user->trashed()) {

            $user->restore();

            return back();

        } else {

            $user->delete();

            return back();
        }
    }
}
