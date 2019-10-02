<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'id_user', 'id_admin' ,'status', 'kota', 'provinsi', 'no_telp', 'kodepos', 'alamat', 'ongkir', 'subtotal',
    ];

    public function produk(){
      return $this->belongsToMany('App\Produk', 'detail_transaksi', 'id_transaksi', 'id_produk')->withPivot('harga', 'jumlah')->withTimestamps();
    }
}
