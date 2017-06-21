<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Service\Pengajuan\PengajuanKredit;

use Carbon\Carbon;
use App\Service\Akses\SessionBasedAuthenticator;

class InitPengajuanKreditTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('pengajuan_kredit')->truncate();
		DB::table('pengajuan_jaminan_kendaraan')->truncate();
		DB::table('pengajuan_jaminan_tanah_bangunan')->truncate();
		DB::table('riwayat_kredit')->truncate();
		DB::table('relasi_orang')->truncate();

		$faker			= \Faker\Factory::create();

		//1. simpan imigrasi
		$credentials	=	[
								'email'				=> 'admin@ksp.id',
								'password'			=> 'admin',
								'nama'				=> 'C Mooy'
							];

		$sba 			= new SessionBasedAuthenticator;
		$sba 			= $sba->login($credentials);

		$jk   		= ['pa', 'pt', 'rumah_delta'];
		$gndr   	= ['perempuan', 'laki-laki'];
		$sp   		= ['belum_kawin', 'kawin', 'cerai', 'cerai_mati'];
		$jw   		= [6,10,12,18,24,30,36,42,48,54,60];

		$type_k	= ['roda_2', 'roda_3', 'roda_4', 'roda_6'];
		$merk_k	= ['honda', 'yamaha', 'suzuki', 'kawasaki', 'mitsubishi', 'toyota', 'nissan', 'kia', 'daihatsu', 'isuzu'];
		$char 	= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$type_tb	= ['tanah', 'tanah_bangunan'];
		$type_s		= ['hgb', 'shm'];
	
		$kab 		= ['Banyuwangi', 'Gresik', 'Kediri', 'Lamongan', 'Magetan', 'malang', 'Mojokerto', 'Pamekasan', 'Pasuruan', 'Ponorogo', 'Situbondo', 'Sumenep', 'Tuban', 'Bangkalan', 'Bondowoso', 'Jember', 'Ngawi', 'Pacitan', 'Sampang', 'tulungagung', 'Blitar', 'Bojonegoro', 'Jombang', 'Lumajang', 'Madiun', 'Nganjuk', 'Probolinggo', 'Sidoarjo', 'Trenggalek'];

		$pekerjaan 	= ['karyawan_swasta', 'wiraswasta', 'pegawai_negeri', 'tni', 'polri', 'belum_bekerja'];

		$foto 		= 	[
			'http://rumahpengaduan.com/wp-content/uploads/2015/02/KTP.jpg',
			'https://pbs.twimg.com/media/BwlhnFOCQAAvDGp.jpg',
			'https://pbs.twimg.com/media/A_Cc4keCAAAAP-2.jpg',
			'https://balyanurmd.files.wordpress.com/2013/12/ktp-masa-depan.jpg',
			'https://pbs.twimg.com/media/BXjQAxjIEAAVhox.jpg',
		];

		//jaminan kendaraan
		foreach (range(0, 9) as $key) 
		{
			$alamat		= 	[
								'alamat'			=> $faker->address,
								'rt'				=> '00'.rand(0,9),
								'rw'				=> '00'.rand(0,9),
								'regensi'			=> $kab[rand(0,28)],
								'provinsi'			=> 'Jawa Timur',
								'negara'			=> 'Indonesia',
							];

			$pengajuan 		= new PengajuanKredit($jk[rand(0,2)], $jw[rand(0,10)], 'Rp '.rand(10,100).'.000.000', Carbon::now()->subDays(rand(1,30))->format('d/m/Y'), [], null, $foto[rand(0,4)]);

			$pengajuan->tambahJaminanKendaraan($type_k[rand(0,2)], $merk_k[rand(0,9)], rand(1990,2016), $char[rand(0,25)].' '.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9), $faker->name);

			$pengajuan->tambahJaminanKendaraan($type_k[rand(0,2)], $merk_k[rand(0,9)], rand(1990,2016), $char[rand(0,25)].' '.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9), $faker->name);

			$pengajuan->setDebitur('35-73-03-'.rand(100000,710000).'-000'.rand(1,4).'', $faker->name, Carbon::parse(rand(17,60).' years ago')->format('d/m/Y'), $gndr[rand(0,1)], $sp[rand(0,3)], $faker->phoneNumber, $pekerjaan[rand(0,5)], 'Rp '.rand(1,9).rand(1,9).'00.000', rand(0,1), $alamat);

			$pengajuan->save();
		}

		//jaminan tanah dan bangunan
		foreach (range(0, 9) as $key) 
		{
			$alamat		= 	[
					'alamat'			=> $faker->address,
					'rt'				=> '00'.rand(0,9),
					'rw'				=> '00'.rand(0,9),
					'regensi'			=> $kab[rand(0,28)],
					'provinsi'			=> 'Jawa Timur',
					'negara'			=> 'Indonesia',
				];

			$alamat_tb_1	= 	[
					'alamat'			=> $faker->address,
					'rt'				=> '00'.rand(0,9),
					'rw'				=> '00'.rand(0,9),
					'regensi'			=> $kab[rand(0,28)],
					'provinsi'			=> 'Jawa Timur',
					'negara'			=> 'Indonesia',
				];

			$alamat_tb_2	= 	[
					'alamat'			=> $faker->address,
					'rt'				=> '00'.rand(0,9),
					'rw'				=> '00'.rand(0,9),
					'regensi'			=> $kab[rand(0,28)],
					'provinsi'			=> 'Jawa Timur',
					'negara'			=> 'Indonesia',
				];

			$lt 			= rand(36,144);

			$pengajuan 		= new PengajuanKredit($jk[rand(0,2)], $jw[rand(0,10)], 'Rp '.rand(10,100).'.000.000', Carbon::now()->subDays(rand(1,30))->format('d/m/Y'), [], null, $foto[rand(0,4)]);

			$pengajuan->tambahJaminanTanahBangunan('tanah', $type_s[rand(0,1)], rand(11,19).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(0,9).'-'.rand(10001, 99999), rand(2018,2035), $faker->name, $alamat_tb_1, rand(36,144), 0);

			$pengajuan->tambahJaminanTanahBangunan('tanah_bangunan', $type_s[rand(0,1)], rand(11,19).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(0,9).'-'.rand(10001, 99999), rand(2018,2035), $faker->name, $alamat_tb_2, $lt, $lt*0.7);

			$pengajuan->setDebitur('35-73-03-'.rand(100000,710000).'-000'.rand(1,4).'', $faker->name, Carbon::parse(rand(17,60).' years ago')->format('d/m/Y'), $gndr[rand(0,1)], $sp[rand(0,3)], $faker->phoneNumber, $pekerjaan[rand(0,5)], 'Rp '.rand(1,9).rand(1,9).'00.000', rand(0,1), $alamat);

			$pengajuan->save();
		}

		
	}
}
