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
            $table->string('slug');
            $table->integer('stok');
            $table->integer('harga');
            $table->integer('diskon')->nullable();
            $table->string('gambar1')->nullable();
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->string('gambar4')->nullable();
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
