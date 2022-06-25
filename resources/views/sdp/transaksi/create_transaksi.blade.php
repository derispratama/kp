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
                            <h5>Filter Transaksi Pembayaran</h5>
                            <a href="/sdp/pengajuan" class="btn btn-primary"><i class="fa fa-list"></i> Referensi Data Siswa</a>
                        </div>

                        <form action="/manajemen_admin/role" method="POST" id="form">
                            @method('post')
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_thnpelajaran">Pilih Tahun Pelajaran</label>
                                        <select name="id_thnpelajaran" id="id_thnpelajaran" class="form-control @error('id_thnpelajaran') is-invalid @enderror">
                                            <option value="">2021/2022</option>
                                            <option value="">2022/2023</option>
                                            <option value="">2023/2024</option>
                                        </select>
                                        @error('id_thnpelajaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="NIS">NIS Siswa</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Masukan NIS Siswa">
                                            <button class="btn btn-primary" type="button" id="btn-filter"><i class="fa fa-search"></i> Cari Data</button>
                                        </div>
                                        @error('NIS')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="content">
            </div>

        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->
<script>
    $('#btn-filter').on('click',function(){

        $('.content').html('<div class="text-center"><i class="text-primary fs-3 fas fa-circle-notch fa-spin"></i> <span class="text-primary fs-3">Loading...</span></div>');
        setTimeout(() => {
            $('.content').html(getInformasiSiswa());
            $('.content').append(getTransaksiSiswa());
            $('.content').append(getPembayaran());
        }, 500);

        

    });

    function getInformasiSiswa()
    {
        const html = `<div class="card card border-top border-4 border-primary">
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
                </div>`;

                return html;
    }

    function getTransaksiSiswa()
    {
        const html = `<div class="row">
                    <div class="col-5">
                        <div class="card card border-top border-4 border-primary">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5>Transaksi Terakhir</h5>
                                    </div>
                                    <table class="table table-striped">
                                        <tr class="bg-primary">
                                            <th class="text-white">Pembayaran</th>
                                            <th class="text-white">Tagihan</th>
                                            <th class="text-white">Tanggal</th>
                                        </tr>
                                        <tr>
                                            <th>NIS</th>
                                            <th>12345</th>
                                            <th>12345</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-top border-4 border-primary">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5>Pembayaran</h5>
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Bayar</label>
                                        <input type="text" id="total" class="form-control @error('total') is-invalid @enderror"
                                            placeholder="total" name="total" value="{{ old('total') }}" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="sisa_tagihan">Sisa Tagihan</label>
                                        <input type="text" id="sisa_tagihan" class="form-control @error('sisa_tagihan') is-invalid @enderror"
                                            placeholder="sisa tagihan" name="sisa_tagihan" value="{{ old('sisa_tagihan') }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card card border-top border-4 border-primary">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5>Cetak Bukti Pembayaran</h5>
                                    </div>
                                    <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Bukti Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

                return html;
    }

    function getPembayaran()
    {
        const html = `<div class="card card border-top border-4 border-primary">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h5>Pembayaran</h5>
                            </div>
                            <table class="table table-bordered">
                                <tr class="bg-primary">
                                    <th class="text-white">No</th>
                                    <th class="text-white">Nama Pembayaran</th>
                                    <th class="text-white">Sisa Tagihan</th>
                                    <th class="text-white">Juli</th>
                                    <th class="text-white">Agustus</th>
                                    <th class="text-white">September</th>
                                    <th class="text-white">Oktober</th>
                                    <th class="text-white">November</th>
                                    <th class="text-white">Desember</th>
                                    <th class="text-white">Januari</th>
                                    <th class="text-white">Februari</th>
                                    <th class="text-white">Maret</th>
                                    <th class="text-white">April</th>
                                    <th class="text-white">Mei</th>
                                    <th class="text-white">Juni</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>SDP - 2022/2021</th>
                                    <th>Rp.2000.000</th>
                                    <th><a href="#" class="badge bg-danger">Bayar</a></th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>SDP - 2022/2023</th>
                                    <th>Rp.2000.000</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <th>SDP - 2023/2024</th>
                                    <th>Rp.2000.000</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                    <th>-</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>`;

                return html;
    }
</script>
@endsection