<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKreditKTPOrangTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orang', function (Blueprint $table) {
			$table->string('id', 255);
			$table->boolean('is_ektp')->nullable();
			$table->string('nik', 255)->nullable();
			$table->string('nama', 255)->nullable();
			$table->date('tanggal_lahir')->nullable();
			$table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
			$table->string('status_perkawinan', 255)->nullable();
			$table->string('telepon', 255)->nullable();
			$table->string('pekerjaan', 255)->nullable();
			$table->double('penghasilan_bersih')->nullable();
			
			$table->text('alamat')->nullable();

			$table->string('cif', 255)->nullable();
			$table->string('nip', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('password', 255)->nullable();
		
			$table->date('tanggal_masuk')->nullable();
			
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'nama']);
			$table->index(['deleted_at', 'nik']);
			$table->index(['deleted_at', 'nip']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('orang');
	}
}
