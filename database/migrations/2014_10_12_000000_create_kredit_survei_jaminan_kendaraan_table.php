<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiJaminanKendaraanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('s_jaminan_k', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('petugas_id', 255);
			$table->string('jaminan_kendaraan_id', 255);
			$table->string('tipe', 255);
			$table->string('merk', 255);
			$table->string('warna', 255);
			$table->integer('tahun');
			$table->string('nomor_polisi', 255)->nullable();
			$table->string('nomor_bpkb', 255)->nullable();
			$table->string('nomor_mesin', 255)->nullable();
			$table->string('nomor_rangka', 255)->nullable();
			$table->string('atas_nama', 255)->nullable();
			$table->date('masa_berlaku_stnk')->nullable();
			$table->string('status_kepemilikan', 255)->nullable();
			$table->double('harga_taksasi')->nullable();
			$table->string('fungsi_sehari_hari', 255)->nullable();
			$table->text('url_barcode')->nullable();
			$table->text('alamat');
			$table->text('uraian')->nullable();
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'nomor_bpkb']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('s_jaminan_k');
	}
}
