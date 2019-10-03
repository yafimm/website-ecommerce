<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
  protected $table = 'konfirmasi';

  protected $rememberToken = false;

  protected $fillable = [
      'id_user', 'id_admin', 'judul', 'pesan', 'bukti',
  ];


  public function user(){
    return $this->belongsTo('App\User', 'id_user');
  }

  public function admin(){
    return $this->belongsTo('App\User', 'id_admin');
  }



}
