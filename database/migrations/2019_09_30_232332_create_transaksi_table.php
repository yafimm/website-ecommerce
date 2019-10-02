<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_admin')->unsigned()->nullable();
            $table->enum('status',['Done', 'Unpaid', 'Is being sent']);
            $table->string('kota');
            $table->string('provinsi');
            $table->string('no_telp');
            $table->string('kodepos');
            $table->string('alamat');
            $table->integer('ongkir');
            $table->integer('subtotal');
            $table->timestamps();
        });
        Schema::table('detail_transaksi', function (Blueprint $table){
           $table->foreign('id_transaksi')
              ->references('id')
              ->on('transaksi')
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
          $table->dropForeign('detail_transaksi_id_transaksi_foreign');
        });
        Schema::dropIfExists('transaksi');
    }
}
