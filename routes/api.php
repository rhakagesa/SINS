<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
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

Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/show/{id}', [KelasController::class, 'show']);
Route::post('/kelas/post', [KelasController::class, 'store']);
Route::put('/kelas/update/{id}', [KelasController::class, 'update']);


Route::get('/nilai', [NilaiController::class, 'index']);
Route::post('/nilai/post', [NilaiController::class, 'store']);
Route::put('/nilai/update/{id}', [NilaiController::class, 'update']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa/post', [SiswaController::class, 'store']);
Route::put('/siswa/update/{id}', [SiswaController::class, 'update']);
