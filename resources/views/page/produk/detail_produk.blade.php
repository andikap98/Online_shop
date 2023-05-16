@extends('layout.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Detail Data Produk </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tabel Data Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Produk</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <form class="forms-sample">
                <div class="form-group">
                  <label for="exampleInputName1">Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="exampleInputName1" name="" value="{{$data->nama_produk}}" readonly placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Harga Produk</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail3" name="" value="{{$data->harga_produk}}" readonly placeholder="Masukan Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Stok</label>
                  <input type="text" class="form-control" name="telp" id="exampleInputPassword4" name="" value="{{$data->stok}}" readonly placeholder="Masukan No Telepon">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Foto Produk</label>
                    <div>
                    <img src="{{ asset('image/' . $data->foto_produk) }}" class="img-thumbnail" alt="" style="width: 500px; height: 500px;">
                    </div>
                  </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Deskripsi</label>
                  <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4" name=""  readonly placeholder="Masukan Alamat">{{$data->deskripsi}}</textarea>
                </div>
              </form>
                <div class="mt-3">
                  <a href="{{route('produk.edit',$data->id)}}" class="btn btn-sm btn-success mr-2">Update</a>
                  <form onsubmit="return confirm('Yakin mau untuk menghapus data ini?')" action="{{route('produk.destroy', $data->id)}}" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                  </form>
                  <a href="{{route('produk.index')}}" class="btn btn-sm btn-light">Cancel</a>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="footer-inner-wraper">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
        </div>
      </div>
    </footer>
    <!-- partial -->
  </div>
    
@endsection