<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = Customer::all();
            return view('page.customer.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.customer.create_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Form tidak boleh kosong',
            'max' => [
                'telp'=> 'No Telepon yang anda masukan lebih dari 12',
                'alamat'=> 'Alamat yang anda masukan terlalu panjang',
            ],
            'min' => 'No Telepon yang anda masukan kurang dari 12',
            'unique' => 'Email yang anda masukan sudah terdaftar'
            
        ];
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:customer,email',
            'telp'=>'required|min:10|max:12',
            'alamat'=>'required|max:255',
        ], $message);
        $data = Customer::create($request->all());
        return redirect()->route('customer.index')->with('success','Data Customer Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customer::find($id);
        return view('page.customer.detail_customer')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::find($id);
        return view('page.customer.edit_customer')->with('data', $data);
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
        $message = [
            'required' => 'Form tidak boleh kosong',
            'max' => [
                'telp'=> 'No Telepon yang anda masukan lebih dari 12',
                'alamat'=> 'Alamat yang anda masukan terlalu panjang',
            ],
            'min' => 'No Telepon yang anda masukan kurang dari 12',
            
        ];
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email',
            'telp'=>'required|min:10|max:12',
            'alamat'=>'required|max:255',
        ], $message);
        $cekEmail = Customer::find($id);
        // Jika email baru yang diinput tidak sama dengan email lama
        if ($request->email != $cekEmail->email) {
            // Mengecek apakah email baru sudah terdaftar atau belum
            $isEmailExists = Customer::where('email', $request->email)->exists();
            if ($isEmailExists) {
                return redirect()->back()->withErrors(['email' => 'Email sudah terdaftar.'])->withInput();
            }
        }
            $data = $request->except(['_token','_method']);
            $data = Customer::where('id',$id)->update($data);
            return redirect()->route('customer.index')->with('success','Data Customer Berhasil Diubah');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        return redirect()->route('customer.index')->with('success','Data Customer Berhasil Dihapus');
    }
}
