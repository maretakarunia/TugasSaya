<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\inventarisController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ruangController;
use App\Http\Controllers\SesiController;
use App\Models\pegawai;
use App\Models\peminjaman;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/beranda');
});

Route::middleware(['auth'])->group(function () {
Route::get('/logout', [SesiController::class, 'logout']);
//   Route::get('/dashboard/kepala', [BerandaController::class, 'kepala'])->middleware('AksesPetugas:2');
Route::get('/beranda', [BerandaController::class, 'index']);


Route::middleware(['AksesPetugas:1'])->group(function () {

    // Petugas
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/create', [PetugasController::class, 'create']);
    Route::post('/petugas/store', [PetugasController::class, 'store']);
    Route::get('/petugas/edit/{idpetugas}', [PetugasController::class, 'edit']);
    Route::post('/petugas/update', [PetugasController::class, 'update']);
    Route::get('/petugas/hapus/{idpetugas}', [PetugasController::class, 'destroy']);

    // Ruang
    Route::get('/ruang', [RuangController::class, 'index']);
    Route::get('/ruang/create', [RuangController::class, 'create']);
    Route::post('/ruang/store', [RuangController::class, 'store']);
    Route::get('/ruang/edit/{idruang}', [RuangController::class, 'edit']);
    Route::post('/ruang/update', [RuangController::class, 'update']);
    Route::get('/ruang/hapus/{idruang}', [RuangController::class, 'destroy']);

    // Jenis
    Route::get('/jenis', [JenisController::class, 'index']);
    Route::get('/jenis/create', [JenisController::class, 'create']);
    Route::post('/jenis/store', [JenisController::class, 'store']);
    Route::get('/jenis/edit/{idjenis}', [JenisController::class, 'edit']);
    Route::post('/jenis/update', [JenisController::class, 'update']);
    Route::get('/jenis/hapus/{idjenis}', [JenisController::class, 'destroy']);

    //Pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/pegawai/create', [PegawaiController::class, 'create']);
    Route::post('/pegawai/store', [PegawaiController::class, 'store']);
    Route::get('/pegawai/edit/{idpegawai}', [PegawaiController::class, 'edit']);
    Route::post('/pegawai/update', [PegawaiController::class, 'update']);
    Route::get('/pegawai/hapus/{idpegawai}', [PegawaiController::class, 'destroy']);
    // Route::get('/pegawai/confirm-delete/{id}',[PegawaiController::class, 'confirmDelete'])->name('pegawai.confirm.delete') ;
    // Route::delete('/pegawai/delete/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');


    // Inventaris
    Route::get('/inventaris', [InventarisController::class, 'index']);
    Route::get('/inventaris/show/{idinventaris}', [InventarisController::class, 'show']);
    Route::get('/inventaris/create', [InventarisController::class, 'create']);
    Route::post('/inventaris/store', [InventarisController::class, 'store']);
    Route::get('/inventaris/edit/{idinventaris}', [InventarisController::class, 'edit']);
    Route::post('/inventaris/update', [InventarisController::class, 'update']);
    Route::get('/inventaris/hapus/{idinventaris}', [InventarisController::class, 'destroy']);
});

    // Peminjaman
    Route::middleware(['AksesPetugas:1,2'])->group(function () {
    //PDF
    Route::get('/peminjaman/tampilpdf', [PeminjamanController::class, 'tampilpdf']);
    Route::get('/pdfpeminjaman', [PdfController::class, 'generatepdfPeminjaman']);
    Route::get('/pdfpeminjaman1', [PdfController::class, 'generatepdfPeminjaman1']);
    Route::get('/pdfpetugas', [PdfController::class, 'generatepdfPetugas']);
    //Validasi
    Route::get('/peminjaman', [PeminjamanController::class, 'p_index']);
    Route::get('/pengembalian', [PeminjamanController::class, 'k_index']);
    //Allow
    Route::get('/peminjaman/allow/{idpeminjaman}', [PeminjamanController::class, 'allowPeminjaman']);
    Route::get('/pengembalian/allow/{idpeminjaman}', [PeminjamanController::class, 'allowPengembalian']);
    Route::get('/peminjaman/pkembali/{idpeminjaman}', [PeminjamanController::class, 'allowProsesPengembalian']);
    Route::get('/tolak/pengembalian/{idpeminjaman}', [PeminjamanController::class, 'TolakPengembalian']);
    Route::get('/tolak/peminjaman/{idpeminjaman}', [PeminjamanController::class, 'TolakPeminjaman']);
});

Route::middleware(['AksesPetugas:1,3'])->group(function () {
    //Peminjaman
    Route::get('/peminjaman/list', [PeminjamanController::class, 'index']);
    Route::get('/peminjaman/show/{idpeminjaman}', [PeminjamanController::class, 'show']);
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
    Route::post('/peminjaman/store', [PeminjamanController::class, 'store']);
    Route::get('/peminjaman/edit/{idpeminjaman}', [PeminjamanController::class, 'edit']);
    Route::post('/peminjaman/update', [PeminjamanController::class, 'update']);
    Route::get('/peminjaman/hapus/{idpeminjaman}', [PeminjamanController::class, 'destroy']);
    //Pengambalian
    Route::get('/pengembalian/create', [PeminjamanController::class, 'k_create']);
    Route::post('/pengembalian/store', [PeminjamanController::class, 'k_store']);
});
});





