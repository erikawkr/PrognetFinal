<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\PengaduController;
use App\Http\Controllers\Admin\TrxAduanController;
use App\Http\Controllers\Admin\TrxAduanResponController;


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



// User pengaduan
Route::post('/admin/trx_aduan/grid',[TrxAduanController::class,'grid'])->name('trx_aduan.grid');
Route::get('/admin/trx_aduan/index',[TrxAduanController::class,'index'])->name('trx_aduan.index');
Route::get('/admin/trx_aduan/{id}/edit',[TrxAduanController::class,'edit'])->name('trx_aduan.edit');
Route::delete('/admin/trx_aduan/{id}',[TrxAduanController::class,'destroy'])->name('trx_aduan.delete');


Route::post('admin/trx_aduan_respon/grid',[TrxAduanResponController::class,'grid'])->name('trx_aduan_respon.grid');
Route::get('admin/trx_aduan_respon/index',[TrxAduanResponController::class,'index'])->name('trx_aduan_respon.index');
Route::get('admin/trx_aduan_respon/{id}/edit',[TrxAduanResponController::class,'edit'])->name('trx_aduan_respon.edit');
Route::delete('admin/trx_aduan_respon/{id}',[TrxAduanResponController::class,'destroy'])->name('trx_aduan_respon.delete');


//respone
Route::post('admin/master_respon/grid',[MasterResponController::class,'grid'])->name('master_respon.grid');
Route::get('admin/master_respon/index',[MasterResponController::class,'index'])->name('master_respon.index');
Route::get('admin/master_respon/{id}/edit',[MasterResponController::class,'edit'])->name('master_respon.edit');
Route::delete('admin/master_respon/{id}',[MasterResponController::class,'destroy'])->name('master_respon.delete');
