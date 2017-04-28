<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditAktifTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kredit_aktif', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('nomor_kredit', 255);
			$table->string('nomor_dokumen_kredit', 255);
			$table->double('pengajuan_kredit');
			$table->string('status', 255);
			$table->date('tanggal');
			$table->string('nama_kreditur', 255);
			$table->string('ro_koperasi_id', 255);
			$table->string('ro_mobile_model_id', 255);
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'nama_kreditur', 'tanggal']);
			$table->index(['deleted_at', 'ro_mobile_model_id', 'tanggal']);
			$table->index(['deleted_at', 'ro_koperasi_id', 'tanggal']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('kredit_aktif');
	}
}
