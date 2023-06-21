@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Transaksi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
      <a href="/dashboard/transaksi/create" class="btn btn-primary">Tambah data transaksi</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($transaksi as $trans)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $trans->buku->judul_buku }}</td>
                  <td>{{ $trans->jumlah }}</td>
                <td>Rp. {{ number_format($trans->total_harga, 0, ',', '.') }}</td>
                  <td>
                    <a href="/dashboard/transaksi/{{ $trans->id_transaksi }}/edit" class="badge bg-warning">Edit</a>
                    <form action="/dashboard/transaksi/{{ $trans->id_transaksi }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0 " onclick="return confirm('Apakah kamu yakin?')">Delete</button>
                    </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
