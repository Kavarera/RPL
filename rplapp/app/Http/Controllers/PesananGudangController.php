<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\ListPesanan;
use Illuminate\Http\Request;

class PesananGudangController extends Controller
{
    public function showPage(){
        $listPesanan = ListPesanan::where('status','Menunggu Konfirmasi')->get();
        return view('gudang.PesananGudang',['listPesanan'=>$listPesanan]);
    }
    public function validasiPesanan(Request $r){
        $lp = ListPesanan::find($r->input('idPesanan'));
        $stat = $r->input('status');
        $barang = barang::where('nama',$lp->nama_barang)->first();
        //dd($barang);
        if($stat==1){
            $barang->stok = $barang->stok - $lp->stok;
            //dd($barang->stok);
            $lp->status="Proses Pengiriman";
            $barang->save();
            $lp->save();
            return redirect()->route('pesanan_gudang');
        }
        else if($stat==0){
            $lp->delete();
        }
        // dd($r);


    }
}
