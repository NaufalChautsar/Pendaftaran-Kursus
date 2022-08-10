<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [UserController::class, 'beranda'])->name('Beranda.index');
Route::get('/Kursus', [UserController::class, 'kursus'])->name('Kursus.index');

Route::post('/login-mahasiswa', [LoginController::class, 'login'])->name('loginMahasiswa.login');

// Admin Login
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.index');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix' => 'admin'], function() {
    Route::middleware('auth:admin')->group(function() {
        Route::get('/dashboard', [KursusController::class, 'dashboard'])->name('dashboard.index');

        Route::get('/mahasiswa', [KursusController::class, 'mahasiswa'])->name('mahasiswa.index');
        Route::get('/mahasiswa/create', [KursusController::class, 'mahasiswaCreate'])->name('mahasiswa.create');
        Route::post('/mahasiswa', [KursusController::class, 'mahasiswaStore'])->name('mahasiswa.store');
        Route::get('/mahasiswa/{user_id}/edit', [KursusController::class, 'mahasiswaEdit'])->name('mahasiswa.edit');
        Route::post('/mahasiswa/{user_id}', [KursusController::class, 'mahasiswaUpdate'])->name('mahasiswa.update');

        Route::get('/pendaftaran-kursus', [KursusController::class, 'pendaftaran'])->name('pendaftaranKursus.index');
        Route::get('/pendaftaran-kursus/{pendaftaran_id}/edit', [KursusController::class, 'pendaftaranEdit'])->name('pendaftaranKursus.edit');
        Route::post('/pendaftaran-kursus/{pendaftaran_id}', [KursusController::class, 'pendaftaranUpdate'])->name('pendaftaranKursus.update');

        Route::resource('/kursus', KursusController::class);
    });
});

Auth::routes();
Route::middleware('auth')->group(function() {
    Route::get('/Kursus/Detail/{kursus_id}', [UserController::class, 'kursusDetail'])->name('Kursus.show');
    Route::post('/Kursus/Pendaftaran/{kursus_id}', [UserController::class, 'kursusDaftar'])->name('Kursus.store');
    Route::get('/Riwayat-Pendaftaran', [UserController::class, 'riwayatPendaftaran'])->name('Riwayat.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
