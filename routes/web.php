<?php

use App\Http\Controllers\AstraLearnController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Models\KlasifikasiModel;
use Illuminate\Support\Facades\Route;

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

Route::get('AstraLearn', [AstraLearnController::class,'index'])->name('AstraLearn.index');
Route::get('Login', [AstraLearnController::class,'index2'])->name('Login.index');
Route::get('Halaman_Pelatih', [AstraLearnController::class,'halaman_pelatih'])->name('Halaman_Pelatih.index');

Route::get('pelatihan', [PelatihanController::class,'index'])->name('pelatihan.index');
Route::get('pelatihan/create', [PelatihanController::class,'create'])->name('pelatihan.create');
Route::post('pelatihan/store', [PelatihanController::class,'store'])->name('pelatihan.store');
Route::get('pelatihan/edit/{id}', [PelatihanController::class,'edit'])->name('pelatihan.edit');
Route::put('pelatihan/update/{id}', [PelatihanController::class,'update'])->name('pelatihan.update');
Route::get('pelatihan/delete/{id}', [PelatihanController::class,'destroy'])->name('pelatihan.delete');

Route::get('pengguna', [PenggunaController::class,'index'])->name('pengguna.index');
Route::get('pengguna/create', [PenggunaController::class,'create'])->name('pengguna.create');
Route::post('pengguna/store', [PenggunaController::class,'store'])->name('pengguna.store');
Route::get('pengguna/edit/{id}', [PenggunaController::class,'edit'])->name('pengguna.edit');
Route::put('pengguna/update/{id}', [PenggunaController::class,'update'])->name('pengguna.update');
Route::get('pengguna/delete/{id}', [PenggunaController::class,'destroy'])->name('pengguna.delete');

Route::get('klasifikasi', [KlasifikasiController::class,'index'])->name('klasifikasi.index');
Route::get('klasifikasi/create', [KlasifikasiController::class,'create'])->name('klasifikasi.create');
Route::post('klasifikasi/store', [KlasifikasiController::class,'store'])->name('klasifikasi.store');
Route::get('klasifikasi/edit/{id}', [KlasifikasiController::class,'edit'])->name('klasifikasi.edit');
Route::put('klasifikasi/update/{id}', [KlasifikasiController::class,'update'])->name('klasifikasi.update');
Route::get('klasifikasi/delete/{id}', [KlasifikasiController::class,'destroy'])->name('klasifikasi.delete');

Route::get('section', [SectionController::class,'index'])->name('section.index');
Route::get('section/create/{id}', [SectionController::class,'create'])->name('section.create');
Route::post('section/store', [SectionController::class,'store'])->name('section.store');
Route::get('section/edit/{id}', [SectionController::class,'edit'])->name('section.edit');
Route::put('section/update/{id}', [SectionController::class,'update'])->name('section.update');
Route::get('section/delete/{id}', [SectionController::class,'destroy'])->name('section.delete');