@extends('layouts.main')
@section('container')

<!-- Basic Tables start -->
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Filtering</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan">
                            @foreach($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="thn_pelajaran" class="form-label">Tahun Ajaran</label>
                        <select class="form-select" id="thn_pelajaran">
                            <option value="">Pilih Tahun Ajaran</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas">
                            <option value="">Pilih Kelas</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="nmjalurmasuk" class="form-label">Jalur Masuk</label>
                        <select class="form-select" id="nmjalurmasuk">
                            <option value="">ALL</option>
                            <option value="KETM">KETM</option>
                            <option value="SKTM">SKTM</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">&nbsp;</label><br>
                        <button type="submit" id="btn-submit" class="btn btn-success">Filter <i class="fa fa-filter"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        </div>

        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jalur Masuk</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Basic Tables end -->
<script>

    getTahunAjaran();

    function getTahunAjaran(id_jurusan = '')
    {
        if(id_jurusan == ''){
            id_jurusan = $('#jurusan').val();
        }

        $.ajax({
            url: '/pengajuan/getTahunAjaran',
            method:'POST',
            data:{
                id_jurusan
            },
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success(data){
                if(data.html){
                    $('#thn_pelajaran').html(data.html);
                    getKelas();
                }
            }
        });
    }

    function getKelas(id_jurusan = '', id_thnpelajaran = '')
    {
        if(id_jurusan == '' && id_thnpelajaran == ''){
            id_jurusan = $('#jurusan').val();
            id_thnpelajaran = $('#thn_pelajaran').val();
        }

        $.ajax({
            url: '/pengajuan/getKelas',
            method:'POST',
            data:{
                id_thnpelajaran,
                id_jurusan,
            },
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success(data){
                if(data.html){
                    $('#kelas').html(data.html);
                    getDataTable($('#kelas').val(),$('#nmjalurmasuk').val());
                }
            }
        });
    }

    function getDataTable(id_kelas = '',nmjalurmasuk = '')
    {
        if(id_kelas == ''){
            id_kelas = $('#kelas').val();
        }

        $.ajax({
            url: '/pengajuan/getDataTable',
            method:'POST',
            data:{
                id_kelas,
                nmjalurmasuk,
            },
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend(){
                $('#table1 tbody').html('<tr><td colspan="7" class="text-center"><i class="fas fa-circle-notch fa-spin"></i></td></tr>');
            },
            error(){
                console.error('error')
            },
            success(data){
                if(data.html){
                    $('#table1 tbody').html(data.html);
                }else{
                    $('#table1 tbody').html('<tr><td colspan="5" class="text-center">No data available in table</td></tr>');
                }
                $('#table1').DataTable();
            }
        });
    }

    $('#jurusan').on('change',function(){
        const id_jurusan = $(this).val();
        getTahunAjaran(id_jurusan);
    });
    
    $('#thn_pelajaran').on('change',function(){
        const id_jurusan = $('#jurusan').val();
        const id_thnpelajaran = $(this).val();
        getKelas(id_jurusan,id_thnpelajaran)
    });

    $('#btn-submit').on('click',function(){
        const id_kelas = $(this).val();
        const nmjalurmasuk = $('#nmjalurmasuk').val();
        $('#table1').DataTable().clear();
        getDataTable(id_kelas,nmjalurmasuk);
    });
</script>
@endsection