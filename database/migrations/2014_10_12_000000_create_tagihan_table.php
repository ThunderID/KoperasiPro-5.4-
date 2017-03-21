<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagihanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagihan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('klien_id', 255);
			$table->string('nomor_tagihan', 255);
			$table->integer('tagihan_ke');
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
		Schema::dropIfExists('tagihan');
	}
}
