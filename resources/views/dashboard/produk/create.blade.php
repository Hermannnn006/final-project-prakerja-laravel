@extends('dashboard.layouts.main')

@section('body')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Produk</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/produk" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('namaProduk') is-invalid @enderror" id="namaProduk" name="namaProduk" required autofocus value="{{ old('namaProduk') }}">
                @error('namaProduk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id">
                @foreach($kategories as $kategori)
                @if(old('kategori_id') == $kategori->id)
                    <option value="{{ $kategori->id }}" selected>{{ $kategori->namaKategori }}</option>
                @else
                    <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
                @endif
                @endforeach
            </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga') }}">
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descProduk" class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control @error('descProduk') is-invalid @enderror" id="descProduk" name="descProduk" required autofocus value="{{ old('descProduk') }}">
                @error('descProduk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Produk</label>
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="input" name="foto">
                @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <img src="https://th.bing.com/th/id/OIP.L_C-Ed6iGPwh8QSeY08iwAHaGO?pid=ImgDet&rs=1" class="img-preview img-fluid mb-3 col-sm-5 mt-3" id="img" style="height: 150px">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
</div>
@endsection