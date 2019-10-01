<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kategori');
            $table->string('slug');
        });

        Schema::table('produk', function (Blueprint $table) {
          $table->foreign('id_kategori')
                ->references('id')
                ->on('kategori')
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
        Schema::table('produk', function(Blueprint $table){
          $table->dropForeign('produk_id_kategori_foreign');
        });
        Schema::dropIfExists('kategori');
    }
}
