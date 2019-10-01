<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $rememberToken = false;

    protected $fillable = [
        'nama', 'email' ,'deskripsi', 'foto','password', 'id_role', 'no_telp', 'no_rekening', 'gender', 'username'
    ];
    
    public function isAdmin(){
      if($this->id_role === 1){
           return true;
       }
       else{
           return false;
       }
    }


    public function transaksi(){
      return $this->hasMany('App\Transaksi', 'id_user', 'id');
    }

    public function transaksi_admin(){
      if($this->isAdmin()){
        return $this->hasMany('App\Transaksi', 'id_admin', 'id');
      }
      return false;
    }

    public function role(){
      return $this->belongsTo('App\Role', 'id_role');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
