<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;

class LoginController extends Controller
{
    public function showLoginPage(){
        // Cek apakah sudah ada session aktif
        if (session()->has('userId')) { 
                if(session('userId')==1){
                    //dd($user);
                    return redirect('/gudang');
                }
                else if(session('userId')==2){
                    return redirect()->route('direktur');
                }
                else if(session('userId')==3){
                    return redirect()->route('keuangan');
                }
                else if(session('userId')==4){
                    return redirect()->route('pajak');
                }
                else if(session('userId')==5){
                    return redirect()->route('sales');
                } // Ganti dengan halaman yang sesuai
            // Jika sudah ada session, arahkan pengguna ke halaman lain
        }
        return view('Login.welcome');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        //var_dump($credentials);
        $user = karyawan::where('username', $credentials['username'])->first();
        //$user && password_verify($credentials['password'], $user->password)
        $idrole = $user->id_role;
        if ($user && ($credentials['password']== $user->password)) {
            session(['userId' => $idrole]);
            if($idrole==1){
                //dd($user);
                return redirect('/gudang');
            }
            if($idrole==2){
                return redirect()->route('direktur');
            }
            if($idrole==3){
                return redirect()->route('keuangan');
            }
            if($idrole==4){
                return redirect()->route('pajak');
            }
            if($idrole==5){
                return redirect()->route('sales');
            }
            // Jika credentials valid, lakukan tindakan sesuai kebutuhan (contoh: login pengguna)
            
        } else {
            // Jika credentials tidak valid, kembalikan ke halaman login dengan pesan error
            die('gagal');
            return redirect()->back()->withInput()->withErrors('Credentials tidak valid');
        }
    }

}
