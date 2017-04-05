<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use TImmigration\Models\Pengguna;

use TKredit\Pengajuan\Models\JaminanKendaraan_A;

use Carbon\Carbon;
use TQueries\ACL\SessionBasedAuthenticator;

class InitSurveiTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('survei_alamat')->truncate();
		DB::table('survei_aset_kendaraan')->truncate();
		DB::table('survei_aset_tanah_bangunan')->truncate();
		DB::table('survei_aset_usaha')->truncate();
		DB::table('survei_jaminan_kendaraan')->truncate();
		DB::table('survei_jaminan_tanah_bangunan')->truncate();
		DB::table('survei_kepribadian')->truncate();
		DB::table('survei_keuangan')->truncate();
		DB::table('survei_nasabah')->truncate();
		DB::table('survei_rekening_bank')->truncate();
		DB::table('survei_ro_petugas')->truncate();
		DB::table('survei')->truncate();

		$faker			= \Faker\Factory::create();


 		//1. simpan imigrasi
		$credentials	=	[
								'email'				=> 'admin@ksp.id',
								'password'			=> 'admin',
								'nama'				=> 'C Mooy'
							];
		$logged 		= new SessionBasedAuthenticator;
		$logged 		= $logged->login($credentials);

		//2. simpan data survey
		$type_k				= ['roda_2', 'roda_3', 'roda_4', 'roda_6'];
		$bu 				= ['garment', 'makanan', 'transportasi'];
		$s_usaha 			= ['milik_sendiri', 'milik_keluarga', 'bagi_hasil', 'lain_lain'];
		$s_tempat_usaha 	= ['milik_sendiri', 'sewa', 'lain_lain'];
		$kab 				= ['Banyuwangi', 'Gresik', 'Kediri', 'Lamongan', 'Magetan', 'malang', 'Mojokerto', 'Pamekasan', 'Pasuruan', 'Ponorogo', 'Situbondo', 'Sumenep', 'Tuban', 'Bangkalan', 'Bondowoso', 'Jember', 'Ngawi', 'Pacitan', 'Sampang', 'tulungagung', 'Blitar', 'Bojonegoro', 'Jombang', 'Lumajang', 'Madiun', 'Nganjuk', 'Probolinggo', 'Sidoarjo', 'Trenggalek'];
		$at_b 				= ['ruko', 'rumah', 'tanah', 'tambak', 'lain_lain'];
		$hubungan 			= ['orang_tua', 'saudara', 'pasangan', 'teman_kantor', 'tetangga'];
		$review 			= ['orang nya boros', 'pintar mengelola uang', 'rajin', 'pekerja keras', 'tepat waktu'];

		$color  			= ['merah', 'hijau', 'putih', 'hitam', 'biru'];
		$char 				= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$status_nasa 		= ['lama', 'baru'];
		$prev_kredit 		= ['kurang_lancar', 'lancar', 'macet'];
		$prev_collateral 	= ['sama', 'tidak_sama'];

		$bank_nama 			= ['bni', 'bca', 'niaga', 'mandiri', 'bri'];
		$fungsi_kend 		= ['transportasi_pribadi', 'operasional_usaha', 'disewakan'];


		$fs_bag 			= ['rumah', 'ruko'];
		$bntk_bag 			= ['tingkat', 'tidak_tingkat', 'lain_lain'];
		$kons_bag 			= ['permanen', 'semi_permanen', 'lain_lain'];
		$lantai_bag 		= ['tanah', 'keramik', 'ubin', 'tegel', 'lain_lain'];
		$dinding_bag 		= ['bambu', 'kayu', 'tembok', 'lain_lain'];
		$listrik 			= ['450_watt', '900_watt', '1300_watt'];
		$air 				= ['sumur', 'pdam'];
		$jalan 				= ['batu', 'aspal', 'tanah'];
		$ltk_t_jalan 		= ['sama_dengan_jalan', 'lebih_tinggi_dari_jalan', 'lebih_rendah_dari_jalan'];
		$lingkungan 		= ['perumahan', 'perkantoran', 'pasar', 'pertokoan', 'industri', 'kampung', 'lain_lain'];


		//find survei
		$lists 				= new TQueries\Kredit\DaftarKredit;
		$lists 				= $lists->get(['page' => 1, 'per_page'=> 7, 'status' => 'survei']);

		foreach ($lists as $key => $list) 
		{
			$aset_kendaraan 		= [
				'tipe'				=> $type_k[rand(0,2)],
				'nomor_bpkb'		=> $char[rand(0,25)].' '.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9),
			];

			$aset_usaha 			= [
				'bidang_usaha'				=> $bu[rand(0,2)],
				'nama_usaha'				=> $faker->company,
				'tanggal_berdiri'			=> Carbon::parse(rand(2,10).' years ago')->format('d/m/Y'),
				'status'					=> $s_usaha[rand(0,3)],
				'status_tempat_usaha'		=> $s_tempat_usaha[rand(0,2)],
				'luas_tempat_usaha'			=> rand(36,144),
				'jumlah_karyawan'			=> rand(4,15),
				'nilai_aset'				=> 'Rp '.number_format(rand(10000000,100000000),0, "," ,"."),
				'perputaran_stok'			=> rand(100,5000),
				'jumlah_konsumen_perbulan'	=> rand(100,5000),
				'jumlah_saingan_perkota'	=> rand(4,20),
				'uraian'					=> 'Tidak ada catatan hitam',
				'alamat'					=> [
						'alamat'			=> $faker->address,
						'rt'				=> '00'.rand(0,9),
						'rw'				=> '00'.rand(0,9),
						'regensi'			=> $kab[rand(0,28)],
						'provinsi'			=> 'Jawa Timur',
						'negara'			=> 'Indonesia',
					],
			];

			$aset_tanah_bangunan 	= [
				'tipe'				=> $at_b[rand(0,4)],
				'luas'				=> rand(36,144),
				'alamat'			=> [
						'alamat'	=> $faker->address,
						'rt'		=> '00'.rand(0,9),
						'rw'		=> '00'.rand(0,9),
						'regensi'	=> $kab[rand(0,28)],
						'provinsi'	=> 'Jawa Timur',
						'negara'	=> 'Indonesia',
					],
			];

			$kepribadian			= [
				[
					'nama_referens'		=> $faker->name,
					'telepon_referens'	=> $faker->phoneNumber,
					'hubungan'			=> $hubungan[rand(0,4)],
					'uraian'			=> $review[rand(0,4)],
				],
				[
					'nama_referens'		=> $faker->name,
					'telepon_referens'	=> $faker->phoneNumber,
					'hubungan'			=> $hubungan[rand(0,4)],
					'uraian'			=> $review[rand(0,4)],
				]
			];

			$duwe_saha 	= rand(0,1);

			if($duwe_saha)
			{
				$p_saha 	= 'Rp '.rand(1,4).'.'.rand(1,9).'00.000';
				$s_p_utama 	= 'Gaji dan Usaha';
				$b_lain 	= 'Rp '.rand(1,3).'.'.rand(1,9).'00.000';
			}
			else
			{
				$p_saha 	= 'Rp 0';
				$b_lain 	= 'Rp 0';
				$s_p_utama 	= 'Gaji';
			}

			$jtk 	= rand(1,6);
			if($jtk > 2)
			{
				$bp	= ($jtk - 2) * 500000;
				$bp = 'Rp '.number_format($bp,0, "," ,".");
			}
			else
			{
				$bp = 'Rp 0';
			}

			$keuangan				= [
				'penghasilan_rutin'			=> 'Rp '.rand(2,3).'.'.rand(1,9).'00.000',
				'penghasilan_pasangan'		=> 'Rp '.rand(2,3).'.'.rand(1,9).'00.000',
				'penghasilan_usaha'			=> $p_saha,
				'penghasilan_lain'			=> 'Rp 0',
				'biaya_rumah_tangga'		=> 'Rp '.rand(5,9).'00.000',
				'biaya_rutin'				=> 'Rp '.rand(1,4).'00.000',
				'biaya_pendidikan'			=> $bp,
				'biaya_angsuran'			=> 'Rp 0',
				'biaya_lain'				=> $b_lain,
				'sumber_penghasilan_utama'	=> $s_p_utama,
				'jumlah_tanggungan_keluarga'=> $jtk,
			];
		
			$nasabah				= [
				'nama'				=> $faker->name,
				'status'			=> $status_nasa[rand(0,1)],
				'kredit_terdahulu'	=> $prev_kredit[rand(0,2)],
				'jaminan_terdahulu'	=> $prev_collateral[rand(0,1)],
			];
			
			$n_bank 				= $bank_nama[rand(0,4)];
			$a_nama 				= $faker->name;
			$rekening 				= [
				[
					'nama_bank'		=> $n_bank,
					'atas_nama'		=> $a_nama,
					'tanggal'		=> Carbon::parse('-'.rand(90,100).' days')->format('d/m/Y'),
					'saldo'			=> 'Rp '.rand(1,20).'.'.rand(1,9).'00.000',
				],
				[
					'nama_bank'		=> $n_bank,
					'atas_nama'		=> $a_nama,
					'tanggal'		=> Carbon::now()->format('d/m/Y'),
					'saldo'			=> 'Rp '.rand(1,20).'.'.rand(1,9).'00.000',
				]
			];

			$survei_data['aset_kendaraan']			= $aset_kendaraan;
			if($duwe_saha)
			{
				$survei_data['aset_usaha']			= $aset_usaha;
			}
			else
			{
				unset($survei_data['aset_usaha']);
			}

			$survei_data['aset_tanah_bangunan']		= $aset_tanah_bangunan;
			$survei_data['kepribadian']				= $kepribadian[0];
			$survei_data['keuangan']				= $keuangan;
			$survei_data['nasabah']					= $nasabah;
			$survei_data['rekening']				= $rekening[0];

			$check_kredit 		= \TKredit\Pengajuan\Models\Pengajuan::id($list['id'])->firstorfail();

			if($check_kredit->jaminan_kendaraan()->count())
			{
				$ha 			= rand(12000000, 20000000);
				$taksasi 		= 2017 - $check_kredit['jaminan_kendaraan'][0]['tahun'];
				$taksasi 		= $ha - ($ha * $taksasi * 0.05);

				$survei_data['jaminan_kendaraan']						= $check_kredit['jaminan_kendaraan'][0]->toArray();
				unset($survei_data['jaminan_kendaraan']['pengajuan_id']);

				$survei_data['jaminan_kendaraan']['alamat']				= [
						'alamat'			=> $faker->address,
						'rt'				=> '00'.rand(0,9),
						'rw'				=> '00'.rand(0,9),
						'regensi'			=> $kab[rand(0,28)],
						'provinsi'			=> 'Jawa Timur',
						'negara'			=> 'Indonesia',
					];

				$survei_data['jaminan_kendaraan']['warna']				= $color[rand(0,4)]; 
				$survei_data['jaminan_kendaraan']['nomor_mesin']		= $faker->ean13;
				$survei_data['jaminan_kendaraan']['nomor_rangka']		= $faker->ean13;
				$survei_data['jaminan_kendaraan']['masa_berlaku_stnk']	= Carbon::parse('+'.rand(1,5).' years')->format('d/m/Y');
				$survei_data['jaminan_kendaraan']['status_kepemilikan']	= $s_usaha[rand(0,1)];
				$survei_data['jaminan_kendaraan']['harga_taksasi']		= 'Rp '.number_format($taksasi,0, "," ,".");
				$survei_data['jaminan_kendaraan']['fungsi_sehari_hari']	= $fungsi_kend[rand(0,2)];
			}
			else
			{
				unset($survei_data['jaminan_kendaraan']);
			}

			if($check_kredit->jaminan_tanah_bangunan()->count())
			{
				$ha 			= rand(12000000, 20000000);
				$taksasi 		= 2017 - $check_kredit['jaminan_tanah_bangunan'][0]['tahun'];
				$taksasi 		= $ha - ($ha * $taksasi * 0.05);

				$survei_data['jaminan_tanah_bangunan']			= $check_kredit['jaminan_tanah_bangunan'][0]->toArray();
				$survei_data['jaminan_tanah_bangunan']['alamat']= $check_kredit['jaminan_tanah_bangunan'][0]['alamat']->toArray();
				unset($survei_data['jaminan_tanah_bangunan']['pengajuan_id']);

				$m_persegi 	= rand(500000, 4000000);
				$m_bangunan = rand(200000, 500000);
				$nilai_jaminan 		= ($check_kredit->jaminan_tanah_bangunan[0]->luas_tanah * $m_persegi) +  ($check_kredit->jaminan_tanah_bangunan[0]->luas_bangunan * $m_bangunan); 
				$taksasi_tanah 		= ($check_kredit->jaminan_tanah_bangunan[0]->luas_tanah * $m_persegi); 
				$taksasi_bangunan 	= ($check_kredit->jaminan_tanah_bangunan[0]->luas_bangunan * $m_bangunan); 

				$survei_data['jaminan_tanah_bangunan']['fungsi_bangunan']	= $fs_bag[rand(0,1)];
				$survei_data['jaminan_tanah_bangunan']['bentuk_bangunan']	= $bntk_bag[rand(0,2)];
				$survei_data['jaminan_tanah_bangunan']['konstruksi_bangunan']	= $kons_bag[rand(0,2)];
				$survei_data['jaminan_tanah_bangunan']['lantai_bangunan']	= $lantai_bag[rand(0,4)];
				$survei_data['jaminan_tanah_bangunan']['dinding']			= $dinding_bag[rand(0,3)];
				$survei_data['jaminan_tanah_bangunan']['listrik']			= $listrik[rand(0,2)];
				$survei_data['jaminan_tanah_bangunan']['air']				= $air[rand(0,1)];
				$survei_data['jaminan_tanah_bangunan']['jalan']				= $jalan[rand(0,2)];
				$survei_data['jaminan_tanah_bangunan']['lebar_jalan']		= rand(3,4).' meter';
				$survei_data['jaminan_tanah_bangunan']['letak_lokasi_terhadap_jalan']	= $ltk_t_jalan[rand(0,2)];
				$survei_data['jaminan_tanah_bangunan']['lingkungan']		= $lingkungan[rand(0,6)];
				$survei_data['jaminan_tanah_bangunan']['nilai_jaminan']		= 'Rp '.number_format($nilai_jaminan,0, "," ,".");
				$survei_data['jaminan_tanah_bangunan']['taksasi_tanah']		= 'Rp '.number_format($taksasi_tanah,0, "," ,".");
				$survei_data['jaminan_tanah_bangunan']['taksasi_bangunan']	= 'Rp '.number_format($taksasi_bangunan,0, "," ,".");
				$survei_data['jaminan_tanah_bangunan']['njop']				= 'Rp '.number_format($nilai_jaminan * 0.01,0, "," ,".");
			}
			else
			{
				unset($survei_data['jaminan_tanah_bangunan']);
			}

			$survei		= new \TCommands\Kredit\SimpanSurveiKredit($list['id'], $survei_data);

			$survei->handle();

			$super_surv['kepribadian']			= $kepribadian[1];
			$super_surv['rekening']				= $rekening[1];

			$survei_2	= new \TCommands\Kredit\SimpanSurveiKredit($list['id'], $super_surv);

			$survei_2->handle();
		}
	}
}
