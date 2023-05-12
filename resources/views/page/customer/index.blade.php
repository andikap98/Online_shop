@extends('layout.master')
@section('content')
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Tabel Data Customer </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tabel Data Customer</li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Customer</h4>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama </th>
                      <th> Email </th>
                      <th> No Telp </th>
                      <th> Aksi </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-primary">
                      <td> 5 </td>
                      <td> Edward </td>
                      <td> Illustrator </td>
                      <td> $ 160.25 </td>
                      <td> May 03, 2015 </td>
                    </tr>
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