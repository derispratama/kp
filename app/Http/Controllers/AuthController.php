<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function checklogin(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|max:15',
        ]);

        $users = DB::table('users')
            ->where('username', '=', $request->username)
            ->get();

        // check password
        if (isset($users[0]->password)) {
            if (Crypt::decryptString($users[0]->password) == $request->password) {
                $role = DB::table('roles')
                    ->where('id', '=', $users[0]->id_role)
                    ->get();

                $request->session()->put('id', $users[0]->id);
                $request->session()->put('name', $users[0]->name);
                $request->session()->put('username', $users[0]->username);
                $request->session()->put('role', $role[0]->role);


                return redirect('/dashboard/sdp');
            } else {
                return redirect('/')->with('error', 'Username Tidak Terdaftar');
            }
        } else {
            return redirect('/')->with('error', 'Username Tidak Terdaftar');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
