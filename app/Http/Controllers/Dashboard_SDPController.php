<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard_SDPController extends Controller
{
    public function index()
    {
        return view('dashboard.sdp.dashboard_sdp', [
            'menu' => 'Dashboard/Sumbangan Dana Pendidikan',
        ]);
    }
}
