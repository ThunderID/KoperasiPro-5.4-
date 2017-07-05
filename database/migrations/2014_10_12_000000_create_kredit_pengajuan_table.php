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
		Schema::create('pengajuan_kredit', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('jenis_kredit', 255);
			$table->integer('jangka_waktu');
			$table->double('pengajuan_kredit');
			$table->date('tanggal_pengajuan');
			$table->string('status', 255);
			$table->string('orang_id', 255);
			$table->string('nomor_kredit', 255)->nullable();
			$table->string('petugas_id', 255)->nullable();
			$table->string('akses_koperasi_id', 255)->nullable();
			$table->string('hp_id', 255)->nullable();
			$table->string('spesimen_ttd', 255)->nullable();
			$table->string('foto_ktp', 255)->nullable();
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
		Schema::dropIfExists('pengajuan_kredit');
	}
}
