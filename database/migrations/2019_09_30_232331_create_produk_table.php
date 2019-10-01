<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->unsigned();
            $table->string('nama');
            $table->integer('stok');
            $table->integer('harga');
            $table->integer('diskon');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->string('gambar4');
            $table->timestamps();
        });

        Schema::table('detail_transaksi', function (Blueprint $table){
           $table->foreign('id_produk')
              ->references('id')
              ->on('produk')
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
        Schema::table('detail_transaksi', function(Blueprint $table){
          $table->dropForeign('detail_transaksi_id_produk_foreign');
        });
        Schema::dropIfExists('produk');
    }
}
