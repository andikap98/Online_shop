<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class SearchPemesananController extends Controller
{
    public function searchDetail(Request $request){

        $email = $request->email;
        $user =  Customer::where('email' , $email)->first();

        if($user){
            return response()->json([
                'status' => 'success',
                'nama' => $user->nama,
                'telp' => $user->telp,
                'id' => $user->id
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        
        }

    }
}
