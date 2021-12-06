<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\BuktiController;
use App\Http\Controllers\BuktiAdminController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\AbsenAdminController;



Route::get('/', function () {
    return view('welcome');
});

route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::group(['middleware' => ['auth','ceklevel:siswa']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');
    route::post('simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/presensi-index',[PresensiController::class,'index'])->name('presensi-index'); 
    route::get('/presensi-masuk',[PresensiController::class,'masuk'])->name('presensi-Masuk');    
    route::get('/tampil',[BuktiController::class,'index'])->name('tampil'); 
    route::get('/presensi-keluar',[PresensiController::class,'keluar'])->name('presensi-keluar');   
    Route::post('ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
    Route::get('filter-data',[PresensiController::class,'halamanrekap'])->name('filter-data'); 
    Route::get('data-tersimpan',[PresensiController::class,'tersimpan'])->name('tampil-data');
    Route::get('/Presensi-bukti',[BuktiController::class,'bukti'])->name('presensi-Bukti');
    Route::post('/simpan-bukti',[BuktiController::class,'proses_upload'])->name('proses_upload');
});

Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');
    Route::resource('buktis', BuktiAdminController::class);
    // rayon
    Route::resource('rayons', RayonController::class);
    Route::resource('rombels', RombelController::class);
    Route::resource('presensis', AbsenAdminController::class);
    route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
    route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
});
