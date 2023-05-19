@extends('layout.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Tambah Data Pemesanan</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tabel Data Pemesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Pemesanan</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Pemesanan</h4>
              @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                  </div>
              @endif
              <form class="forms-sample" action="{{route('pemesanan.store')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="exampleInputName1">Kode Pemesanan</label>
                  <input type="text" class="form-control" name="kode_pemesanan" id="exampleInputName1"  readonly>
                </div>
                <input type="text" class="form-control" name="id_customer" id="id" hidden>
                <div class="form-group">
                  <label for="exampleInputEmail3">Email</label>
                  <input type="email" class="form-control" name="email" id="email" onkeyup="searchFunction()" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword4">No Telepon</label>
                  <input type="text" class="form-control" disabled name="telp" id="telp">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Produk</label>
                  <select class="form-control" id="produk" name="id_produk">
                    <option>--- Pilih Produk ---</option>
                    @foreach ($data as $item)
                      <option value="{{$item->id}}" data-produk="{{$item->harga_produk}}">{{$item->nama_produk}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group"> 
                  <label for="exampleInputPassword4">Harga Produk</label>
                  <input type="text" class="form-control"  id="harga" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Jumlah Beli</label>
                  <input type="number" class="form-control" name="jumlah_beli" id="jumlah_beli" oninput="hitungTotal()">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Jumlah Harga</label>
                  <input type="text" class="form-control" name="jumlah_harga" id="jumlah_harga" readonly>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                {{-- <a href="" class="btn btn-light">Cancel</a> --}}
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
                    $('#id').val(response.id);
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
  <script>
      document.getElementById('produk').addEventListener('change', function() {
          var selectedOption = this.options[this.selectedIndex];
          var hargaProduk = selectedOption.getAttribute('data-produk');
          var formattedHarga = formatRupiah(hargaProduk);
          document.getElementById('harga').value = formattedHarga;
      });

      

      function hitungTotal(){
        var hargaInput = document.getElementById('harga').value;
        var hargaString = hargaInput.replace(/[^\d]/g, '');
        var harga = parseFloat(hargaString);
        var jumlahBeli = parseFloat(document.getElementById('jumlah_beli').value);
        var jumlahHarga = jumlahBeli * harga;
        
      
        if(!isNaN(jumlahHarga) && jumlahHarga > 0){
          var formattedBarang = formatRupiah(jumlahHarga);
          document.getElementById('jumlah_harga').value = formattedBarang;

        }else{
          document.getElementById('jumlah_harga').value = '';
        }
      }

  

      function formatRupiah(angka) {
          var numberString = angka.toString();
          var sisa = numberString.length % 3;
          var rupiah = numberString.substr(0, sisa);
          var ribuan = numberString.substr(sisa).match(/\d{3}/g);

          if (ribuan) {
              var separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
          }

          return 'Rp ' + rupiah;
      }
      function generateKodePemesanan() {
        var length = 8; // Panjang kode pemesanan yang diinginkan
        var charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; // Karakter yang digunakan dalam kode pemesanan
        var kodePemesanan = "";

        for (var i = 0; i < length; i++) {
          var randomIndex = Math.floor(Math.random() * charset.length);
          kodePemesanan += charset.charAt(randomIndex);
        }

        return kodePemesanan;
      }

      document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('exampleInputName1').value = generateKodePemesanan();
      });
  </script>
@endsection 