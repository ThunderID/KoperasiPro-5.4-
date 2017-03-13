<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditOrangTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_orang', function (Blueprint $table) {
			$table->string('id');
			$table->boolean('is_ektp');
			$table->string('nik')->nullable();
			$table->string('nama');
			$table->date('tanggal_lahir')->nullable();
			$table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
			$table->string('status_perkawinan')->nullable();
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
		Schema::dropIfExists('credit_orang');
	}
}
