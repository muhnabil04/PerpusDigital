<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriBukuController;

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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::middleware(['auth', 'role:admin|petugas'])->group(function () {
    Route::get('admin/buku', [BukuController::class, 'index'])->name('admin.buku.index');
    Route::get('admin/buku/tambah', [BukuController::class, 'create'])->name('admin.buku.create');
    Route::post('admin/buku/store', [BukuController::class, 'store'])->name('admin.buku.store');
    Route::get('admin/buku/edit/{id}', [BukuController::class, 'edit'])->name('admin.buku.edit');
    Route::get('admin/buku/delete/{id}', [BukuController::class, 'destroy'])->name('admin.buku.delete');
    Route::put('admin/buku/update/{id}', [BukuController::class, 'update'])->name('admin.buku.update');
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('export.pdf');
    //kategori buku
    Route::get('admin/kategori-buku', [KategoriBukuController::class, 'index'])->name('admin.kategori.index');
    Route::get('admin/kategori-buku/tambah', [KategoriBukuController::class, 'create'])->name('admin.kategori.create');
    Route::post('admin/kategori-buku/store', [KategoriBukuController::class, 'store'])->name('admin.kategori.store');
    Route::get('admin/kategori-buku/edit/{id}', [KategoriBukuController::class, 'edit'])->name('admin.kategori.edit');
    Route::post('admin/kategori-buku/update/{id}', [KategoriBukuController::class, 'update'])->name('admin.kategori.update');
    Route::get('admin/kategori-buku/hapus/{id}', [KategoriBukuController::class, 'destroy'])->name('admin.kategori.delete');

    Route::get('admin/riwayat-peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('admin.buku.riwayat');
});



Route::middleware(['auth', 'role:peminjam'])->group(function () {
    //peminjam 
    Route::get('peminjam/buku', [PeminjamanController::class, 'index'])->name('peminjam.buku.index');
     Route::get('peminjam/buku/cari', [PeminjamanController::class, 'cari'])->name('peminjam.buku.cari');
    Route::get('peminjam/buku/detail/{id}', [PeminjamanController::class, 'show'])->name('peminjam.buku.show');
    Route::get('peminjam/pinjamanku', [PeminjamanController::class, 'peminjaman'])->name('peminjam.buku.peminjam');
    Route::get('peminjam/pinjam/{id}', [PeminjamanController::class, 'edit'])->name('peminjam.buku.edit');
    Route::post('peminjam/pinjam/{id}', [PeminjamanController::class, 'store'])->name('peminjam.buku.store');
    Route::post('peminjam/kembalikan/{id}', [PeminjamanController::class, 'update'])->name('peminjam.buku.update');
    Route::post('peminjam/ulasan/{id}', [PeminjamanController::class, 'ulasan'])->name('peminjam.buku.ulasan');


    Route::get('peminjam/koleksi', [KoleksiController::class, 'index'])->name('peminjam.koleksi.index');
    Route::post('koleksi/store/{id}', [KoleksiController::class, 'store'])->name('peminjam.koleksi.store');
    Route::get('koleksi/hapus/{id}', [KoleksiController::class, 'destroy'])->name('peminjam.koleksi.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
