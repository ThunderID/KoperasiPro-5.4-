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
		Schema::create('credit_alamat_rumah', function (Blueprint $table) {
			$table->string('id');
			$table->string('credit_orang_id');
			$table->string('credit_alamat_id');
			$table->timestamps();
			$table->softDeletes();

            $table->index(['deleted_at', 'credit_orang_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('credit_alamat_rumah');
	}
}
