<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuktiTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('referensi');
            $table->date('tanggal');
            $table->string('nomor_rekening');
            $table->string('nama_pembayar');
            $table->text('alamat_pembayar');
            $table->string('nama_penerima');
            $table->text('alamat_penerima');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_transaksi');
    }
}
