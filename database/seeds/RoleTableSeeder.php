<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Role;
        $user->nama_role = "User"; // sumbangan
        $user->hak_akses = 10;
        $user->save();

        $user = new Role;
        $user->nama_role = "Admin"; // sumbangan
        $user->hak_akses = 100;
        $user->save();

    }
}
