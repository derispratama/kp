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
                        <th>Tahun Pelajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thnpelajarans as $thnpelajaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $thnpelajaran->nama_thnpelajaran }}</td>
                        <td>
                            <a href="/sdp/{{ $page }}/jurusan/thnpelajaran/kelas/{{ $thnpelajaran->id_jurusan }}/{{ $thnpelajaran->id }}" class="btn icon btn-success">
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