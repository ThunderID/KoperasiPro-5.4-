<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditLegalitasTanahBangunanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('legalitas_tanah_bangunan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('alamat_id', 255);
			$table->string('tipe', 255);
			$table->string('jenis_sertifikat', 255);
			$table->string('nomor_sertifikat', 255);
			$table->string('masa_berlaku_sertifikat', 255);
			$table->string('atas_nama', 255);
			$table->integer('luas');
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
		Schema::dropIfExists('legalitas_tanah_bangunan');
	}
}
