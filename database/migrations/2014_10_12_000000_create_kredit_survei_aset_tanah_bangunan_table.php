<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiAsetTanahBangunanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survei_aset_tanah_bangunan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('petugas_id', 255);
			$table->string('pengajuan_id', 255);
			$table->string('nomor_sertifikat', 255);
			$table->string('tipe', 255);
			$table->integer('luas');
			$table->text('alamat');
			$table->text('uraian')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'petugas_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survei_aset_tanah_bangunan');
	}
}