<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencanaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rencana', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('deskripsi', 255);
			$table->integer('jangka_waktu');
			$table->double('harga');
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('rencana');
	}
}
