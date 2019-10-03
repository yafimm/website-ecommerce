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
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logosamsung.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Asus";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logoasus.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Lenovo";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logolenovo.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Oppo";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logooppo.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Iphone";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logoiphone.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Nokia";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logonokia.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Sony";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logosony.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Vivo";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logovivo.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Nexus";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logonexus.png";
        $kategori->save();

        $kategori = new Kategori;
        $kategori->nama_kategori = "Advan";
        $kategori->slug = Str::slug($kategori->nama_kategori);
        $kategori->logo = "logoadvan.png";
        $kategori->save();

    }
}
