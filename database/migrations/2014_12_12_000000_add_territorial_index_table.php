<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTerritorialIndexTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('territorial_desa', function (Blueprint $table) {
			$table->index(['deleted_at', 'nama']);
		});
		Schema::table('territorial_distrik', function (Blueprint $table) {
			$table->index(['deleted_at', 'nama']);
		});
		Schema::table('territorial_negara', function (Blueprint $table) {
			$table->index(['deleted_at', 'nama']);
		});
		Schema::table('territorial_provinsi', function (Blueprint $table) {
			$table->index(['deleted_at', 'nama']);
		});
		Schema::table('territorial_regensi', function (Blueprint $table) {
			$table->index(['deleted_at', 'nama']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}
}
