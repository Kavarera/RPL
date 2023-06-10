<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\PesananGudangController;
use App\Http\Controllers\PengirimanGudangController;
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








Route::get('/keuangan', function () {
    return view('keuangan.HomeKeuangan');
});
Route::get('/keuangan/biaya', function () {
    return view('keuangan.biaya');
});
Route::get('/keuangan/harga', function () {
    return view('keuangan.harga');
});
Route::get('/keuangan/pengeluaran', function () {
    return view('keuangan.pengeluaran');
});


Route::get('/direktur', function () {
    return view('derektur.HomeDirektur');
});



Route::get('/pajak', function () {
    return view('pajak.PajakHome');
});


Route::get('/sales', function () {
    return view('seles.HomeSales');
});

