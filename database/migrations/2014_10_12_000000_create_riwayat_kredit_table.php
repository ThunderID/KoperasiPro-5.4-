<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatKreditTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('riwayat_kredit', function (Blueprint $table) {
			$table->string('id', 255);
			$table->string('pengajuan_id', 255);
			$table->string('petugas_id', 255);
			$table->string('status', 255);
			$table->date('tanggal');
			$table->text('uraian')->nullable();
			$table->timestamps();
			$table->softDeletes();

            $table->primary('id');
			$table->index(['deleted_at', 'pengajuan_id', 'status']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('riwayat_kredit');
	}
}
