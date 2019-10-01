<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_role');
            $table->integer('hak_akses');
        });

        Schema::table('users', function (Blueprint $table) {
          $table->foreign('id_role')
                ->references('id')
                ->on('role')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
          $table->dropForeign('users_id_role_foreign');
        });
        Schema::dropIfExists('role');
    }
}
