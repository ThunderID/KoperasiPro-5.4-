<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditJaminanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credit_jaminan', function (Blueprint $table) {
			$table->string('id');
			$table->string('credit_kredit_id');
			$table->string('credit_legalitas_kendaraan_id')->nullable();
			$table->string('credit_legalitas_tanah_bangunan_id')->nullable();
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
		Schema::dropIfExists('credit_jaminan');
	}
}
