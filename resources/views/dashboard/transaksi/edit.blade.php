@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
      <h3 class="my-3">Edit data transaksi</h3>
      <div class="col-md-6">
      <form action="/dashboard/transaksi/{{ $transaksi->id_transaksi }}" method="post">
        @method('put')
        @csrf
          <div class="mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <select name="id_buku" id="judul_buku" class="form-select">
                <option value="">Pilih judul buku</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id_buku }}" {{ old('id_buku', $transaksi->id_buku) == $book->id_buku ? 'selected' : '' }}>{{ $book->judul_buku }}</option>
                @endforeach
              </select>
              @error('judul_buku')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah</label>
              <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah', $transaksi->jumlah) }}">
              @error('jumlah')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="total_harga" class="form-label">Total harga</label>
              <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga" value="{{ old('total_harga', $transaksi->total_harga) }}">
              @error('total_harga')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          <button type="submit" class="btn btn-primary">Edit data</button>
      </form>
      </div>
    </div>

    <script>

      const judulBuku = document.getElementById('judul_buku');
      const jumlah = document.getElementById('jumlah');
      const harga = document.getElementById('total_harga');

      judulBuku.addEventListener('change', function(e) {
        getBuku(e.target.value).then(buku => {
          jumlah.addEventListener('change', function(event) {
            let hasil = event.target.value * buku.harga;
            harga.value = hasil
          })
          harga.value = buku.harga
        });
      })

      async function getBuku(id) {
        let response = await fetch('/dashboard/transaksi/' + id);
        let data = await response.json();

        return data;
      }
    </script>
@endsection
