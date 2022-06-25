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
                                <form action="/manajemen_admin/role" method="POST" id="form">
                                    @method('post')
                                    @csrf
                                    <div class="form-group">
                                        <label for="role">Nama Role</label>
                                        <input type="text" id="role" class="form-control @error('role') is-invalid @enderror"
                                            placeholder="Nama Role" name="role" autofocus value="{{ old('role') }}" autocomplete="off">
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ old('keterangan') }}</textarea>
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