<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditJaminanTanahBangunanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuan_jaminan_tanah_bangunan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('pengajuan_id', 255);
			$table->string('tipe', 255);
			$table->string('jenis_sertifikat', 255);
			$table->string('nomor_sertifikat', 255);
			$table->string('masa_berlaku_sertifikat', 255)->nullable();
			$table->string('atas_nama', 255)->nullable();
			$table->integer('luas_tanah')->nullable();
			$table->integer('luas_bangunan')->nullable();
			$table->text('alamat')->nullable();
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
		Schema::dropIfExists('pengajuan_jaminan_tanah_bangunan');
	}
}
