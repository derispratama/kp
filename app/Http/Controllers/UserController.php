<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manajemen_admin.user.index', [
            'menu' => 'Manajemen Admin/User',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajemen_admin.user.create', [
            'menu' => 'Manajemen Admin/User',
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:users|max:50',
            'password' => 'required|max:15',
            'confirm_password' => 'required|max:15|required_with:password|same:password',
            'email' => 'required|max:50|email:rfc,dns',
            'name' => 'required|max:50',
            'id_role' => 'required|max:50',
            'tanggallahir' => 'required|max:50',
        ]);

        $data = [
            'username' => $request->username,
            'password' => Crypt::encryptString($request->password),
            'id_role' => $request->id_role,
            'email' => $request->email,
            'name' => $request->name,
            'tanggallahir' => $request->tanggallahir,
        ];

        $action = User::create($data);

        if ($action) {
            return redirect('/manajemen_admin/user')->with('success', 'User berhasil ditambahkan');
        } else {
            return redirect('/manajemen_admin/user/create')->with('error', 'User gagal ditambahkan');
        }
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
        return view('manajemen_admin.user.edit', [
            'menu' => 'Manajemen Admin/User',
            'roles' => Role::all(),
            'users' => User::find(['id' => $id]),
        ]);
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
        if ($request->hidden_username == $request->username) {
            $validateData = $request->validate([
                'username' => 'required|max:50',
                'email' => 'required|max:50|email:rfc,dns',
                'name' => 'required|max:50',
                'id_role' => 'required|max:50',
                'tanggallahir' => 'required|max:50',
            ]);
        } else {
            $validateData = $request->validate([
                'username' => 'required|unique:users|max:50',
                'email' => 'required|max:50|email:rfc,dns',
                'name' => 'required|max:50',
                'id_role' => 'required|max:50',
                'tanggallahir' => 'required|max:50',
            ]);
        }

        $data = [
            'username' => $request->username,
            'id_role' => $request->id_role,
            'email' => $request->email,
            'name' => $request->name,
            'tanggallahir' => $request->tanggallahir,
        ];

        $action = User::where(['id' => $id])->update($data);

        if ($action) {
            return redirect('/manajemen_admin/user')->with('success', 'User berhasil diubah');
        } else {
            return redirect('/manajemen_admin/user/create')->with('error', 'User gagal diubah');
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
        //
    }
}
