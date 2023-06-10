<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\datapemesanan;
use App\Models\ListPesanan;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function showPage(){
        if (session()->has('userId')) {
            if(session('userId')!=5){
                return redirect()->route('login');
            }
            else{
                $barang = barang::pluck('nama');
                return view('seles/HomeSales',['barang'=>$barang]);
            }
        }
    }

    public function addPemesan(Request $r){
        $dp = new datapemesanan;
        if(!empty($r->input())){
            $dp->nama_perusahaan = $r->input('namaPerusahaan');
            $dp->nama_barang=$r->input('barang');
            $dp->jumlah=$r->input('jumlah');
            $dp->tipe_pembayaran=$r->input('pembayaran');
            $dp->alamat = $r->input('alamat');
            $dp->save();
            $lp = new ListPesanan;
            $lp->status="Menunggu Konfirmasi";
            $lp->nama_barang = $dp->nama_barang;
            $lp->stok = $dp->jumlah;
            $lp->nama_pembeli = $dp->nama_perusahaan;
            $lp->kontak_pembeli = $dp->nama_perusahaan;
            $lp->no_hp_pembeli = $dp->nama_perusahaan;
            $lp->alamat_pembeli = $dp->alamat;
            $lp->save();
            return redirect()->route('sales');
        }

    }
}
