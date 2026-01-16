<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MahasiswaMataKuliahController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\ProfilController;
use App\Http\Controllers\Mahasiswa\NilaiController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect()->route('login'));

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('index');

        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('mata-kuliah', MataKuliahController::class);
        Route::resource('mahasiswa_mata_kuliah', MahasiswaMataKuliahController::class);
    });

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/
Route::prefix('mahasiswa')
    ->name('mahasiswa.')
    ->middleware(['auth', 'role:mahasiswa'])
    ->group(function () {

        Route::get('/', [MahasiswaDashboardController::class, 'index'])
            ->name('index');

        Route::get('profil', [ProfilController::class, 'index'])
            ->name('profil.index');

        Route::post('profil', [ProfilController::class, 'update'])
            ->name('profil.update');

        Route::get('nilai', [NilaiController::class, 'index'])
            ->name('nilai.index');
    });
