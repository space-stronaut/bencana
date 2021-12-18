<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $kecamatans = Kecamatan::all();

        return view('user.create', compact('roles', 'kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'kecamatan_id' => $request->kecamatan_id,
            'tgl_lahir' => $request->tgl_lahir
        ]);;

        return redirect()->route('user.index');
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
        $user = User::find($id);
        $roles = Role::all();
        $kecamatans = Kecamatan::all();

        return view('user.edit', compact('user', 'roles', 'kecamatans'));
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
        $pass = User::find($id)->password;
        if ($request->password) {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
                'kecamatan_id' => $request->kecamatan_id,
                'tgl_lahir' => $request->tgl_lahir
            ]);;
    
            return redirect()->route('user.index');
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass,
                'role_id' => $request->role_id,
                'kecamatan_id' => $request->kecamatan_id,
                'tgl_lahir' => $request->tgl_lahir
            ]);;
    
            return redirect()->route('user.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }
}
