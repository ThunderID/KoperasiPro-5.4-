<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditKreditTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kredit', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('jenis_kredit', 255);
			$table->string('nomor_kredit', 255);
			$table->double('pengajuan_kredit');
			$table->integer('jangka_waktu');
			$table->string('status', 255);
			$table->string('kreditur_id', 255);
			$table->string('ro_koperasi_id', 255);
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'ro_koperasi_id', 'status']);
			$table->index(['deleted_at', 'ro_koperasi_id', 'nomor_kredit']);
			$table->index(['deleted_at', 'ro_koperasi_id', 'created_at']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('kredit');
	}
}
