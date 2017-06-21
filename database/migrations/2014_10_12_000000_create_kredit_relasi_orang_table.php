<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditRelasiOrangTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relasi_orang', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('orang_id', 255);
			$table->string('relasi_id', 255);
			$table->string('hubungan', 255);
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('relasi_orang');
	}
}
