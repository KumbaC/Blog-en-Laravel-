<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();
        return view('admin.users.edit', compact('user', 'role'));
    }
    
    public function update(Request $request, User $user)
    {
       $user->roles()->sync($request->roles);
       return redirect()->route('admin.users.edit',compact('user'))->with('info', 'Se asginó el rol correctamente.');
    }

}
