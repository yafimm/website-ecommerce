<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
      protected $table = 'produk';

      protected $fillable = [
          'id_kategori', 'nama' ,'stok', 'harga', 'deskripsi', 'gambar1', 'gambar2', 'gambar3', 'gambar4',
      ];

      public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori');
      }

      public function transaksi(){
        return $this->belongsToMany('App\Transaksi', 'detail_transaksi', 'id_produk', 'id_transaksi')->withPivot('harga', 'jumlah')->withTimestamps();
      }
}
