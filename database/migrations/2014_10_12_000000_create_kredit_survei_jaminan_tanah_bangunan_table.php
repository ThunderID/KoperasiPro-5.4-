<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiJaminanTanahBangunanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('s_jaminan_tb', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('petugas_id', 255);
			$table->string('jaminan_tanah_bangunan_id', 255);
			$table->string('tipe', 255);
			$table->string('jenis_sertifikat', 255);
			$table->string('nomor_sertifikat', 255);
			$table->string('masa_berlaku_sertifikat', 255);
			$table->string('atas_nama', 255);
			$table->integer('luas_tanah')->nullable();
			$table->integer('luas_bangunan')->nullable();
			$table->string('fungsi_bangunan', 255)->nullable();
			$table->string('bentuk_bangunan', 255)->nullable();
			$table->string('konstruksi_bangunan', 255)->nullable();
			$table->string('lantai_bangunan', 255)->nullable();
			$table->string('dinding', 255)->nullable();
			$table->string('listrik', 255)->nullable();
			$table->string('air', 255)->nullable();
			$table->string('jalan', 255)->nullable();
			$table->string('lebar_jalan', 255)->nullable();
			$table->string('letak_lokasi_terhadap_jalan', 255)->nullable();
			$table->string('lingkungan', 255)->nullable();
			$table->double('nilai_jaminan')->nullable();
			$table->double('taksasi_tanah')->nullable();
			$table->double('taksasi_bangunan')->nullable();
			$table->double('njop')->nullable();
			$table->text('url_barcode')->nullable();
			$table->text('alamat');
			$table->text('uraian')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'nomor_sertifikat']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('s_jaminan_tb');
	}
}