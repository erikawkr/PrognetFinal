<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\PengaduController;
use App\Http\Controllers\Admin\Master\ResponderController;
use App\Http\Controllers\Admin\Master\JenisAduanController;
use App\Http\Controllers\Admin\TrxAduanController;
use App\Http\Controllers\Admin\TrxAduanResponController;
use App\Http\Controllers\Admin\GenerateAduanController;



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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::post('/admin/master_pengaduan/grid',[PengaduController::class,'grid'])->name('master_pengaduan.grid');
Route::get('/admin/master_pengaduan/index',[PengaduController::class,'index'])->name('master_pengaduan.index');
Route::get('/admin/master_pengaduan/{id}/edit',[PengaduController::class,'edit'])->name('master_pengaduan.edit');
Route::delete('/admin/master_pengaduan/{id}',[PengaduController::class,'destroy'])->name('master_pengaduan.delete');

//respone
Route::post('/admin/master_respon/grid',[ResponderController::class,'grid'])->name('master_respon.grid');
Route::get('/admin/master_respon/index',[ResponderController::class,'index'])->name('master_respon.index');
Route::get('/admin/master_respon/{id}/edit',[ResponderController::class,'edit'])->name('master_respon.edit');
Route::delete('/admin/master_respon/{id}',[ResponderController::class,'destroy'])->name('master_respon.delete');



// User pengaduan
Route::get('admin/trx_aduan/create',[TrxAduanController::class,'create'])->name('trx_aduan.create');
Route::post('admin/trx_aduan/store',[TrxAduanController::class,'store'])->name('trx_aduan.store');
Route::post('/admin/trx_aduan/grid',[TrxAduanController::class,'grid'])->name('trx_aduan.grid');
Route::get('/admin/trx_aduan/index',[TrxAduanController::class,'index'])->name('trx_aduan.index');
Route::get('/admin/trx_aduan/{id}/edit',[TrxAduanController::class,'edit'])->name('trx_aduan.edit');
Route::delete('/admin/trx_aduan/{id}',[TrxAduanController::class,'destroy'])->name('trx_aduan.delete');


Route::post('/admin/trx_aduan_respon/grid',[TrxAduanResponController::class,'grid'])->name('trx_aduan_respon.grid');
Route::get('/admin/trx_aduan_respon/index',[TrxAduanResponController::class,'index'])->name('trx_aduan_respon.index');
// Route::get('/admin/trx_aduan_respon/{id}/edit',[TrxAduanResponController::class,'edit'])->name('trx_aduan_respon.edit');
// Route::delete('/admin/trx_aduan_respon/{id}',[TrxAduanResponController::class,'destroy'])->name('trx_aduan_respon.delete');

//transaksi generate
Route::get('admin/trx_generate/create',[GenerateAduanController::class,'create'])->name('trx_generate.create');
Route::post('admin/trx_generate/store',[GenerateAduanController::class,'store'])->name('trx_generate.store');



Route::post('/admin/master_jenis_aduan/grid',[JenisAduanController::class,'grid'])->name('master_jenis_aduan.grid');
Route::get('/admin/master_jenis_aduan/index',[JenisAduanController::class,'index'])->name('master_jenis_aduan.index');
Route::get('/admin/master_jenis_aduan/{id}/edit',[JenisAduanController::class,'edit'])->name('master_jenis_aduan.edit');
Route::delete('/admin/master_jenis_aduan/{id}',[JenisAduanController::class,'destroy'])->name('master_jenis_aduan.delete');
