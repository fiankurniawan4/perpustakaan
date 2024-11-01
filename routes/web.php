<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/admin', [LoginController::class, 'admin'])->name('adminPage');
Route::post('/admin', [LoginController::class, 'loginAdmin'])->name('adminLogin');

Route::group(['middleware' => 'custom.auth'], function () {
    Route::get('/logout', function() {
        Auth::guard('anggota')->logout();
        return redirect('/');
    });
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

Route::group(['middleware' => 'admin.auth'], function() {
    Route::get('/admin/logout', function() {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Anggota
    Route::get('/dashboard/anggota', [UserController::class, 'index'])->name('dashboardUser');
    Route::get('/dashboard/anggota/tambah', [UserController::class, 'tambahAnggota'])->name('tambahAnggota');
    Route::post('/dashboard/anggota/tambah', [UserController::class, 'anggotaTambah'])->name('anggotaTambah');
    Route::get('/dashboard/anggota/edit/{id}', [UserController::class, 'edit'])->name('editAnggota');
    Route::post('/dashboard/anggota/edit/{id}', [UserController::class, 'update'])->name('anggotaEdit');
    Route::get('/dashboard/anggota/delete/{id}', [UserController::class, 'destroy'])->name('deleteAnggota')->middleware('admin.check');

    // Admin / Pustakawan
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboardAdmin')->middleware('admin.check');
    Route::get('/dashboard/admin/tambah', [AdminController::class, 'tambah'])->name('tambahAdmin')->middleware('admin.check');
    Route::post('/dashboard/admin/tambah', [AdminController::class, 'create'])->name('adminTambah')->middleware('admin.check');
    Route::get('/dashboard/admin/delete/{id}', [AdminController::class, 'destroy'])->name('deleteAdmin')->middleware('admin.check');


    // Peminjaman
    Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/dashboard/peminjaman/tambah', [PeminjamanController::class, 'peminjamanTambah'])->name('peminjamanTambah');
    Route::post('/dashboard/peminjaman/tambah', [PeminjamanController::class, 'pinjamBuku'])->name('pinjamBuku');
    Route::get('/dashboard/peminjaman/kembali/{id}', [PeminjamanController::class, 'kembaliBuku'])->name('kembaliBuku');
    Route::get('/dashboard/peminjaman/hapus/{id}', [PeminjamanController::class, 'deletePeminjaman'])->name('deletePeminjaman')->middleware('admin.check');
    Route::get('/dashboard/peminjaman/laporan', [PeminjamanController::class, 'cetak_pdf'])->name('laporan');

    // Buku
    Route::get('/dashboard/buku', [BukuController::class, 'index'])->name('dashboardBuku');
    Route::get('/dashboard/buku/tambah', [BukuController::class, 'tambah'])->name('tambah');
    Route::get('/dashboard/buku/edit/{id}', [BukuController::class, 'edit'])->name('editBuku');
    Route::get('/dashboard/buku/delete/{id}', [BukuController::class, 'deleteBuku'])->name('delete')->middleware('admin.check');
    Route::post('/dashboard/buku/edit/{id}', [BukuController::class, 'editBuku'])->name('edit');
    Route::post('/dashboard/buku/tambah', [BukuController::class, 'tambahBuku'])->name('tambahBuku');

    // Kategori
    Route::get('/dashboard/kategori', [KategoriController::class, 'index'])->name('dashboardKategori');
    Route::get('/dashboard/kategori/tambah', [KategoriController::class, 'tambah'])->name('kategori');
    Route::post('/dashboard/kategori/tambah', [KategoriController::class, 'tambahKategori'])->name('tambahKategori');
    Route::get('/dashboard/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('deleteKategori')->middleware('admin.check');;

});