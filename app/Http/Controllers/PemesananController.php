<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.pemesanan.create_pemesanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchDetail(Request $request){

        $email = $request->email;
        $user =  Customer::where('email' , $email)->first();

        if($user){
            return response()->json([
                'status' => 'success',
                'nama' => $user->nama,
                'telepon' => $user->telepon,
                'id' => $user->id
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        
        }

    }
}
