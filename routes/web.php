<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\TransaksiPembelianController;
use App\Http\Controllers\TransaksiPembelianBarangController;

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

Route::get('/', [TransaksiPembelianBarangController::class, 'index']);
Route::get('/daftar_transaksi', [TransaksiPembelianController::class, 'all_transaction']);
Route::get('/detail_transaksi/{id}', [TransaksiPembelianBarangController::class, 'show']);

Route::post('/simpan_transaksi', [TransaksiPembelianBarangController::class, 'store']);
Route::post('/bayar', [TransaksiPembelianController::class, 'store']);
