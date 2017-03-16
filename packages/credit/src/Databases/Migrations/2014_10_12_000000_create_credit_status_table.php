<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditStatusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('status', 255);
			$table->string('kredit_id', 255);
			$table->string('ro_petugas_id', 255);
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'status']);
			$table->index(['deleted_at', 'created_at']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('status');
	}
}
