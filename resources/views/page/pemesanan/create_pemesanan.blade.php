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
              <form class="forms-sample" action="{{route('produk.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  {{-- <label for="exampleInputName1">Kode Pemesanan</label>
                  <input type="text" class="form-control" name="kode_pemesanan" id="exampleInputName1"  readonly>
                </div> --}}
                <div class="form-group">
                  <label for="exampleInputEmail3">Email</label>
                  <input type="email" class="form-control" name="email" id="email" onkeyup="searchFunction()" placeholder="Masukkan Email">
                  <input type="email" class="form-control" name="id" id="id" hidden>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">No Telepon</label>
                  <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan No Telepon">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Jumlah Beli</label>
                  <input type="text" class="form-control" name="jumlah_beli" id="exampleInputPassword4" placeholder="Masukan No Telepon">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Jumlah Harga</label>
                  <input type="text" class="form-control" name="jumlah_harga" id="exampleInputPassword4">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="#" class="btn btn-light">Cancel</a>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      function searchFunction() {
          var email = $('#email').val();
  
          $.ajax({
              type: 'POST',
              url: '{{ route('searchDetail') }}',
              data: {
                  _token: '{{ csrf_token() }}',
                  email: email
              },
              success: function(response) {
                  if (response.nama && response.telp) {
                      $('#nama').val(response.nama);
                      $('#telp').val(response.telp);
                  } else {
                      $('#nama').val('');
                      $('#telp').val('');
                  }
              }
          });
      }
  
      $('#myForm').submit(function(e) {
          e.preventDefault();
          // Handle form submission here
      });
  </script>
@endsection 