<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmigrationPandoraBoxTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akses_pandora_box', function (Blueprint $table) {
			$table->string('id');
			$table->string('key');
			$table->string('secret');
			$table->string('jenis');
			$table->string('versi');
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
		Schema::dropIfExists('akses_pandora_box');
	}
}
