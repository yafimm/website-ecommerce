<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_role')->unsigned();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('nama', 30);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('no_telp', 12)->nullable();
            $table->string('no_rekening', 20)->nullable();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table){
           $table->foreign('id_user')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
         });

         Schema::table('transaksi', function (Blueprint $table){
            $table->foreign('id_admin')
               ->references('id')
               ->on('users')
               ->onDelete('cascade')
               ->onUpdate('cascade');
          });

         Schema::table('konfirmasi', function (Blueprint $table){
            $table->foreign('id_user')
               ->references('id')
               ->on('users')
               ->onDelete('cascade')
               ->onUpdate('cascade');
          });

        Schema::table('konfirmasi', function (Blueprint $table){
           $table->foreign('id_admin')
              ->references('id')
              ->on('users')
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
        Schema::table('transaksi', function(Blueprint $table){
          $table->dropForeign('transaksi_id_user_foreign');
        });
        Schema::table('transaksi', function(Blueprint $table){
          $table->dropForeign('transaksi_id_admin_foreign');
        });
        Schema::dropIfExists('users');
    }
}
