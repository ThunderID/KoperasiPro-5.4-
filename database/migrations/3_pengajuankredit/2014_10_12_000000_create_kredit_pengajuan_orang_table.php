<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditPengajuanOrangTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengajuan_orang', function (Blueprint $table) {
			$table->string('id', 255);
			$table->boolean('is_ektp')->nullable();
			$table->string('foto_ktp', 255)->nullable();
			$table->string('nik', 255)->nullable();
			$table->string('nama', 255)->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
			$table->string('status_perkawinan', 255)->nullable();
			$table->string('telepon', 255)->nullable();
			$table->string('pekerjaan', 255)->nullable();
			$table->double('penghasilan_bersih')->nullable();
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'nama']);
			$table->index(['deleted_at', 'nik']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pengajuan_orang');
	}
}
