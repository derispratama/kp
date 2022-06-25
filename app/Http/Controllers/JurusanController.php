<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index($page)
    {
        return view('jurusan.index', [
            'menu' => $page == 'pengajuan' ? 'Sumbangan Dana Pendidikan/Jurusan' : 'Approval SDP/Jurusan',
            'page' => $page,
            'jurusans' => Jurusan::all()
        ]);
    }
}
