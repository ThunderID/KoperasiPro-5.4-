<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Thunderlabid\Credit\Models\Kredit;
use Thunderlabid\Immigration\Models\Pengguna;

use Carbon\Carbon;

class InitTestTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('kredit')->truncate();
		DB::table('orang')->truncate();
		DB::table('relasi')->truncate();
		DB::table('alamat_rumah')->truncate();
		DB::table('alamat')->truncate();
		DB::table('legalitas_tanah_bangunan')->truncate();
		DB::table('legalitas_kendaraan')->truncate();
		DB::table('jaminan')->truncate();
		DB::table('ro_koperasi')->truncate();
		DB::table('ro_petugas')->truncate();
		DB::table('status')->truncate();

		DB::table('immigration_pandora_box')->truncate();
		DB::table('immigration_pengguna')->truncate();
		DB::table('immigration_ro_koperasi')->truncate();
		DB::table('immigration_visa')->truncate();

		//1. simpan imigrasi
		$credentials	=	[
								'email'				=> 'admin@ksp.id',
								'password'			=> 'qweasd',
								'nama'				=> 'C Mooy'
							];
		$visa_1 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'MAJUJAYA',
															'nama'			=> 'Maju Jaya',
														],
								'role'				=>  'pimpinan'
							];
		$visa_2 		= 	[
								'id'				=> null,
								'koperasi'			=> 	[
															'id'			=> 'MAJUTERUS',
															'nama'			=> 'Maju Terus',
														],
								'role'				=>  'pimpinan'
							];

		$admin 			= new Pengguna;
		$admin->fill($credentials);
		$admin->grantVisa($visa_1);
		$admin->grantVisa($visa_2);
		$admin->save();

		//2. simpan kredit
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

		$pekerjaan 	= ['karyawan_swasta', 'wiraswasta', 'pegawai_negeri', 'tni', 'polri', 'belum_bekerja'];

		$foto 		= 	[
			'http://rumahpengaduan.com/wp-content/uploads/2015/02/KTP.jpg',
			'https://pbs.twimg.com/media/BwlhnFOCQAAvDGp.jpg',
			'https://pbs.twimg.com/media/A_Cc4keCAAAAP-2.jpg',
			'https://balyanurmd.files.wordpress.com/2013/12/ktp-masa-depan.jpg',
			'https://pbs.twimg.com/media/BXjQAxjIEAAVhox.jpg',
		];

		foreach (range(0, 19) as $key) 
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
						'tanggal_lahir'	=> Carbon::parse(rand(7300, 20075).' days ago')->format('d/m/Y'),
						'jenis_kelamin'	=> $gndr[rand(0,1)],

						'status_perkawinan'		=> $sp[rand(0,3)],
						'telepon'				=> $faker->e164PhoneNumber,
						'pekerjaan'				=> $pekerjaan[rand(0,5)],
						'penghasilan_bersih'	=> 'Rp '.rand(3,8).'.000.000',
						'foto_ktp'				=> $foto[rand(0,4)],
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
						'tanggal'		=> Carbon::parse('- 2 days')->format('d/m/Y'),
						'petugas'		=> [
							'id'		=> $admin->id,
							'nama'		=> $admin->nama,
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
							'regensi'			=> $kab[rand(0,28)],
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
