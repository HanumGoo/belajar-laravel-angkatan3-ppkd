<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('action-login');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('role', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
//get: lihat dan baca
//post: mengirim data dari form, aksinya insert
//put: mengirim data dari form, aksinya update
//delete: mengirim data dari form, aksinya delete
//patch: mengirim data dari form, aksinya update
Route::get('salam', [BelajarController::class, 'greeting']);
Route::get('hitung-tambah', [BelajarController::class, 'tambah'])->name('tambah');

Route::get('hitung-kurang', [BelajarController::class, 'indexKurang'])->name('kurang');
Route::post('action-kurang', [BelajarController::class, 'kurang'])->name("action-kurang");

Route::get('hitung-kali', [BelajarController::class, 'indexKali'])->name('kali');
Route::post('action-kali', [BelajarController::class, 'kali'])->name("action-kali");

Route::get('hitung-bagi', [BelajarController::class, 'indexBagi'])->name('bagi');
Route::post('action-bagi', [BelajarController::class, 'bagi'])->name("action-bagi");

Route::get('counting', [BelajarController::class, 'index'])->name('counting');

//peserta crud
Route::get('peserta', [PesertaController::class, 'index'])->name('peserta');
Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta-create');
Route::post('peserta/create', [PesertaController::class, 'store'])->name('peserta-store');
Route::get('peserta/edit/{id}', [PesertaController::class, 'edit'])->name('peserta-edit');
Route::put('peserta/edit/{id}', [PesertaController::class, 'update'])->name('peserta-update');
Route::delete('peserta/delete/{id}', [PesertaController::class, 'delete'])->name('peserta-delete');

//role crud

