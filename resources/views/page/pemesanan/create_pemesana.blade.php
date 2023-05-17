@extends('layout.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Tambah Data Customer </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tabel Data Customer</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Customer</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Customer</h4>
              @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                  </div>
              @endif
              <form class="forms-sample" action="{{route('customer.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Kode Pemesanan</label>
                  <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Masukan Nama" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail3">Email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Masukan Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">No Telepon</label>
                  <input type="text" class="form-control" name="telp" id="exampleInputPassword4" placeholder="Masukan No Telepon">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Alamat</label>
                  <textarea class="form-control" name="alamat" id="exampleTextarea1" rows="4" placeholder="Masukan Alamat"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('customer.index')}}" class="btn btn-light">Cancel</a>
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