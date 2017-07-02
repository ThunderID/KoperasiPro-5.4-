<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditMobileTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akses_mobile', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('mobile_id', 255);
			$table->string('mobile_model', 255);
			$table->string('orang_id', 255);
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
		Schema::dropIfExists('akses_mobile');
	}
}