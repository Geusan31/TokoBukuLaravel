@extends('depan.layouts.main')

@section('container')
    
    <h1 class="my-3">Daftar buku</h1>

    <div class="row justify-content-center my-3">
      <div class="col-md-8">
        <form action="">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
          </div>
        </form>
      </div>
    </div>

    @if ($books->count())
    <div class="row">
      @foreach ($books as $book)
      <div class="col-md-4 mb-4">
        <div class="card">
          @if ($book->image)
              <img src="{{ asset('storage/' . $book->image) }}">
          @else
          <img src="https://source.unsplash.com/random/300×300/?fruit" class="card-img-top">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $book->judul_buku }}</h5>
            <p class="card-text">By {{ $book->pengarang }} and published by {{ $book->penerbit }} in {{ $book->tahun_terbit }}</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
      <h3>Book not found</h3>
    @endif

@endsection