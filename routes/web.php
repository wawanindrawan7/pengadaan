<?php

use App\Http\Controllers\AmandemenController;
use App\Http\Controllers\HpeItemController;
use App\Http\Controllers\PelaksanaanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\UserController;
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

Route::get('pengadaan', [PengadaanController::class, 'view']);
Route::post('pengadaan/create', [PengadaanController::class, 'create']);
Route::post('pengadaan/update', [PengadaanController::class, 'update']);
Route::get('pengadaan/delete', [PengadaanController::class, 'delete']);
Route::get('pengadaan/detail', [PengadaanController::class, 'pengadaanDetail']);
Route::post('pengadaan/detail/create', [PengadaanController::class, 'pengadaanDetailCreate']);
Route::get('pengadaan-file/delete', [PengadaanController::class, 'deleteFile']);

Route::get('perencana-pengadaan', [PerencanaanController::class, 'view']);
Route::get('perencana-pengadaan/form', [PerencanaanController::class, 'form']);
Route::post('perencana-pengadaan/create', [PerencanaanController::class, 'create']);
Route::post('perencanaan/update', [PerencanaanController::class, 'update']);
Route::get('perencanaan/delete', [PerencanaanController::class, 'delete']);
Route::post('perencanaan/file', [PerencanaanController::class, 'perencanaanFile']);
Route::get('perencanaan-file/delete', [PerencanaanController::class, 'deleteFile']);

Route::get('hpe/load-item',[HpeItemController::class,'loadItem']);
Route::post('hpe/add-item',[HpeItemController::class,'addItem']);
Route::get('hpe/delete-item',[HpeItemController::class,'deleteItem']);

Route::post('pelaksanaan/create', [PelaksanaanController::class, 'create']);
Route::post('pelaksanaan/update', [PelaksanaanController::class, 'update']);
Route::get('pelaksanaan/delete', [PelaksanaanController::class, 'delete']);
Route::post('pelaksanaan/file', [PelaksanaanController::class, 'pelaksanaanFile']);
Route::get('pelaksanaan-file/delete', [PelaksanaanController::class, 'deleteFile']);

Route::post('amandemen/create', [AmandemenController::class, 'create']);
Route::post('amandemen/update', [AmandemenController::class, 'update']);
Route::get('amandemen/delete', [AmandemenController::class, 'delete']);
Route::post('amandemen/file', [AmandemenController::class, 'amandemenFile']);
Route::get('amandemen-file/delete', [AmandemenController::class, 'deleteFile']);

Route::get('users', [UserController::class, 'view']);
Route::post('users/create', [UserController::class, 'create']);
Route::get('users/delete', [UserController::class, 'delete']);


