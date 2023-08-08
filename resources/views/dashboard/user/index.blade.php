@extends('dashboard.layouts.main')

@section('body')
{{-- @dd($users) --}}
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kelola User</h1>
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
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <form action="/dashboard/user/{{ $user->id }}" method="post" class="row">
              <td>
                    @csrf
                    @method('put')
                    <div class="form-group col-6">
                        <select class="form-control" name="role">
                            <option value="user" @selected($user->role == 'user')>User</option>
                            <option value="editor" @selected($user->role == 'editor')>Editor</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <button class="btn btn-primary ">Simpan</button>
                    </div>
                </td>
            </form>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection