@extends('depan.layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-md-5">
      <h3 class="my-3">Login</h3>
      @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session('success') }} 
        </div>
      @endif

      @if (session()->has('loginError'))
        <div class="alert alert-danger">
          {{ session('loginError') }} 
        </div>
      @endif
      {{-- @dd(auth()->user()) --}}
      {{-- <form action="/logout" method="post">
        @csrf
        <button class="btn dropdwon-item">Logout</button>
      </form> --}}
      <form action="/login" method="post">
        @csrf
          <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
              @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
              @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <p class="mt-3">Belum punya akun? <a href="/register">Register</a></p>
    </div>
  </div>
@endsection
