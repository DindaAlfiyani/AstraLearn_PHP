<?php

use App\Http\Controllers\AstraLearnController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SoalExamController;
use App\Http\Controllers\SoalExerciseController;
use App\Http\Controllers\UserController;
use App\Models\KlasifikasiModel;
use App\Models\SoalExerciseModel;
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

Route::get('pelatihan/indexAdmin', [PelatihanController::class,'indexAdmin'])->name('pelatihan.indexAdmin');
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
Route::get('section/create', [SectionController::class,'create'])->name('section.create');
Route::post('section/store', [SectionController::class,'store'])->name('section.store');
Route::get('section/edit/{id}', [SectionController::class,'edit'])->name('section.edit');
Route::put('section/update/{id}', [SectionController::class,'update'])->name('section.update');
Route::get('section/delete/{id}', [SectionController::class,'destroy'])->name('section.delete');
Route::get('section/video/{id}', [SectionController::class,'video'])->name('section.video');

Route::get('soalexercise', [SoalExerciseController::class,'index'])->name('soalexercise.index');
Route::get('soalexercise/create', [SoalExerciseController::class,'create'])->name('soalexercise.create');
Route::post('soalexercise/nilai', [SoalExerciseController::class,'nilai'])->name('soalexercise.nilai');
Route::post('soalexercise/store', [SoalExerciseController::class,'store'])->name('soalexercise.store');
Route::get('soalexercise/edit/{id}', [SoalExerciseController::class,'edit'])->name('soalexercise.edit');
Route::put('soalexercise/update/{id}', [SoalExerciseController::class,'update'])->name('soalexercise.update');
Route::get('soalexercise/delete/{id}', [SoalExerciseController::class,'destroy'])->name('soalexercise.delete');
Route::post('soalexercise/submit', [SoalExerciseController::class, 'submit'])->name('soalexercise.submit');

Route::get('soalexam', [SoalExamController::class,'index'])->name('soalexam.index');
Route::get('soalexam/create', [SoalExamController::class,'create'])->name('soalexam.create');
Route::post('soalexam/store', [SoalExamController::class,'store'])->name('soalexam.store');
Route::get('soalexam/edit/{id}', [SoalExamController::class,'edit'])->name('soalexam.edit');
Route::put('soalexam/update/{id}', [SoalExamController::class,'update'])->name('soalexam.update');
Route::get('soalexam/delete/{id}', [SoalExamController::class,'destroy'])->name('soalexam.delete');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');