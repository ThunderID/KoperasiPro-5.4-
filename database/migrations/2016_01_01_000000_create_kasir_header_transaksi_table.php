<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasirHeaderTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_transaksi', function (Blueprint $table) {
            $table->string('id', 255);
            $table->string('orang_id')->nullable();
            $table->string('koperasi_id');
            $table->string('pengajuan_id')->nullable();
            $table->string('nomor_transaksi')->nullable();
            $table->enum('tipe', ['bukti_kas_keluar', 'bukti_kas_masuk']);
            $table->enum('status', ['pending', 'lunas']);
            $table->datetime('tanggal_dikeluarkan');
            $table->datetime('tanggal_jatuh_tempo')->nullable();
            $table->datetime('tanggal_pelunasan')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->primary('id');
            $table->index(['deleted_at', 'pengajuan_id']);
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
