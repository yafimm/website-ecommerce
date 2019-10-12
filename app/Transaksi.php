<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id'; // or null

    public $incrementing = false;

    protected $fillable = [
        'id', 'id_user', 'id_admin' ,'nama', 'status', 'kota', 'provinsi', 'no_telp', 'kodepos', 'alamat', 'ongkir', 'subtotal', 'note'
    ];

    public function produk(){
      return $this->belongsToMany('App\Produk', 'detail_transaksi', 'id_transaksi', 'id_produk')->withPivot('harga', 'jumlah')->withTimestamps();
    }
    
    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
    
    public function admin(){
        return $this->belongsTo('App\User', 'id_admin');
    }
}
