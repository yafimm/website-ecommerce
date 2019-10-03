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
            $table->text('deskripsi')->nullable();
            $table->text('gambar1')->nullable();
            $table->text('gambar2')->nullable();
            $table->text('gambar3')->nullable();
            $table->text('gambar4')->nullable();
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
