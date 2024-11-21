<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RfidController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API untuk scanning kartu
Route::post('api/absensi/scan', [AbsensiController::class, 'scan']);

Route::post('/rfid', [RfidController::class, 'store']);

Route::get('/rfid', function () {
    return response()->json([
        'rfid' => session('rfid_uid')
    ]);
});
