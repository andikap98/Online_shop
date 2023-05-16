<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Produk::all();
        return view('page.produk.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.produk.create_produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_produk'=>'required',
            'harga_produk'=>'required',
            'stok'=>'required',
            'foto_produk'=>'required',
            'deskripsi'=> 'required',

        ]);
        
        
        if($request->hasFile('foto_produk')){
            $file = $request->file('foto_produk');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
        }else{
            $filename = null;
        }

        $data=[
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok' => $request->stok,
            'foto_produk' => $filename,
            'deskripsi' => $request->deskripsi,

        ]; 
        if($filename === null){
            return redirect()->back()->withErrors(['foto_produk'=>'Foto harus diunggah']);
        }
         
        Produk::create($data);
        return redirect()->route('produk.index')->with('success','Data Berhasil Ditambahkan');
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
        Produk::where('id', $id)->delete();
        return redirect()->route('produk.index')->with('success','Data Produk Berhasil Dihapus');
    }
}
