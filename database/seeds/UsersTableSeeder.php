<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User;
        $user->nama = "Yosar Naufaldi Muhaimin"; // sumbangan
        $user->username = "yosarnaufaldi";
        $user->password = \Hash::make('yosarnaufaldi');
        $user->email = "yosarnm@gmail.com";
        $user->gender = "Pria";
        $user->id_role = 2;
        $user->no_telp = "08181818181";
        $user->deskripsi = "Seorang admin yang menjual barang";
        $user->save();


        $user = new User;
        $user->nama = "Dadang sekut"; // sumbangan
        $user->username = "userpengguna";
        $user->password = \Hash::make('userpengguna');
        $user->email = "dadangsekut@gmail.com";
        $user->gender = "Pria";
        $user->id_role = 1;
        $user->no_telp = "08181818181";
        $user->deskripsi = "Seorang pembeli yang membeli barang";
        $user->save();
    }
}
