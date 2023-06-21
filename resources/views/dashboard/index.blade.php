@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body p-0">
        <h5 class="card-title text-center bg-secondary bg-opacity-50 p-2">Buku</h5>
        <p class="card-text p-2 text-center fs-1">{{ $books->count() }}</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body p-0">
        <h5 class="card-title text-center bg-secondary bg-opacity-50 p-2">Transaksi</h5>
        <p class="card-text p-2 text-center fs-1">{{ $transaksi->where('id_user', auth()->user()->id)->count() }}</p>
      </div>
    </div>
  </div>
</div>
@endsection