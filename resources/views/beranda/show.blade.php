@extends('template')

@section('body')
{{-- @dd($post->author->name) --}}
{{-- @dd($produks) --}}
<div class="container mt-3">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            <h2>{{ $post->judul }}</h2>

                <img src="https://source.unsplash.com/1200x400/?medicine" alt="post" class="img-fluid">
                <span class="badge bg-info text-light">Penulis: {{ $post->author->name }}, dibuat pada tanggal: {{ date_format($post->created_at, "d/m/Y"). ' ' . $post->kategoriPost->namaKategori }}</span>
                <article class="my-3 fs-5">
                    {!! $post->isi !!}
                </article>

            <a href="/" class="text-decoration-none">kembali</a>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
        <p class="fs-3"><span class="badge bg-info text-light">Rekomendasi produk dengan kategory: {{ $post->kategoriPost->namaKategori }}</span></p>
        @foreach ($produks as $produk)
            <div class="card mb-3" style="max-width: 800px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset('storage/'. $produk->foto) }}" class="img-fluid rounded-start" alt="img">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $produk->namaProduk }}</h5>
                      <p class="card-text">{{ $produk->descProduk }}</p>
                      <p class="card-text"><small class="text-muted">Harga: {{ $produk->harga }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
        @endforeach
        </div>
    </div>

</div>

@endsection