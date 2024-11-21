<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('karyawans', KaryawanController::class);
Route::get('absensi', [AbsensiController::class, 'index'])->name('absensis.index');
// Route untuk tampilan halaman Scan Kartu
Route::get('absensi/scan/', [AbsensiController::class, 'scanView'])->name('absensis.scan');
