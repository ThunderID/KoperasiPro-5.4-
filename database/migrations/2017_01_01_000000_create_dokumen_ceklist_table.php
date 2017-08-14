<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenCeklistTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dokumen_ceklist', function (Blueprint $table) {
			$table->string('id');
			$table->string('pengajuan_kredit_id');
			$table->string('kode_dokumen');
			$table->string('judul');
			$table->boolean('is_added');
			$table->timestamps();
			$table->softDeletes();

			$table->primary('id');
			$table->index(['deleted_at', 'pengajuan_kredit_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('dokumen_ceklist');
	}
}
