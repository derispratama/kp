@extends('layouts.main')
@section('container')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible show fade col-lg-8" role="alert">
                            {{ session('error') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12 col-12">
                                <form action="/manajemen_admin/user" method="POST" id="form">
                                    @method('post')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="name" name="name" autofocus value="{{ old('name') }}" autocomplete="off">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="off">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" value="{{ old('password') }}" autocomplete="off">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                            <input type="password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"
                                            placeholder="Confirm password" name="confirm_password" value="{{ old('confirm_password') }}" autocomplete="off">
                                            @error('confirm_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_role">Role</label>
                                        <select name="id_role" id="id_role" class="form-control @error('id_role') is-invalid @enderror">
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                @if(old('id_role') == $role->id)
                                                    <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                                                    @else
                                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('id_role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggallahir">Tanggal Lahir</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            <input type="date" id="tanggallahir" class="form-control @error('tanggallahir') is-invalid @enderror"
                                            placeholder="YYYY-MM-DD" name="tanggallahir" value="{{ old('tanggallahir') }}" autocomplete="off">
                                            @error('tanggallahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                          </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn icon icon-left btn-primary me-1 mb-1" id="btn-submit"><i class="fa fa-save"></i> Submit</button>
                                        <button type="reset" class="btn icon icon-left btn-secondary me-1 mb-1"><i class="fa fa-reply"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->
<script>
    $('#btn-submit').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');

        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Untuk tambah data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Tambahkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>
@endsection