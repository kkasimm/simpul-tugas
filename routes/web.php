<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\PenugasanController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Guru\PengumpulanController;
use App\Http\Controllers\Guru\TugasController as GuruTugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\TugasController as SiswaTugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/lupa-password', [ForgotPasswordController::class, 'create'])->name('password.request')->middleware('guest');
Route::post('/lupa-password', [ForgotPasswordController::class, 'store'])->name('password.email')->middleware('guest');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'edit'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.update')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/ganti-password', [ProfileController::class, 'updatePassword'])->name('password.change');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('kelas', KelasController::class)->except('show');
        Route::resource('mapel', MapelController::class)->except('show');
        Route::resource('siswa', AdminSiswaController::class)->except('show');
        Route::resource('guru', AdminGuruController::class)->except('show');
        Route::resource('penugasan', PenugasanController::class)->only(['index', 'create', 'store', 'destroy']);
    });

    Route::middleware('role:guru')->prefix('guru')->name('guru.')->group(function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
        Route::resource('tugas', GuruTugasController::class)->except('show');
        Route::get('/tugas/{tugas}/pengumpulan', [PengumpulanController::class, 'index'])->name('tugas.pengumpulan');
        Route::put('/pengumpulan/{pengumpulan}', [PengumpulanController::class, 'update'])->name('pengumpulan.update');
        Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
    });

    Route::middleware('role:siswa')->prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
        Route::get('/tugas', [SiswaTugasController::class, 'index'])->name('tugas.index');
        Route::get('/tugas/{tugas}', [SiswaTugasController::class, 'show'])->name('tugas.show');
        Route::post('/tugas/{tugas}', [SiswaTugasController::class, 'store'])->name('tugas.store');
    });
});
