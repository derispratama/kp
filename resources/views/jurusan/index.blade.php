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
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jurusans as $jurusan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jurusan->jurusan }}</td>
                        <td>
                            <a href="/sdp/{{ $page }}/jurusan/thnpelajaran/{{ $jurusan->id }}" class="btn icon btn-success">
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