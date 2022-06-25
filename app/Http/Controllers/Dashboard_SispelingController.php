<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard_SispelingController extends Controller
{
    public function index()
    {
        return view('dashboard.sispeling.dashboard_sispeling', [
            'menu' => 'Dashboard/Sispeling',
        ]);
    }
}
