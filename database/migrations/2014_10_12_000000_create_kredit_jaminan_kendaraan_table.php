<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditJaminanKendaraanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuan_jaminan_kendaraan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('pengajuan_id', 255);
			$table->string('tipe', 255)->nullable();
			$table->string('merk', 255)->nullable();
			$table->integer('tahun')->nullable();
			$table->string('nomor_bpkb', 255);
			$table->string('atas_nama', 255)->nullable();
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
		Schema::dropIfExists('pengajuan_jaminan_kendaraan');
	}
}
