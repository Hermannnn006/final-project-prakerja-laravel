@extends('dashboard.layouts.main')

@section('body')
{{-- @dd($posts) --}}
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kelola Postingan</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('danger'))
    <div class="alert alert-danger col-lg-12" role="alert">
        {{ session('danger') }}
    </div>
    @endif

    <div class="table-responsive col-lg-12">
      <a href="/dashboard/post/create" class="btn btn-primary mb-3">Tambah Post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Isi</th>
              <th scope="col">Kategory</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->judul }}</td>
              <td>{!! Str::limit($post->isi, 75) !!}</td>
              <td>{{ $post->kategoriPost->namaKategori }}</td>
              <td>
                <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onClick="return confirm('Yakin Ingin Menghapus Postingan?')"><i class="bi bi-eraser-fill"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection