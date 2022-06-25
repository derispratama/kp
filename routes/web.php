<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Dashboard_SDPController;
use App\Http\Controllers\Dashboard_SispelingController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PengajuanSDPController;
use App\Http\Controllers\ThnpelajaranController;
use App\Http\Controllers\TransaksiSDPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::get('/', [AuthController::class, 'login']);

// manajemen admin
route::resource('/manajemen_admin/role', RoleController::class);
route::resource('/manajemen_admin/user', UserController::class);
route::resource('/sdp/transaksi', TransaksiSDPController::class);
route::resource('/sdp/pengajuan', PengajuanSDPController::class);

// route::get('/sdp/{page}/jurusan', [JurusanController::class, 'index']);
// route::get('/sdp/{page}/jurusan/thnpelajaran/{id_jurusan}', [ThnpelajaranController::class, 'index']);
// route::get('/sdp/{page}/jurusan/thnpelajaran/kelas/{id_jurusan}/{id_thnpelajaran}', [KelasController::class, 'index']);
// route::get('/sdp/{page}/jurusan/thnpelajaran/kelas/siswa/{id_jurusan}/{id_thnpelajaran}/{id_kelas}', [SiswaController::class, 'index']);

route::get('/sdp/{page}/siswa', [SiswaController::class, 'index']);
// =======================================================


// dashboard
route::get('/dashboard/sdp', [Dashboard_SDPController::class, 'index']);
route::get('/dashboard/sispeling', [Dashboard_SispelingController::class, 'index']);
// =======================================================

route::post('/auth/checklogin', [AuthController::class, 'checklogin']);
route::get('/auth/logout', [AuthController::class, 'logout']);

// ajax
route::post('/pengajuan/getTahunAjaran', [PengajuanSDPController::class, 'getTahunAjaran']);
route::post('/pengajuan/getKelas', [PengajuanSDPController::class, 'getKelas']);
route::post('/pengajuan/getDataTable', [PengajuanSDPController::class, 'getDataTable']);
