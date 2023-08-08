<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardBarangController extends Controller
{
    public function index()
    {
        return view('dashboard.produk.index', [
            'produks' => Produk::with('kategoriProduk')->get()
        ]);
    }

    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/dashboard/produk')->with('danger', 'Produk berhasil dihapus');
    }

    public function create()
    {
        return view('dashboard.produk.create', [
            'kategories' => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required|integer',
            'descProduk' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:1024',
            'kategori_id' => 'required',
        ]);

        if($request->file('foto')) {
            $validator['foto'] = $request->file('foto')->store('foto-produk');
        }

        $validator['slug'] = Str::of($request->namaProduk)->slug('-');

        Produk::create($validator);
        return redirect('/dashboard/produk')->with('success', 'produk berhasil ditambah');
    }

    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', [
            'produk' => $produk,
            'kategories' => Kategori::all()
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'namaProduk' => 'required',
            'harga' => 'required|integer',
            'descProduk' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg|max:1024',
            'kategori_id' => 'required',
        ];

        $validator = $request->validate($rules);

        if($request->file('foto')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validator['foto'] = $request->file('foto')->store('foto-produk');
        }

        Produk::where('id', $produk->id)->update($validator);
        return redirect('/dashboard/produk')->with('success', 'produk berhasil diubah');
    }
}
