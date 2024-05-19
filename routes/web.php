<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MonitorController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/', [MonitorController::class, 'index'])->name('monitor');
    Route::get('/landing-mobile', [MonitorController::class, 'indexMobile'])->name('landing.mobile');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login-post', [AuthController::class, 'loginPost']);
});


Route::group(['middleware' => ['auth:administrator']], function () {
    Route::get('/dosens',  [DosenController::class, 'index'])->name('dosen.lists');
    Route::get('/mahasiswas', [AdministratorController::class, 'mahasiswas'])->name('mahasiswa');
    Route::get('/mahasiswa/{nim}', [AdministratorController::class, 'editStudent']);
    Route::get('/mahasiswa-add/{key}', [AdministratorController::class, 'addStudent'])->name('add mahasiswa');
    Route::post('/mahasiswa-add-post/{key}', [AdministratorController::class, 'storeStudent']);
    Route::put('mahasiswa-edit-put/{key}', [AdministratorController::class, 'store']);
    Route::get('/dosen-add/{key}', [AdministratorController::class, 'addDosen']);
    Route::post('/dosen-add-post/{key}', [AdministratorController::class, 'storeDosen']);
    Route::get('/administrator-dashboard' . '/' . '{username}', [AdministratorController::class, 'dashboard'])->name('administrator.dashboard');
    Route::get('/my-session', [AuthController::class, 'session']);
    Route::get('/logout-admin', [AuthController::class, 'logout'])->name('logout-admin');
});

Route::group(['middleware' => ['auth:mahasiswa']], function () {
    Route::get('/mahasiswa-dashboard' . '/' . '{username}', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::put('mahasiswa-put/{nim}', [MahasiswaController::class, 'store']);
    Route::get('/change-password/{username}', [MahasiswaController::class, 'gantiPassword']);
    Route::put('change-password-put/{nim}', [MahasiswaController::class, 'storeGantiPassword']);
    Route::get('/ambil-antrian' . '/{nim}', [MahasiswaController::class, 'ambilAntrian']);
    Route::post('/antrian-add-post', [MahasiswaController::class, 'createAntrian']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
