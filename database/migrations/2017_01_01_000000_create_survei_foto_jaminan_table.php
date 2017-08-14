<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveiFotoJaminanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('s_foto_jaminan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('jaminan_id', 255);
			$table->string('jaminan_type', 255);
			$table->text('url');
			$table->text('judul');
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'jaminan_type', 'jaminan_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('s_foto_jaminan');
	}
}
