@extends('template')

@section('body')
{{-- @dd($posts) --}}
<div class="container">
    <div class="d-flex justify-content-center mt-3 font-family-sans-serif">
        <h2>Postingan</h2>
    </div>
    <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                <div class="card mb-3">
                <img src="https://source.unsplash.com/400x225?medicine" class="card-img-top" 
                alt="{{ $post->kategoriPost->namaKategori }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->judul }}</h5>
                    <span class="badge bg-dark text-light">{{ $post->kategoriPost->namaKategori }}</span>
                    <p class="card-text">{!! Str::limit($post->isi, 100) !!}</p>
                    <a href="/post/{{ $post->slug }}" class="btn btn-dark">Selengkapnya</a>
                </div>
                </div>
                </div>
            @endforeach
     </div>
</div>
<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>

@endsection