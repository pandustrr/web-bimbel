<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TutorController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Siswa\BerandaController;
use App\Http\Controllers\Siswa\TutorController as SiswaTutorController;
use App\Http\Controllers\Siswa\JadwalController as SiswaJadwalController;
use App\Http\Controllers\Siswa\PendaftaranController as SiswaPendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tutors', [SiswaTutorController::class, 'index'])->name('siswa.tutors.index');
Route::get('/jadwals', [SiswaJadwalController::class, 'index'])->name('siswa.jadwals.index');
// Route untuk siswa
Route::get('/jadwals/pilih', [SiswaPendaftaranController::class, 'pilihJadwal'])->name('siswa.jadwals.pilih');
Route::post('/jadwals/pilih/{id}', [SiswaPendaftaranController::class, 'simpanJadwal'])->name('siswa.jadwals.simpan');


Route::get('/pendaftaran', [SiswaPendaftaranController::class, 'create'])->name('siswa.pendaftaran.create');
Route::post('/pendaftaran', [SiswaPendaftaranController::class, 'store'])->name('siswa.pendaftaran.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('tutors', TutorController::class);

        Route::resource('jadwals', JadwalController::class);

        Route::get('pendaftarans', [PendaftaranController::class, 'index'])->name('pendaftarans.index');
        Route::put('pendaftarans/{pendaftaran}/update-status', [PendaftaranController::class, 'updateStatus'])
            ->name('pendaftarans.update-status');
        Route::delete('pendaftarans/{pendaftaran}', [PendaftaranController::class, 'destroy'])
            ->name('pendaftarans.destroy');
    });
});
