<?php

namespace App\Http\Controllers;

use App\Models\biayaOperasional;
use App\Models\barang;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function showPage(){
        $bo = biayaOperasional::all();
        return view('keuangan.Biaya',['datas'=>$bo,'modal'=>false,'barang'=>null]);
    }
    public function addBiaya(Request $r){
        $bo = new biayaOperasional;
        $bo->nama = $r->input('nama');
        $bo->harga=$r->input('harga');
        $bo->save();
        return redirect()->route('biaya');
    }
    public function showModalBiaya(){
        $bo = biayaOperasional::all();
        return view('keuangan.Biaya',['datas'=>$bo,'modal'=>true,'barang'=>null]);
    }

    public function showHargaPage(){
        $barang = barang::all();
        return view('keuangan.Harga',['datas'=>$barang,'modal'=>false,'barang'=>null]);
    }

    public function showHargaModal($id){
        $barang = barang::find($id);
        if($barang!=null){
            return view('keuangan.Harga',['datas'=>barang::all(),'modal'=>true,'barang'=>$barang]);
        }
        else{
            return redirect()->route('harga');
        }
    }
    public function submitHarga(Request $r){
        $b = barang::find($r->input('id'));
        $b->nama = $r->input('nama');
        $b->harga_beli = $r->input('harga');
        $b->harga_jual = $b->harga_beli+($b->harga_beli*$r->input('harga')/100);
        $b->save();
        return redirect()->route('harga');
    }
    public function hapusHarga($id){
        $b = barang::find($id);
        if(!empty($b)){
            $b->delete();
            return redirect()->route('harga');
        }
        return redirect()->route('harga');
    }
}

