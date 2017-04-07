<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditPengajuanRoPetugasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuan_ro_petugas', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('nama', 255);
			$table->string('role', 255);
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
		Schema::dropIfExists('pengajuan_ro_petugas');
	}
}
