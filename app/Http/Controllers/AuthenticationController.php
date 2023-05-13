<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthenticationController extends Controller
{
    //
    function index(){
        return view('login.index');
    }

    function authenticate(Request $request){

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($data)){
            return redirect()->to('dashboard');
        }else{
            $LoginErrors = Session::get('LoginErrors',0);
            $LoginErrors++;
            Session::put('LoginErrors' ,$LoginErrors);

            if($LoginErrors>=3){    
                return redirect()->back()->with('error', 'Terjadi Kesalahan Login 3 Kali Silahkan <a href="#">Hubungi Admin</a>')->withInput();
            }
            else{
                return redirect()->back()->with('error', 'Email atau Password yang Anda Masukkan Salah');
            }
              
        }
    }

    function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/auth');


    }
}
