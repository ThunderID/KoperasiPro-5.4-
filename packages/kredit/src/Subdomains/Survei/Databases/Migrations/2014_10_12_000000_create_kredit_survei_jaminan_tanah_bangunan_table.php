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
		Schema::create('survei_jaminan_tanah_bangunan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('survei_id', 255);
			$table->string('alamat_id', 255);
			$table->string('tipe', 255);
			$table->string('jenis_sertifikat', 255);
			$table->string('nomor_sertifikat', 255);
			$table->string('masa_berlaku_sertifikat', 255);
			$table->string('atas_nama', 255);
			$table->integer('luas_tanah');
			$table->integer('luas_bangunan');
			$table->string('fungsi_bangunan', 255);
			$table->string('bentuk_bangunan', 255);
			$table->string('konstruksi_bangunan', 255);
			$table->string('lantai_bangunan', 255);
			$table->string('dinding', 255);
			$table->string('listrik', 255);
			$table->string('air', 255);
			$table->string('jalan', 255);
			$table->string('lebar_jalan', 255);
			$table->string('letak_lokasi_terhadap_jalan', 255);
			$table->string('lingkungan', 255);
			$table->double('nilai_jaminan');
			$table->double('taksasi_tanah');
			$table->double('taksasi_bangunan');
			$table->double('njop');
			$table->text('uraian');
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'survei_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survei_jaminan_tanah_bangunan');
	}
}