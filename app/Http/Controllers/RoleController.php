<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manajemen_admin.role.index', [
            'menu' => 'Manajemen Admin/Role',
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajemen_admin.role.create', [
            'menu' => 'Manajemen Admin/Role/Form Tambah Role',
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
            'role' => 'required|unique:roles|max:50',
            'keterangan' => 'nullable'
        ]);

        $action = Role::create($validateData);

        if ($action) {
            return redirect('/manajemen_admin/role')->with('success', 'Role berhasil ditambahkan');
        } else {
            return redirect('/manajemen_admin/role/create')->with('error', 'Role gagal ditambahkan');
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
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('manajemen_admin.role.edit', [
            'menu' => 'Manajemen Admin/Role/Form Edit Role',
            'role' => Role::find(['id' => $id])
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
        if ($request->hidden_role == $request->role) {
            $validateData = $request->validate([
                'role' => 'required|max:10',
                'keterangan' => 'nullable'
            ]);
        } else {
            $validateData = $request->validate([
                'role' => 'required|unique:roles|max:10',
                'keterangan' => 'nullable'
            ]);
        }

        $action = Role::where(['id' => $id])->update($validateData);

        if ($action) {
            return redirect('/manajemen_admin/role')->with('success', 'Role berhasil diubah');
        } else {
            return redirect('/manajemen_admin/role/create')->with('error', 'Role gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $action = Role::destroy($role->id);

        if ($action) {
            return redirect('/role')->with('success', 'Role berhasil dihapus');
        } else {
            return redirect('/role')->with('error', 'Role gagal dihapus');
        }
    }
}
