<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\permintaanbeli;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function showGudangPage(){
        if (session()->has('userId')) {
            if(session('userId')!=1){
                return redirect()->route('login');
            }
            else{
                $barangs = barang::all();
                return view('gudang.gudang',['barangs' => $barangs ,'data'=>null]);
            }
        }
    }

    public function deleteBarang(Request $r){
        $id = $r->input('id');
        $barang = barang::find($id);
        $barang->delete();
        return redirect()->route('gudang');
    }

    public function storeBarang(Request $r){
        $barangEdit = barang::find($r->input('idb'));
        return view('gudang.gudang',['barangs' => barang::all(),'data'=>$barangEdit]);
    }

    public function updateBarang(Request $r){
        //dd($r->input('nama'));
        $nama = $r->input('nama');
        $stok = $r->input('stok');
        $id = $r->input('idBarang');
        $barang = barang::find($id);
        $barang->nama=$nama;
        $barang->stok=$stok;
        $barang->save();
        return redirect()->route('gudang');
    }

    public function beliBarang($id){
        //permintaan beli ke direktur
        $pb = new permintaanbeli;
        $pb->idKaryawan = session('userId');
        $pb->id_barang = $id;        
        $pb->save();


        // $barang = barang::find($id);
        // $barang->stok+=100;
        // $barang->save(); 
        return redirect()->route('gudang');
    }
    
}
