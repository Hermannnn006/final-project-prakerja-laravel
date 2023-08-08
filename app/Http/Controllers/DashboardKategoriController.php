<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    public function index()
    {
        return view('dashboard.kategori.index', [
            'kategories' => Kategori::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'namaKategori' => 'required',
            'descKategori' => 'required',
        ]);

        $validator['slug'] = Str::of($request->namaKategori)->slug('-');

        Kategori::create($validator);
        return redirect('/dashboard/kategori')->with('success', 'kategori berhasil ditambah');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'namaKategori' => 'required',
            'descKategori' => 'required',
        ];

        $validator = $request->validate($rules);

        $validator['slug'] = Str::of($request->namaKategori)->slug('-');

        Kategori::where('id', $kategori->id)->update($validator);
        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/dashboard/kategori')->with('danger', 'Kategori berhasil dihapus');
    }
}