<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index($page, $id_jurusan, $id_thnpelajaran)
    {
        return view('kelas.index', [
            'menu' => $page == 'pengajuan' ? 'Sumbangan Dana Pendidikan/Jurusan/Tahun Pelajaran/Kelas' : 'Approval SDP/Jurusan/Tahun Pelajaran/Kelas',
            'page' => $page,
            'kelas' => Kelas::where('id_jurusan', $id_jurusan)->where('id_thnpelajaran', $id_thnpelajaran)->get()
        ]);
    }
}
