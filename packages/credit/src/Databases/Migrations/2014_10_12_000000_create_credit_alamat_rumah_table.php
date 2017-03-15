<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditAlamatRumahTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alamat_rumah', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('orang_id', 255);
			$table->string('alamat_id', 255);
			$table->string('tipe', 255);
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
            $table->index(['deleted_at', 'orang_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('alamat_rumah');
	}
}
