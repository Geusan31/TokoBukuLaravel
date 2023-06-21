@extends('depan.layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-md-5">
      <h3 class="my-3">Register</h3>
      <form action="/register" method="post">
        @csrf
          <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
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
          <div class="mb-3">
              <label for="level" class="form-label">Level</label>
              <select name="level" id="level" class="form-select @error('level') is-invalid @enderror">
                <option value="" disabled selected>Pilih Level</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="kasir">Kasir</option>
              </select>
              @error('level')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
      </form>
      <p class="mt-3">Sudah punya akun? <a href="/login">Login</a></p>
    </div>
  </div>
@endsection
