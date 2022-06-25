<?php

namespace App\Http\Controllers;

use App\Models\Thnpelajaran;
use Illuminate\Http\Request;

class ThnpelajaranController extends Controller
{
    public function index($page, $id_jurusan)
    {
        return view('thnpelajaran.index', [
            'menu' => $page == 'pengajuan' ? 'Sumbangan Dana Pendidikan/Jurusan/Tahun Pelajaran' : 'Approval SDP/Jurusan/Tahun Pelajaran',
            'page' => $page,
            'thnpelajarans' => Thnpelajaran::where('id_jurusan', $id_jurusan)->get()
        ]);
    }
}
