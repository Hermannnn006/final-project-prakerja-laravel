@extends('dashboard.layouts.main')

@section('body')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Postingan</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
                @error('judul')
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
                <label for="isi" class="form-label">Artikel</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" placeholder="Tulis artikel" id="isi" name="isi" required value="{{ old('isi') }}" style="height: 200px"></textarea>
                @error('isi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Upload Post</button>
        </form>
    </div>
</div>
@endsection