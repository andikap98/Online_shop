<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\Produk;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with('pemesanan')->get();
        $produk =  Produk::with('pemesanan')->get();
        $data = $customer->union($produk);
        return view('page.pemesanan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Produk::all();
        return view('page.pemesanan.create_pemesanan')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'kode_pemesanan' => $request->kode_pemesanan,
            'id_customer' => $request->id_customer,
            'id_produk' => $request->id_produk,
            'jumlah_beli' => $request->jumlah_beli,
            'jumlah_harga' => str_replace(['Rp ', '.'], '',$request->jumlah_harga),

        ];
        Pemesanan::create($data);
        return redirect()->route('pemesanan.create')->with('success','Data Pemesanan Berhasil Ditambahkan');
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
