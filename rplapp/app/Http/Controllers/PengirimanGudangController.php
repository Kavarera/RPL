<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListPesanan;
use App\Models\barang;

class PengirimanGudangController extends Controller
{
    public function showPage(){
        $listPesanan = ListPesanan::where('status','Proses Pengiriman')->get();
        return view('gudang.PengirimanGudang',['listPesanan'=>$listPesanan]);
    }
    public function validatePengiriman(Request $r){
        $lp = ListPesanan::find($r->input('idPesanan'));
        $barang = barang::where('nama',$lp->nama_barang)->first();
        
        if($r->input('status')==1){
            $lp->status = "Selesai";
            $lp->save();
            return redirect()->route('pengiriman_gudang');
        }
        else if($r->input('status')==0){
            $barang->stok = $barang->stok + $lp->stok;
            //dd($barang->stok);
            $lp->status="Dibatalkan";
            $barang->save();
            $lp->save();
            return redirect()->route('pengiriman_gudang');
        }
        
    }
}
