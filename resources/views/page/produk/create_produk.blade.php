@extends('layout.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Tambah Data Produk </h3>
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
              <h4 class="card-title">Form Produk</h4>
              @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                  </div>
              @endif
              <form class="forms-sample" action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="exampleInputName1" value="{{old('nama_produk')}}" placeholder="Masukan Nama Produk" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Harga Produk</label>
                  <input type="text" class="form-control" name="harga_produk" id="exampleInputEmail3" value="{{old('harga_produk')}}" placeholder="Masukan Harga Produk">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Stok Produk</label>
                  <input type="number" class="form-control" name="stok" id="exampleInputPassword4" value="{{old('Stok')}}" placeholder="Masukan Stok Produk">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Example file input</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto_produk">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" id="exampleTextarea1" rows="4" value="{{old('Deskripsi')}}" placeholder="Masukan Deskripsi Produk"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('produk.index')}}" class="btn btn-light">Cancel</a>
              </form>
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