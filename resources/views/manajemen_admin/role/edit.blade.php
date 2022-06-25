@extends('layouts.main')
@section('container')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <form action="/manajemen_admin/role/{{ $role[0]->id }}" method="POST" id="form">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="hidden_role" value="{{ $role[0]->role }}" readonly>
                                    <div class="form-group">
                                        <label for="role">Nama Role</label>
                                        <input type="text" id="role" class="form-control @error('role') is-invalid @enderror"
                                            placeholder="Nama Role" name="role" autofocus value="{{ old('role',$role[0]->role) }}" autocomplete="off">
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ old('keterangan',$role[0]->keterangan) }}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" id="btn-submit">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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