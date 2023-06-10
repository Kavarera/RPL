<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function showPage(){
        //dd(session('userId));
        
        if (session()->has('userId')) {
            if(session('userId')!=4){
                return redirect()->route('login');
            }
            else{
                $k = karyawan::find(session('userId'));
                return view('pajak.PajakHome',['user'=>$k]);
            }
        }
        else{
            return redirect()->route('login');
        }
    }
}
