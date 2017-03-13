<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditKreditTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_kredit', function (Blueprint $table) {
			$table->string('id');
			$table->string('jenis_kredit');
			$table->string('nomor_kredit');
			$table->double('pengajuan_kredit');
			$table->integer('jangka_waktu');
			$table->string('status');
			$table->string('credit_kreditur_id');
			$table->string('credit_ro_koperasi_id');
			$table->string('credit_mobile_id')->nullable();
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
		Schema::dropIfExists('credit_kredit');
	}
}
