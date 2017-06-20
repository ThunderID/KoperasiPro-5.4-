<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditSurveiKepribadianTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survei_kepribadian', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('pengajuan_id', 255);
			$table->string('petugas_id', 255);
			$table->string('nama_referens', 255);
			$table->string('telepon_referens', 255);
			$table->string('hubungan', 255);
			$table->text('uraian')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'petugas_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('survei_kepribadian');
	}
}
