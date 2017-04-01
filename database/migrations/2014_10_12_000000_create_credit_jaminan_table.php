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
		Schema::create('jaminan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('kredit_id', 255);
			$table->string('legalitas_kendaraan_id', 255)->nullable();
			$table->string('legalitas_tanah_bangunan_id', 255)->nullable();
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'kredit_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('jaminan');
	}
}
