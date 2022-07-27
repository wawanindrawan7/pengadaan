<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pengadaan', [App\Http\Controllers\PengadaanController::class, 'view']);
Route::post('pengadaan/create', [App\Http\Controllers\PengadaanController::class, 'create']);
Route::post('pengadaan/update', [App\Http\Controllers\PengadaanController::class, 'update']);
Route::get('pengadaan/delete', [App\Http\Controllers\PengadaanController::class, 'delete']);
Route::get('pengadaan/detail', [App\Http\Controllers\PengadaanController::class, 'pengadaanDetail']);
Route::post('pengadaan/detail/create', [App\Http\Controllers\PengadaanController::class, 'pengadaanDetailCreate']);
Route::get('pengadaan-file/delete', [App\Http\Controllers\PengadaanController::class, 'deleteFile']);

// Route::get('usulan', [App\Http\Controllers\UsulanController::class, 'view']);
// Route::post('usulan/create', [App\Http\Controllers\UsulanController::class, 'create']);
// Route::post('usulan/update', [App\Http\Controllers\UsulanController::class, 'update']);
// Route::get('usulan/delete', [App\Http\Controllers\UsulanController::class, 'delete']);
// Route::get('usulan/file', [App\Http\Controllers\UsulanController::class, 'usulanFile']);


