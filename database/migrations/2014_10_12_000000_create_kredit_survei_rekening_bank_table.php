<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiRekeningBankTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survei_rekening_bank', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('survei_id', 255);
			$table->string('nama_bank', 255);
			$table->string('atas_nama', 255);
			$table->date('tanggal');
			$table->double('saldo');
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'survei_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survei_rekening_bank');
	}
}