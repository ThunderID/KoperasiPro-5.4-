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
		Schema::create('survei_jaminan_kendaraan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('survei_id', 255);
			$table->string('tipe', 255);
			$table->string('merk', 255);
			$table->string('warna', 255);
			$table->integer('tahun');
			$table->string('nomor_bpkb', 255);
			$table->string('nomor_mesin', 255);
			$table->string('nomor_rangka', 255);
			$table->date('masa_berlaku_stnk');
			$table->string('status_kepemilikan', 255);
			$table->double('harga_taksasi');
			$table->string('fungsi_sehari_hari', 255);
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
		Schema::dropIfExists('survei_jaminan_kendaraan');
	}
}
