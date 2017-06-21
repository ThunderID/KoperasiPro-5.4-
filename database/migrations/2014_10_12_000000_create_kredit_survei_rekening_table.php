<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiRekeningTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survei_rekening', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('petugas_id', 255);
			$table->string('pengajuan_id', 255);
			$table->string('rekening', 255);
			$table->string('nomor_rekening', 255);
			$table->date('tanggal_awal');
			$table->date('tanggal_akhir');
			$table->double('saldo_awal');
			$table->double('saldo_akhir');
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
		Schema::dropIfExists('survei_rekening');
	}
}