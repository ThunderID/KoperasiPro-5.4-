<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiKeuanganTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survei_keuangan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('petugas_id', 255);
			$table->string('pengajuan_id', 255);
			$table->double('penghasilan_rutin');
			$table->double('penghasilan_pasangan');
			$table->double('penghasilan_usaha');
			$table->double('penghasilan_lain');
			$table->double('biaya_rumah_tangga');
			$table->double('biaya_rutin');
			$table->double('biaya_pendidikan');
			$table->double('biaya_angsuran');
			$table->double('biaya_lain');
			$table->string('sumber_penghasilan_utama', 255);
			$table->integer('jumlah_tanggungan_keluarga');
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
		Schema::dropIfExists('survei_keuangan');
	}
}