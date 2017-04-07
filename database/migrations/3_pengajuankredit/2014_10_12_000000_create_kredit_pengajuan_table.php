<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditPengajuanTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuan', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('jenis_kredit', 255);
			$table->double('pengajuan_kredit');
			$table->integer('jangka_waktu');
			$table->date('tanggal_pengajuan');
			$table->string('kreditur_id', 255);
			$table->string('ro_petugas_id', 255);
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
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
		Schema::dropIfExists('pengajuan');
	}
}
