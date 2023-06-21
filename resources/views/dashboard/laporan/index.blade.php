@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan Transaksi</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="/dashboard/laporan/cetak" class="btn btn-sm btn-outline-secondary">Export</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($transaksi as $trans)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $trans->buku->judul_buku }}</td>
                  <td>{{ $trans->jumlah }}</td>
                  <td>Rp. {{ number_format($trans->total_harga, 0, ',', '.') }}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
