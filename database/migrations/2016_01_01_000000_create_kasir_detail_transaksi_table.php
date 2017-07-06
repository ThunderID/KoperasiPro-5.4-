<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasirDetailTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('header_transaksi_id');
            $table->string('item')->nullable();
            $table->string('deskripsi');
            $table->integer('kuantitas');
            $table->double('harga_satuan');
            $table->double('diskon_satuan');
            $table->timestamps();
            $table->softDeletes();
           
            $table->index(['deleted_at', 'header_transaksi_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('detail_transaksi');
    }
}
