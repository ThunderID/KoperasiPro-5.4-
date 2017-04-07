<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiAsetTanahBangunanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survei_aset_tanah_bangunan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('survei_id', 255);
			$table->string('alamat_id', 255);
			$table->string('tipe', 255);
			$table->integer('luas');
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'survei_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survei_aset_tanah_bangunan');
	}
}