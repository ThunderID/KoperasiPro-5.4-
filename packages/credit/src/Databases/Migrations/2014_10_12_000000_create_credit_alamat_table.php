<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditAlamatTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alamat', function (Blueprint $table) {
			$table->string('id', 255);
			$table->text('alamat');
			$table->string('rt', 255)->nullable();
			$table->string('rw', 255)->nullable();
			$table->string('desa', 255)->nullable();
			$table->string('distrik', 255)->nullable();
			$table->string('regensi', 255)->nullable();
			$table->string('provinsi', 255)->nullable();
			$table->string('negara', 255)->nullable();
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'distrik']);
			$table->index(['deleted_at', 'regensi']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('alamat');
	}
}
