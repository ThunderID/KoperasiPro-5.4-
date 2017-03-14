<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditLegalitasKendaraanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_legalitas_kendaraan', function (Blueprint $table) {
			$table->string('id');
			$table->string('tipe');
			$table->string('merk');
			$table->integer('tahun');
			$table->string('nomor_bpkb');
			$table->string('atas_nama');
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
		Schema::dropIfExists('credit_legalitas_kendaraan');
	}
}
