<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmigrationVisaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('immigration_visa', function (Blueprint $table) {
			$table->string('id');
			$table->string('role');
			$table->text('scopes');
			$table->string('immigration_ro_koperasi_id');
			$table->string('immigration_pengguna_id');
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
		Schema::dropIfExists('immigration_visa');
	}
}
