<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pembelianbarang;
use Illuminate\Http\Request;

class HomeKeuanganController extends Controller
{
    public function showPage(){
        if (session()->has('userId')) {
            if(session('userId')!=3){
                return redirect()->route('login');
            }
            else{
                return view('keuangan.HomeKeuangan');
            }
        }
    }

    public function showPengeluaran(){
        if (session()->has('userId')) {
            if(session('userId')!=3){
                return redirect()->route('login');
            }
            else{
                $listPb = pembelianbarang::all();
                $collectiondata =[];
                foreach($listPb as $p){
                    $tempB = barang::find($p->id_barang);
                    $data['pb'] = $p;
                    $data['barang'] = $tempB;
                    $collectiondata[] = $data;
                }
                //dd($collectiondata);
                return view('keuangan.Pengeluaran',['datas'=>$collectiondata,'modal'=>false]);
            }
        }
    }

    public function showModalPengeluaran(){
        $listPb = pembelianbarang::all();
        $collectiondata =[];
        foreach($listPb as $p){
            $tempB = barang::find($p->id_barang);
            $data['pb'] = $p;
            $data['barang'] = $tempB;
            $collectiondata[] = $data;
        }
        return view('keuangan.Pengeluaran',['datas'=>$collectiondata,'modal'=>true]);
    }
    public function submitPengeluaran(Request $r){
        $npb = new pembelianbarang;
        $npb->id_barang = 7;
        $npb->jumlah = $r->input('banyakbarang');
        $npb->total_harga = $r->input('harga')*$npb->jumlah;
        $npb->save();
        return $this->showPengeluaran();
    }
}
