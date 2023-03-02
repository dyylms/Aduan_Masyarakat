<?php

use App\Http\Controllers\ViewController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Users\PengaduanController;
use App\Http\Controllers\Users\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ViewController::class, 'index']);
Route::group(['prefix' => 'masyarakat'], function(){
    Route::get('/login', [AuthController::class, 'login_masyarakat'])->name('login.masyarakat');
    Route::get('/register', [AuthController::class, 'register_masyarakat'])->name('register.masyarakat');
    Route::post('/register/post', [AuthController::class, 'handleRegisterMasyarakat'])->name('register.post.masyarakat');
    Route::post('/login/post', [AuthController::class, 'handleLoginMasyarakat'])->name('login.post.masyarakat');
    Route::get('/logout', [AuthController::class, 'logout_masyarakat'])->name('logout.masyarakat');
    Route::get('/dashboard', [ViewController::class, 'dashboard_masyarakat'])->name('dashboard_masyarakat');
});

Route::get('/pengaduan/index',[PengaduanController::class, 'index'])->name('halaman.pengaduan');
Route::get('/pengaduan/index/petugas',[PengaduanController::class, 'index_petugas'])->name('halaman.pengaduan.petugas');
Route::get('/pengaduan/create',[PengaduanController::class, 'create'])->name('buat.pengaduan');
Route::post('/pengaduan/store',[PengaduanController::class, 'store'])->name('upload.pengaduan');
Route::get('/pengaduan/tanggapi/{id_pengaduan}',[PengaduanController::class, 'show'])->name('pengaduan.show');

Route::get('pengaduan/detail/{id_pengaduan}', [PengaduanController::class, 'detail'])->name('pengaduan.detail');
Route::post('tanggapan/{id}', [PengaduanController::class, 'create_tanggapan'])->name('create_tanggapan');
Route::get('tanggapan/{pengaduan_id}', [PengaduanController::class, 'index_tanggapan'])->name('tanggapi');

Route::group(['prefix' => 'petugas'], function(){
    Route::get('/data_petugas', [UserController::class, 'index'])->name('petugas.index')->middleware('rolePetugasCheck');
    Route::get('/create', [UserController::class, 'create'])->name('petugas.create')->middleware('rolePetugasCheck');
    Route::post('/create/new', [UserController::class, 'store'])->name('petugas.store')->middleware('rolePetugasCheck');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('petugas.delete')->middleware('rolePetugasCheck');
    Route::get('/report', [ReportController::class, 'index'])->name('petugas.report')->middleware('rolePetugasCheck');
    Route::get('/report/generate', [ReportController::class, 'generate_report'])->name('petugas.generate_report')->middleware('rolePetugasCheck');
    Route::get('/login', [AuthController::class, 'login_petugas'])->name('login.petugas');
    Route::post('/login', [AuthController::class, 'handleLoginPetugas'])->name('post.petugas.masyarakat');
    Route::get('/logout', [AuthController::class, 'logout_petugas'])->name('logout.petugas');
    Route::get('/dashboard', [ViewController::class, 'dashboard_petugas'])->name('dashboard_petugas');
});
