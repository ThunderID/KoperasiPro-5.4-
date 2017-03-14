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
		Schema::create('credit_legalitas_tanah_bangunan', function (Blueprint $table) {
			$table->string('id');
			$table->string('alamat_id');
			$table->string('tipe');
			$table->string('jenis_sertifikat');
			$table->string('nomor_sertifikat');
			$table->string('masa_berlaku_sertifikat');
			$table->string('atas_nama');
			$table->integer('luas');
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
		Schema::dropIfExists('credit_legalitas_tanah_bangunan');
	}
}
