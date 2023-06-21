@extends('dashboard.layouts.main')

@section('container')

    <div class="row">
      <h3 class="my-3">Create data buku</h3>
      <div class="col-md-6">
      <form action="/dashboard/buku" method="post" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku" name="judul_buku" value="{{ old('judul_buku') }}">
              @error('judul_buku')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="pengarang" class="form-label">Pengarang</label>
              <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang') }}">
              @error('pengarang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
              @error('penerbit')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
              <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
              @error('tahun_terbit')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Cover image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
              @error('harga')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary">Create data</button>
      </form>
      </div>
    </div>

    <script>
      const image = document.getElementById('image');
      const imgPreview = document.querySelector('.img-preview');

      image.addEventListener('change', function() {
        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;  
        }
      })

    </script>
@endsection
