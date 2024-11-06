<?php

use App\Models\Rw;
use App\Models\Keluarga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PamongController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\InfoDesaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\BantuanPenerimaController;
use App\Http\Controllers\IdmController;
use App\Http\Controllers\KelompokAnggotaController;
use App\Http\Controllers\KelompokKategoriController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\SuratKeputusanController;

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
Route::get('/desa/pemerintah/cetak', [PamongController::class, 'cetak'])->name('pemerintah.cetak')->middleware('auth');
Route::resource('/desa/pemerintah', PamongController::class)->middleware('auth');

// Keluarga
Route::get('/kependudukan/keluarga/cetak/{id}', [KeluargaController::class, 'cetak'])->name('keluarga.cetak')->middleware('auth');
Route::resource('/kependudukan/keluarga', KeluargaController::class)->middleware('auth');
Route::get('/get-rw/{dusun_id}', [KeluargaController::class, 'getRwByDusun'])->middleware('auth');
Route::get('/get-rt/{rw_id}', [KeluargaController::class, 'getRtByRw'])->middleware('auth');

// Penduduk
Route::get('/kependudukan/penduduk/cetak/{id}', [PendudukController::class, 'cetak'])->name('penduduk.cetak')->middleware('auth');
Route::resource('/kependudukan/penduduk', PendudukController::class)->middleware('auth');

// Kelompok Kategori
Route::resource('/kependudukan/kelompok-kategori', KelompokKategoriController::class)->middleware('auth');

// Kelompok
Route::get('/kependudukan/kelompok/cetak/{id}', [KelompokController::class, 'cetak'])->name('kelompok.cetak');
Route::resource('/kependudukan/kelompok', KelompokController::class)->middleware('auth');

// Anggota Kelompok
Route::resource('/kependudukan/kelompok/anggota', KelompokAnggotaController::class)->middleware('auth');

// Jabatan
Route::resource('/administrasi/jabatan', JabatanController::class)->middleware('auth');

// Bantuan
Route::get('/bantuan/cetak-bantuan/{id}', [BantuanController::class, 'cetakBantuan'])->name('bantuan.cetak-bantuan')->middleware('auth');
Route::resource('/bantuan', BantuanController::class)->middleware('auth');

// Penerima Bantuan
Route::resource('/bantuan/penerima', BantuanPenerimaController::class)->middleware('auth');

// Statistik
Route::get('/statistik/bantuan/cetak/{id}', [StatistikController::class, 'bantuanCetak'])->name('statistik.bantuan.cetak')->middleware('auth');
Route::get('/statistik/bantuan/{id}', [StatistikController::class, 'bantuan'])->name('statistik.bantuan')->middleware('auth');
Route::get('/statistik/bantuan', [StatistikController::class, 'bantuanIndex'])->name('statistik.bantuan-index')->middleware('auth');
Route::get('/statistik/kependudukan/agama', [StatistikController::class, 'agama'])->name('statistik.agama')->middleware('auth');
Route::get('/statistik/kependudukan/jenis-kelamin', [StatistikController::class, 'jenisKelamin'])->name('statistik.jenis-kelamin')->middleware('auth');
Route::get('/statistik/kependudukan/pendidikan-ditempuh', [StatistikController::class, 'pendididkanDitempuh'])->name('statistik.pendidikan-ditempuh')->middleware('auth');
Route::get('/statistik/kependudukan/pendidikan-kk', [StatistikController::class, 'pendididkanKK'])->name('statistik.pendidikan-kk')->middleware('auth');
Route::get('/statistik/kependudukan/pekerjaan', [StatistikController::class, 'pekerjaan'])->name('statistik.pekerjaan')->middleware('auth');
Route::get('/statistik/kependudukan/warganegara', [StatistikController::class, 'wargaNegara'])->name('statistik.warganegara')->middleware('auth');
Route::get('/statistik/kependudukan/status-kawin', [StatistikController::class, 'statusKawin'])->name('statistik.status-kawin')->middleware('auth');
Route::get('/statistik/kependudukan/golongan-darah', [StatistikController::class, 'golonganDarah'])->name('statistik.golongan-darah')->middleware('auth');
Route::get('/statistik/kependudukan/cacat', [StatistikController::class, 'cacat'])->name('statistik.cacat')->middleware('auth');
Route::get('/statistik/kependudukan/sakit-menahun', [StatistikController::class, 'sakitMenahun'])->name('statistik.sakit-menahun')->middleware('auth');
Route::get('/statistik/kependudukan/cara-kb', [StatistikController::class, 'caraKB'])->name('statistik.cara-kb')->middleware('auth');
Route::get('/statistik/kependudukan', [StatistikController::class, 'index'])->name('statistik.index')->middleware('auth');

// Indeks Desa Membangun
Route::get('/statistik/idm', [IdmController::class, 'index'])->name('idm.index')->middleware('auth');
Route::get('statistik/idm/fetch', [IdmController::class, 'fetchAndStoreData'])->name('fetch.idm')->middleware('auth');

// Klasifikasi Surat
Route::resource('/administrasi/klasifikasi-surat', KlasifikasiSuratController::class)->middleware('auth');

// Surat Keluar
Route::get('/administrasi/surat-keluar/cetak', [SuratKeluarController::class, 'cetak'])->name('surat-keluar.cetak')->middleware('auth');
Route::resource('/administrasi/surat-keluar', SuratKeluarController::class)->middleware('auth');

// Surat Masuk
Route::get('/administrasi/surat-masuk/cetak', [SuratMasukController::class, 'cetak'])->name('surat-masuk.cetak')->middleware('auth');
Route::resource('/administrasi/surat-masuk', SuratMasukController::class)->middleware('auth');

// Surat Keputusan
Route::get('/administrasi/surat-keputusan/cetak', [SuratKeputusanController::class, 'cetak'])->name('surat-keputusan.cetak')->middleware('auth');
Route::resource('/administrasi/surat-keputusan', SuratKeputusanController::class)->middleware('auth');

// Peraturan
Route::get('/administrasi/peraturan/cetak', [PeraturanController::class, 'cetak'])->name('peraturan.cetak')->middleware('auth');
Route::resource('/administrasi/peraturan', PeraturanController::class)->middleware('auth');
