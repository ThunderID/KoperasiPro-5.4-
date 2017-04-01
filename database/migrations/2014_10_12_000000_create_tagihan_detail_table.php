<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagihanDetailTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagihan_detail', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('tagihan_id', 255);
			$table->string('deskripsi', 255);
			$table->double('jumlah');
			$table->double('diskon');
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
		Schema::dropIfExists('tagihan_detail');
	}
}
