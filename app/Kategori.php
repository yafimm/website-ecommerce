<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori', 'logo', 'slug'
    ];

    public function produk(){
        return $this->hasMany('App\Produk', 'id_kategori', 'id');
    }
}
