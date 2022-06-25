@extends('layouts.main')
@section('container')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card card border-top border-4 border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5>Informasi Siswa</h5>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>2021/2022</th>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <th>12345</th>
                            </tr>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Deris Ganesha Pratama</th>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <th>X</th>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <th>MIPA-1</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card border-top border-4 border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5>Pengajuan Sumbangan Dana Pendidikan</h5>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NIS">Jumlah yang diajukan</label>
                                    <input type="text" class="form-control" placeholder="Masukan NIS Siswa">
                                    @error('NIS')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NIS">File Surat Pernyataan Surat </label>
                                    <input type="file" class="form-control" placeholder="Masukan NIS Siswa">
                                    @error('NIS')
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection