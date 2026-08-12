<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::get('peserta', [PesertaController::class, 'index']);
Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta-create');
Route::post('peserta/create', [PesertaController::class, 'store'])->name('peserta-store');
