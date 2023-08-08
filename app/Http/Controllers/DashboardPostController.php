<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.post.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.post.create', [
            'kategories' => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
        ]);

        $validator['user_id'] = auth()->user()->id;
        $validator['slug'] = Str::of($request->judul)->slug('-');

        Post::create($validator);
        return redirect('/dashboard/post')->with('success', 'postingan berhasil ditambah');
    }

    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post,
            'kategories' => Kategori::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
        ];

        $validator = $request->validate($rules);

        $validator['user_id'] = auth()->user()->id;
        $validator['slug'] = Str::of($request->judul)->slug('-');

        Post::where('id', $post->id)->update($validator);
        return redirect('/dashboard/post')->with('success', 'postingan berhasil diubah');
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/post')->with('danger', 'Postingan berhasil dihapus');
    }
}
