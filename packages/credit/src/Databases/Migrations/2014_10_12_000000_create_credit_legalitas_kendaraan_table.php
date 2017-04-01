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
		Schema::create('legalitas_kendaraan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('tipe', 255);
			$table->string('merk', 255);
			$table->integer('tahun');
			$table->string('nomor_bpkb', 255);
			$table->string('atas_nama', 255);
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
		Schema::dropIfExists('legalitas_kendaraan');
	}
}
