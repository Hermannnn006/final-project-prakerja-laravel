<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda.index', [
            'posts' => Post::with('kategoriPost')->latest()->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('beranda.show', [
            'post' => $post->load(['author', 'kategoriPost']),
            // 'produks' => Produk::where('kategori_id', '==', $post->kategoriPost->id)->get()
            'produks' => Produk::where('kategori_id', $post->kategoriPost->id)->get()
        ]);
    }
}
