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

Route::post('perencanaan/create', [App\Http\Controllers\PerencanaanController::class, 'create']);
Route::post('perencanaan/update', [App\Http\Controllers\PerencanaanController::class, 'update']);
Route::get('perencanaan/delete', [App\Http\Controllers\PerencanaanController::class, 'delete']);
Route::post('perencanaan/file', [App\Http\Controllers\PerencanaanController::class, 'perencanaanFile']);
Route::get('perencanaan-file/delete', [App\Http\Controllers\PerencanaanController::class, 'deleteFile']);

Route::post('pelaksanaan/create', [App\Http\Controllers\PelaksanaanController::class, 'create']);
Route::post('pelaksanaan/update', [App\Http\Controllers\PelaksanaanController::class, 'update']);
Route::get('pelaksanaan/delete', [App\Http\Controllers\PelaksanaanController::class, 'delete']);
Route::post('pelaksanaan/file', [App\Http\Controllers\PelaksanaanController::class, 'perencanaanFile']);
Route::get('pelaksanaan-file/delete', [App\Http\Controllers\PelaksanaanController::class, 'deleteFile']);


