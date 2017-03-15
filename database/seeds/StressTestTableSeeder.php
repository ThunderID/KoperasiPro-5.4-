<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Thunderlabid\Credit\Models\Kredit;

class StressTestTableSeeder extends Seeder
{
	public function run()
	{
		// DB::table('credit_kredit')->truncate();
		// DB::table('credit_orang')->truncate();
		// DB::table('credit_relasi')->truncate();
		// DB::table('credit_pekerjaan')->truncate();
		// DB::table('credit_telepon')->truncate();
		// DB::table('credit_alamat_rumah')->truncate();
		// DB::table('credit_alamat')->truncate();
		// DB::table('credit_legalitas_tanah_bangunan')->truncate();
		// DB::table('credit_legalitas_kendaraan')->truncate();
		// DB::table('credit_jaminan')->truncate();
		// DB::table('credit_ro_koperasi')->truncate();
		// DB::table('credit_ro_petugas')->truncate();
		// DB::table('credit_status')->truncate();

		$jk   		= ['pa', 'pt', 'rumah_delta'];
		$gndr   	= ['perempuan', 'laki-laki'];
		$sp   		= ['belum_kawin', 'kawin', 'cerai', 'cerai_mati'];
		$jw   		= [6,10,12,18,24,30,36,42,48,54,60];
		$faker		= \Faker\Factory::create();

		$type_k	= ['roda_2', 'roda_4', 'roda_6'];
		$merk_k	= ['honda', 'yamaha', 'suzuki', 'kawasaki', 'mitsubishi', 'toyota', 'nissan', 'kia', 'daihatsu', 'isuzu'];
		$char 	= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$type_tb	= ['tanah', 'bangunan'];
		$type_s		= ['hgb', 'shm'];
	
		$kab 		= ['Banyuwangi', 'Gresik', 'Kediri', 'Lamongan', 'Magetan', 'malang', 'Mojokerto', 'Pamekasan', 'Pasuruan', 'Ponorogo', 'Situbondo', 'Sumenep', 'Tuban', 'Bangkalan', 'Bondowoso', 'Jember', 'Ngawi', 'Pacitan', 'Sampang', 'tulungagung', 'Blitar', 'Bojonegoro', 'Jombang', 'Lumajang', 'Madiun', 'Nganjuk', 'Probolinggo', 'Sidoarjo', 'Trenggalek'];

		foreach (range(0, 99999) as $key) 
		{
			$kredit	= [
					'pengajuan_kredit'	=> 'Rp '.rand(10,100).'.000.000',
					'jenis_kredit'		=> $jk[rand(0,2)],
					'jangka_waktu'		=> $jw[rand(0,10)]
			];
			$kreditur 	= [
						'is_ektp'		=> rand(0,1),
						'nik'			=> '35-73-03-'.rand(100000,710000).'-000'.rand(1,4).'',
						'nama'			=> $faker->name,
						'tanggal_lahir'	=> Carbon\Carbon::parse(rand(7300, 20075).' days ago')->format('d/m/Y'),
						'jenis_kelamin'	=> $gndr[rand(0,1)],
						'status_perkawinan'	=> $sp[rand(0,3)],
			];
			$koperasi = [[
							'id'			=> 'MAJUJAYA',
							'nama'			=> 'Maju Jaya',
						],
						[
							'id'			=> 'MAJUTERUS',
							'nama'			=> 'Maju Terus'
						]];
			$status 	= [
						'status'		=> 'pengajuan',
						'petugas'		=> [
							'id'		=> '0FCF9BCD-E716-4AB0-BF4B-81DF76D1A112',
							'nama'		=> 'Chelsy Mooy',
							'role'		=> 'pimpinan',
						]
			];
			$kendaraan 	= [
						'tipe'			=> $type_k[rand(0,2)],
						'merk'			=> $merk_k[rand(0,9)],
						'tahun'			=> rand(1990,2016),
						'nomor_bpkb'	=> $char[rand(0,25)].' '.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9),
						'atas_nama'		=> $faker->name
			];
			$bangunan 	= [
						'tipe'				=> $type_tb[rand(0,1)],
						'nomor_sertifikat'	=> rand(11,19).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(0,9).'-'.rand(10001, 99999),
						'jenis_sertifikat'	=> $type_s[rand(0,1)],
						'masa_berlaku_sertifikat'	=> rand(2018,2035),
						'luas'				=> rand(36,144),
						'atas_nama'			=> $faker->name,
						'alamat'			=> [
							'alamat'			=> $faker->address,
							'rt'				=> '00'.rand(0,9),
							'rw'				=> '00'.rand(0,9),
							'kabupaten'			=> $kab[rand(0,28)],
							'provinsi'			=> 'Jawa Timur',
							'negara'			=> 'Indonesia',
						],
			];


			$model 			= new Kredit;
			$model->fill($kredit);
			
			$model->SetKreditur($kreditur);
			$model->SetKoperasi($koperasi[rand(0,1)]);
			$model->SetStatus($status);
			$jaminan 		= rand(0,1);

			if($jaminan)
			{
				$model->tambahJaminanKendaraan($kendaraan);
			}
			else
			{
				$model->tambahJaminanTanahBangunan($bangunan);
			}

			$model->save();

		}
	}
}
