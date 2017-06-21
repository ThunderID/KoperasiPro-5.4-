<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmigrationRoKoperasiTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akses_koperasi', function (Blueprint $table) {
			$table->string('id');
			$table->string('nama');
			$table->decimal('latitude')->nullable();
			$table->decimal('longitude')->nullable();
			$table->text('alamat')->nullable();
			$table->string('nomor_telepon')->nullable();
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
		Schema::dropIfExists('akses_koperasi');
	}
}
