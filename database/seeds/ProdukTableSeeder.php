<?php

use Illuminate\Database\Seeder;
use App\Produk;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = new Produk;
        $produk->id_kategori = 1;
        $produk->nama = "Case Samsung yang terbaik sepanjang masa";
        $produk->slug = Str::slug($produk->nama, '-');
        $produk->stok = 20;
        $produk->harga = 20000;
        $produk->diskon = 0;
        $produk->gambar1 = "dummyproduk1.jpg";
        $produk->save();

        $produk = new Produk;
        $produk->id_kategori = 2;
        $produk->nama = "Case Asus yang terbaik sepanjang masa";
        $produk->slug = Str::slug($produk->nama, '-');
        $produk->stok = 20;
        $produk->harga = 20000;
        $produk->diskon = 0;
        $produk->gambar1 = "dummyproduk2.jpg";
        $produk->save();

        $produk = new Produk;
        $produk->id_kategori = 3;
        $produk->nama = "Case Lenovo yang terbaik sepanjang masa";
        $produk->slug = Str::slug($produk->nama, '-');
        $produk->stok = 20;
        $produk->harga = 20000;
        $produk->diskon = 0;
        $produk->gambar1 = "dummyproduk3.jpg";
        $produk->save();

        $produk = new Produk;
        $produk->id_kategori = 4;
        $produk->nama = "Case Oppo yang terbaik sepanjang masa";
        $produk->slug = Str::slug($produk->nama, '-');
        $produk->stok = 20;
        $produk->harga = 20000;
        $produk->diskon = 0;
        $produk->gambar1 = "dummyproduk4.jpg";
        $produk->save();

        $produk = new Produk;
        $produk->id_kategori = 5;
        $produk->nama = "Case Iphone yang terbaik sepanjang masa";
        $produk->slug = Str::slug($produk->nama, '-');
        $produk->stok = 20;
        $produk->harga = 20000;
        $produk->diskon = 0;
        $produk->gambar1 = "dummyproduk5.jpg";
        $produk->save();

        $produk = new Produk;
        $produk->id_kategori = 6;
        $produk->nama = "Case Nokia yang terbaik sepanjang masa";
        $produk->slug = Str::slug($produk->nama, '-');
        $produk->stok = 20;
        $produk->harga = 20000;
        $produk->diskon = 0;
        $produk->gambar1 = "dummyproduk6.jpg";
        $produk->save();
    }
}
