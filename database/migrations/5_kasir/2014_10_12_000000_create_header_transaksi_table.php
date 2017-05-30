<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orang_id')->nullable();
            $table->string('koperasi_id');
            $table->string('referensi_id')->nullable();
            $table->string('nomor_transaksi');
            $table->enum('tipe', ['bukti_kas_keluar', 'bukti_kas_masuk']);
            $table->enum('status', ['pending', 'lunas']);
            $table->datetime('tanggal_dikeluarkan');
            $table->datetime('tanggal_jatuh_tempo')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->dropIfExists('header_transaksi');
    }
}
