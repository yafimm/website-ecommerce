<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = new Kategori;
        $kategori->nama_kategori = "Samsung";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Asus";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Lenovo";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Oppo";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Iphone";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Nokia";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Soni";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Vivo";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Nexus";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Advan"; 
        $kategori->save();

    }
}
