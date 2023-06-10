<?php

namespace App\Http\Controllers;

use App\Models\permintaanbeli;
use App\Models\barang;
use Illuminate\Http\Request;

class HomeDirekturController extends Controller
{
    public function showPage(){
        $lpb = permintaanbeli::all();
        return view('derektur.HomeDirektur',['lpb'=>$lpb,'dpb'=>null,'baranga'=>null]);
    }

    public function detailPb(Request $r){
        $lpb = permintaanbeli::all();
        $getPb = $lpb->find($r->input('idPb'));
        $barang = barang::find($getPb->id_barang);
        //dd($barang);
        return view('derektur.HomeDirektur',['lpb'=>$lpb,'dpb'=>$getPb,'barang'=>$barang]);
    }

    public function konfirmasiBeli(Request $r){
        $stat = $r->input('stat');
        if($stat==1){
            $dpb = $r->input('idPb');
            $dpb = permintaanbeli::find($dpb);
            $dpb->delete();
        }
        return redirect()->route('direktur');
    }
}