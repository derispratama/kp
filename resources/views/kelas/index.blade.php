@extends('layouts.main')
@section('container')

<!-- Basic Tables start -->
<section class="section">
    <div class="card">
        <div class="card-header">
        </div>

        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Total Siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->walikelas }}</td>
                        <td>{{ $k->total_siswa }}</td>
                        <td>
                            <a href="/sdp/{{ $page }}/jurusan/thnpelajaran/kelas/siswa/{{ $k->id_jurusan }}/{{ $k->id_thnpelajaran }}/{{ $k->id }}" class="btn icon btn-success">
                                Next <i class="fa fa-angle-double-right"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Basic Tables end -->
@endsection