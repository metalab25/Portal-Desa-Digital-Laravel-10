<?php

use App\Models\Rw;
use App\Models\Keluarga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PamongController;
use App\Http\Controllers\InfoDesaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\KelompokAnggotaController;
use App\Http\Controllers\KelompokKategoriController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::get('/desa/identitas', [InfoDesaController::class, 'index'])->name('identitas.index')->middleware('auth');
Route::post('/desa/identitas', [InfoDesaController::class, 'update'])->name('identitas.update')->middleware('auth');

Route::get('/setting', [PengaturanController::class, 'index'])->name('setting.index')->middleware('auth');
Route::post('/setting', [PengaturanController::class, 'update'])->name('setting.update')->middleware('auth');

Route::get('/desa/wilayah/rt', [RtController::class, 'index'])->name('rt.index')->middleware('auth');
Route::post('/desa/wilayah/rt', [RtController::class, 'store'])->name('rt.store')->middleware('auth');

Route::get('/desa/wilayah/rw', [RwController::class, 'index'])->name('rw.index')->middleware('auth');
Route::post('/desa/wilayah/rw', [RwController::class, 'store'])->name('rw.store')->middleware('auth');
Route::get('/desa/wilayah/rw/{id}', [RwController::class, 'show'])->name('rw.show')->middleware('auth');

Route::resource('/desa/wilayah', DusunController::class)->middleware('auth');

// Pamong
Route::resource('/desa/pemerintah', PamongController::class)->middleware('auth');

// Keluarga
Route::resource('/kependudukan/keluarga', KeluargaController::class)->middleware('auth');
Route::get('/get-rw/{dusun_id}', [KeluargaController::class, 'getRwByDusun']);
Route::get('/get-rt/{rw_id}', [KeluargaController::class, 'getRtByRw']);

// Penduduk
Route::resource('/kependudukan/penduduk', PendudukController::class)->middleware('auth');

// Kelompok Kategori
Route::resource('/kependudukan/kelompok-kategori', KelompokKategoriController::class)->middleware('auth');

// Kelompok
Route::resource('/kependudukan/kelompok', KelompokController::class)->middleware('auth');

// Anggota Kelompok
Route::resource('/kependudukan/kelompok/anggota', KelompokAnggotaController::class)->middleware('auth');
