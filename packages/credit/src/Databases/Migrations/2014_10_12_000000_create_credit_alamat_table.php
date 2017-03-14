<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditAlamatTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_alamat', function (Blueprint $table) {
			$table->string('id');
			$table->text('alamat');
			$table->string('rt')->nullable();
			$table->string('rw')->nullable();
			$table->string('kelurahan')->nullable();
			$table->string('desa')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kabupaten')->nullable();
			$table->string('kota')->nullable();
			$table->string('provinsi')->nullable();
			$table->string('negara')->nullable();
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
		Schema::dropIfExists('credit_alamat');
	}
}
