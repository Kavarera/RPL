<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeDirekturController;
use App\Http\Controllers\HomeKeuanganController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\PesananGudangController;
use App\Http\Controllers\PengirimanGudangController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/', [LoginController::class, 'showLoginPage'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginVerify');

Route::get('/gudang', [GudangController::class,'showGudangPage'])->name('gudang');
Route::delete('/gudang', [GudangController::class,'deleteBarang'])->name('deleteBarang');
Route::post('/gudang/update', [GudangController::class,'storeBarang'])->name('store_barang');

Route::post('/gudang',[GudangController::class,'updateBarang'])->name('update_barang');
Route::get('/gudang/beli/{id}',[GudangController::class,'beliBarang'])->name('beli_barang');


Route::get('/gudang/pesanan', [PesananGudangController::class,'showPage'])->name('pesanan_gudang');
Route::post('/gudang/pesanan',[PesananGudangController::class,'validasiPesanan'])->name('validasi_pesanan');

Route::get('/gudang/pengiriman', [PengirimanGudangController::class,'showPage'])->name('pengiriman_gudang');
Route::post('/gudang/pengiriman/validasi', [PengirimanGudangController::class,'validatePengiriman'])->name('validate_pengiriman');



Route::get('/direktur', [HomeDirekturController::class,'showPage'])->name('direktur');
Route::post('/direktur/detail/{id}',[HomeDirekturController::class,'detailPb'])->name('showPb');
Route::post('/direktur/konfirmasi',[HomeDirekturController::class,'konfirmasiBeli'])->name('konfirmasi_beli');







Route::get('/keuangan', [HomeKeuanganController::class,'showPage'])->name('keuangan');
Route::get('/keuangan/biaya', [HargaController::class,'showPage'])->name('biaya');
Route::post('/keuangan/biaya/add', [HargaController::class,'addBiaya'])->name('addBiaya');
Route::get('/keuangan/biaya/modal',[HargaController::class, 'showModalBiaya'])->name('showModalBiaya');

Route::get('/keuangan/harga', [HargaController::class,'showHargaPage'])->name('harga');
Route::get('/keuangan/harga/modal/{id}', [HargaController::class,'showHargaModal'])->name('showHargaModal');
Route::post('/keuangan/harga/submit', [HargaController::class,'submitHarga'])->name('submitHarga');
Route::get('/keuangan/harga/hapus/{id}',[HargaController::class,'hapusHarga'])->name('hapusHarga');


Route::get('/keuangan/pengeluaran', [HomeKeuanganController::class,'showPengeluaran'])->name('pengeluaran');
Route::get('/keuangan/pengeluaran/add',[HomeKeuanganController::class,'showModalPengeluaran'])->name('add_pengeluaran');
Route::post('keuangan/pengeluaran/submit',[HomeKeuanganController::class,'submitPengeluaran'])->name('submitPengeluaran');

Route::get('/pajak', [PajakController::class,'showPage'])->name('pajak');


Route::get('/sales', [SalesController::class,'showPage'])->name('sales');
Route::post('/sales/addPemesan',[SalesController::class,'addPemesan'])->name('addPemesan');

