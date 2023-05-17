{{-- @extends('layout.master')
@section('content')
@extends('layout.master')
@section('content')
@push('script')
  <script src="{{asset('/template/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script>
  $(function () {
      $("#example1").DataTable();
  });
  </script>
@endpush
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Tabel Data Pemesanan </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tabel Data Pemesanan</li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Pemesanan</h4>
                @if (session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>   
                @endif
                <a href="{{route('pemesanan.create')}}" class="mdi mdi-format-list-bulleted menu-icon btn btn-primary"> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama Pemesan</th>
                      <th> Barang pesanan </th>
                      <th> Total Harga</th>
                      <th> Tanggal Pemesanan</th>
                      <th class="col-2"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1 ?>
                    @foreach ($data as $item)
                    <tr>
                      <td> {{$i++}} </td>
                      <td> {{$item->nama_pemesanan}} </td>
                      <td> {{$item->nama_produk}} </td>
                      <td> {{$item->create}} </td>
                      <td> {{$item->harga_pemesanan}} </td>
                      <td><a href="{{route('pemesanan.edit', $item->id)}}" class=" btn btn-sm btn btn-warning">Update</a>
                        <a href="{{route('pemesanan.show', $item->id)}}" class=" btn btn-sm btn btn-info">Detail</a>
                        <form onsubmit="return confirm('Yakin mau untuk menghapus data ini?')" action="{{route('pemesanan.destroy', $item->id)}}" class="d-inline" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
@endsection --}}