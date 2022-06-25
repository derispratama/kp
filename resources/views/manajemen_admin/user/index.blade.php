@extends('layouts.main')
@section('container')

<!-- Basic Tables start -->
<section class="section">
    <div class="card">
        <div class="card-header">
            @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade col-lg-8" role="alert">
            {{ session('success') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible show fade col-lg-8" role="alert">
            {{ session('error') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

            <a href="/manajemen_admin/user/create" class="btn icon icon-left btn-primary me-1 mb-1"><i class="fa fa-plus"></i> Tambah User</a>
        </div>

        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/manajemen_admin/user/{{ $user->id }}/edit" class="btn icon btn-warning">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="/manajemen_admin/user/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn icon btn-danger btn-delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $('.btn-delete').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');

        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Untuk hapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>
<!-- Basic Tables end -->
@endsection