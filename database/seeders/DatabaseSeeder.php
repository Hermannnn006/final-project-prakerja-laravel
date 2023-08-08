<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::factory(3)->create();

        \App\Models\Kategori::create([
            'namaKategori' => 'Kategori Satu',
            'slug' => 'kategori-satu',
            'descKategori' => 'deskripsi kategori satu',
        ]);

        \App\Models\Kategori::create([
            'namaKategori' => 'Kategori dua',
            'slug' => 'kategori-dua',
            'descKategori' => 'deskripsi kategori dua',
        ]);

        \App\Models\Produk::create([
            'namaProduk' => 'Produk Satu',
            'slug' => 'produk-satu',
            'foto' => 'produk-images',
            'harga' => mt_rand(1000,5000),
            'descProduk' => 'lorem ipsum qua desc',
            'kategori_id' => mt_rand(1,2),
        ]); 
        \App\Models\Produk::create([
            'namaProduk' => 'Produk Dua',
            'slug' => 'produk-dua',
            'foto' => 'produk-images',
            'harga' => mt_rand(1000,5000),
            'descProduk' => 'lorem ipsum qua desc',
            'kategori_id' => mt_rand(1,2),
        ]);
        \App\Models\Produk::create([
            'namaProduk' => 'Produk Tiga',
            'slug' => 'produk-Tiga',
            'foto' => 'produk-images',
            'harga' => mt_rand(1000,5000),
            'descProduk' => 'lorem ipsum qua desc',
            'kategori_id' => mt_rand(1,2),
        ]);
        \App\Models\Produk::create([
            'namaProduk' => 'Produk Empat',
            'slug' => 'produk-empat',
            'foto' => 'produk-images',
            'harga' => mt_rand(1000,5000),
            'descProduk' => 'lorem ipsum qua desc',
            'kategori_id' => mt_rand(1,2),
        ]);
        \App\Models\Produk::create([
            'namaProduk' => 'Produk Lima',
            'slug' => 'produk-lima',
            'foto' => 'produk-images',
            'harga' => mt_rand(1000,5000),
            'descProduk' => 'lorem ipsum qua desc',
            'kategori_id' => mt_rand(1,2),
        ]);
        \App\Models\Produk::create([
            'namaProduk' => 'Produk Enam',
            'slug' => 'produk-enam',
            'foto' => 'produk-images',
            'harga' => mt_rand(1000,5000),
            'descProduk' => 'lorem ipsum qua desc',
            'kategori_id' => mt_rand(1,2),
        ]);

        \App\Models\Post::factory(10)->create();
    }
}
