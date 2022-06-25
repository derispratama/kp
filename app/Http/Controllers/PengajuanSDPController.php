<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Thnpelajaran;
use Illuminate\Http\Request;

class PengajuanSDPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index', [
            'menu' => 'Sumbangan Dana Pendidikan/Siswa',
            'jurusans' => Jurusan::all(),
            // 'siswas' => Siswa::join('alokasi_kelas', 'siswas.id', 'alokasi_kelas.id_siswa')->where('alokasi_kelas.id_kelas', $id_kelas)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sdp.pengajuan.create_pengajuan', [
            'menu' => 'Sumbangan Dana Pendidikan/Pengajuan Sumbangan Dana Pendidikan',
            'thnpelajarans' => Thnpelajaran::where('id_jurusan')->get()
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
        //
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
        //
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
        //
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

    public function getTahunAjaran(Request $request)
    {
        $query = Thnpelajaran::all()->where('id_jurusan', $request->id_jurusan);
        $html = '';
        foreach ($query as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->nama_thnpelajaran . '</option>';
        }
        echo json_encode(['html' => $html]);
    }

    public function getKelas(Request $request)
    {
        $query = Kelas::all()->where('id_jurusan', $request->id_jurusan)->where('id_thnpelajaran', $request->id_thnpelajaran);
        $html = '';
        foreach ($query as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->nama_kelas . '</option>';
        }
        echo json_encode(['html' => $html]);
    }

    public function getDataTable(Request $request)
    {
        if ($request->nmjalurmasuk == '') {
            $query = Siswa::join('alokasi_kelas', 'siswas.id', 'alokasi_kelas.id_siswa')->where('alokasi_kelas.id_kelas', $request->id_kelas)->get();
        } else {
            $query = Siswa::join('alokasi_kelas', 'siswas.id', 'alokasi_kelas.id_siswa')->where('alokasi_kelas.id_kelas', $request->id_kelas)->where('siswas.nmjalurmasuk', $request->nmjalurmasuk)->get();
        }

        $html = '';
        $no = 1;
        foreach ($query as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . $row->nis . '</td>';
            $html .= '<td>' . $row->nmlengkap . '</td>';
            $html .= '<td>XI MIPA 1</td>';
            $html .= '<td>' . $row->nmjalurmasuk . '</td>';
            $html .= '<td><span class="badge bg-danger">Belum Mengajukan</span></td>';
            $html .= '<td><a href="/sdp/pengajuan/create" class="btn icon btn-success">Ajukan <i class="fa fa-angle-double-right"></i></a></td>';
            $html .= '</tr>';
        }
        echo json_encode(['html' => $html]);
    }
}
