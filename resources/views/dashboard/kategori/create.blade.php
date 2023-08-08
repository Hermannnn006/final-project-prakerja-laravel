@extends('dashboard.layouts.main')

@section('body')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kategori</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/kategori" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="namaKategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" id="namaKategori" name="namaKategori" required autofocus value="{{ old('namaKategori') }}">
                @error('namaKategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descKategori" class="form-label">Deskripsi Kategori</label>
                <input type="text" class="form-control @error('descKategori') is-invalid @enderror" id="descKategori" name="descKategori" required value="{{ old('descKategori') }}">
                @error('descKategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>
</div>
@endsection