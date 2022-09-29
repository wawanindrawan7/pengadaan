<?php

use App\Http\Controllers\AmandemenController;
use App\Http\Controllers\HpeItemController;
use App\Http\Controllers\ManajemenKontrakController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PelaksanaanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PenilaianVendorController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\UnitController;
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
    return redirect('login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pengadaan', [PengadaanController::class, 'view']);
Route::post('pengadaan/create', [PengadaanController::class, 'create']);
Route::post('pengadaan/import', [PengadaanController::class, 'import']);
Route::post('pengadaan/update', [PengadaanController::class, 'update']);
Route::get('pengadaan/delete', [PengadaanController::class, 'delete']);
Route::get('pengadaan/detail', [PengadaanController::class, 'pengadaanDetail']);
Route::get('pengadaan/submit', [PengadaanController::class, 'submit']);
Route::get('pengadaan/import', [PengadaanController::class, 'import']);
Route::post('pengadaan/file/create', [PengadaanController::class, 'pengadaanFileCreate']);
Route::get('pengadaan-file/delete', [PengadaanController::class, 'deleteFile']);

Route::get('perencana-pengadaan', [PerencanaanController::class, 'view']);
Route::get('perencana-pengadaan/submit', [PerencanaanController::class, 'submit']);
Route::get('perencana-pengadaan/detail', [PerencanaanController::class, 'detail']);
Route::get('perencana-pengadaan/form', [PerencanaanController::class, 'form']);
Route::post('perencana-pengadaan/create', [PerencanaanController::class, 'create']);
Route::post('perencana-pengadaan/update', [PerencanaanController::class, 'update']);
Route::post('perencana-pengadaan/update-nodin', [PerencanaanController::class, 'updateNoDin']);
Route::get('perencana-pengadaan/drp-export', [PerencanaanController::class, 'exportDrp']);
Route::get('perencana-pengadaan/pakta_integritas-export', [PerencanaanController::class, 'exportPaktaIntegritas']);
Route::get('perencana-pengadaan/hpe-export', [PerencanaanController::class, 'exportHpe']);


// Route::post('perencanaan/update', [PerencanaanController::class, 'update']);
// Route::get('perencanaan/delete', [PerencanaanController::class, 'delete']);
Route::post('perencana-pengadaan/file/create', [PerencanaanController::class, 'uploadFile']);
Route::get('perencanaan-file/delete', [PerencanaanController::class, 'deleteFile']);

Route::get('hpe/load-item', [HpeItemController::class, 'loadItem']);
Route::post('hpe/add-item', [HpeItemController::class, 'addItem']);
Route::get('hpe/delete-item', [HpeItemController::class, 'deleteItem']);

Route::get('pelaksana-pengadaan', [PelaksanaanController::class, 'view']);
Route::get('pelaksana-pengadaan/submit', [PelaksanaanController::class, 'submit']);
Route::post('pelaksanaan/create', [PelaksanaanController::class, 'create']);
Route::post('pelaksanaan/update', [PelaksanaanController::class, 'update']);
Route::post('pelaksanaan/create-idd', [PelaksanaanController::class, 'createIDD']);
Route::post('pelaksanaan/selesai', [PelaksanaanController::class, 'selesai']);
Route::get('pelaksanaan/delete', [PelaksanaanController::class, 'delete']);
Route::get('pelaksana-pengadaan/detail', [PelaksanaanController::class, 'detail']);
Route::post('pelaksana-pengadaan/file/create', [PelaksanaanController::class, 'uploadFile']);
Route::post('pelaksana-idd/file/create', [PelaksanaanController::class, 'uploadFileIDD']);
Route::get('pelaksanaan-file/delete', [PelaksanaanController::class, 'deleteFile']);

Route::get('manajemen-kontrak', [ManajemenKontrakController::class, 'view']);
Route::post('manajemen-kontrak/upload-penilaian', [ManajemenKontrakController::class, 'uploadPenilaianFile']);
Route::post('manajemen-kontrak/edit-penilaian-f1', [ManajemenKontrakController::class, 'editPenilaianF1']);
Route::post('manajemen-kontrak/edit-penilaian-f2', [ManajemenKontrakController::class, 'editPenilaianF2']);
Route::post('amandemen/create', [AmandemenController::class, 'create']);
Route::post('amandemen/update', [AmandemenController::class, 'update']);
Route::get('amandemen/delete', [AmandemenController::class, 'delete']);
Route::post('amandemen/file', [AmandemenController::class, 'amandemenFile']);
Route::get('amandemen-file/delete', [AmandemenController::class, 'deleteFile']);
Route::get('manajemen-kontrak/rekap', [ManajemenKontrakController::class, 'rekap']);
Route::get('manajemen-kontrak/rekap/export', [ManajemenKontrakController::class, 'export']);

Route::get('users', [UserController::class, 'view']);
Route::post('users/create', [UserController::class, 'create']);
Route::post('users/update', [UserController::class, 'update']);
Route::post('users/update-password', [UserController::class, 'updatePassword']);
Route::post('users/pointing-unit/create', [UserController::class, 'createUnit']);
Route::post('users/pointing-unit/update', [UserController::class, 'updateUnit']);
Route::get('users/delete', [UserController::class, 'delete']);
Route::get('users/import', [UserController::class, 'import']);

Route::get('unit', [UnitController::class, 'view']);
Route::post('unit/create', [UnitController::class, 'create']);
Route::post('unit/update', [UnitController::class, 'update']);
Route::get('unit/delete', [UnitController::class, 'delete']);

Route::get('mitra', [MitraController::class, 'view']);
Route::get('mitra/get-data', [MitraController::class, 'getData']);
Route::post('mitra/create', [MitraController::class, 'create']);
Route::post('mitra/update', [MitraController::class, 'update']);
Route::get('mitra/delete', [MitraController::class, 'delete']);
Route::get('mitra/import', [MitraController::class, 'import']);

Route::get('penilaian/form-errect', [PenilaianVendorController::class, 'formErrect']);
Route::post('penilaian-form-errect/create', [PenilaianVendorController::class, 'createForm1']);
Route::post('penilaian-form-khs/create', [PenilaianVendorController::class, 'createForm2']);

Route::get('penilaian/form-supply-only', [PenilaianVendorController::class, 'formSupplyOnly']);
Route::get('penilaian/form-supply-errect', [PenilaianVendorController::class, 'formSupplyErrect']);
Route::get('penilaian/form-khs_distribusi_niaga', [PenilaianVendorController::class, 'formKhsDistribusiNiaga']);
Route::get('penilaian/export', [PenilaianVendorController::class, 'export']);

Route::get('penilaian/rekap', [PenilaianVendorController::class, 'rekap']);
Route::get('penilaian/rekap/export', [PenilaianVendorController::class, 'exportRekap']);
