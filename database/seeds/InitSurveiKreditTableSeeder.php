<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Domain\Pengajuan\Models\Pengajuan;
use App\Service\Survei\SurveiKredit;
use App\Service\Pengajuan\UpdateStatusKredit;

use Carbon\Carbon;
use App\Service\Akses\SessionBasedAuthenticator;

class InitSurveiKreditTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('survei_aset_kendaraan')->truncate();
		DB::table('survei_aset_tanah_bangunan')->truncate();
		DB::table('survei_aset_usaha')->truncate();
		DB::table('survei_jaminan_kendaraan')->truncate();
		DB::table('survei_jaminan_tanah_bangunan')->truncate();
		DB::table('survei_kepribadian')->truncate();
		DB::table('survei_keuangan')->truncate();
		DB::table('survei_nasabah')->truncate();
		DB::table('survei_rekening')->truncate();

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

		$faker			= \Faker\Factory::create();

		//1. simpan imigrasi
		$credentials	=	[
								'nip'				=> '2017.0001',
								'email'				=> 'admin@ksp.id',
								'password'			=> 'admin',
								'nama'				=> 'C Mooy'
							];

		$sba 			= new SessionBasedAuthenticator;
		$sba 			= $sba->login($credentials);

		$pengajuan 		= Pengajuan::where('akses_koperasi_id', TAuth::activeOffice()['koperasi']['id'])->take(10)->get();

		foreach ($pengajuan as $key => $value) 
		{
			$ubah 		= new UpdateStatusKredit($value->id);
			$ubah->toSurvei();
			$ubah->save();

			//aset kendaraan
			$survei 		= new SurveiKredit($value->id);

			$survei->tambahAsetKendaraan($type_k[rand(0,2)], $char[rand(0,25)].' '.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9));

			$survei->tambahAsetTanahBangunan(rand(11,19).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(11,99).'-'.rand(0,9).'-'.rand(10001, 99999), $at_b[rand(0,4)], rand(36,144), [['alamat' => $faker->address]]);

			$survei->tambahAsetUsaha($bu[rand(0,2)], $faker->company, Carbon::parse(rand(2,10).' years ago')->format('d/m/Y'), $s_usaha[rand(0,3)], $s_tempat_usaha[rand(0,2)], rand(36,144), rand(4,15), 'Rp '.number_format(rand(10000000,100000000),0, "," ,"."), rand(100,5000), rand(100,5000), rand(4,20), [['alamat' => $faker->address]]);

			if($value->jaminan_kendaraan->count())
			{
				foreach ($value->jaminan_kendaraan as $key2 => $value2) 
				{
					$ha 			= rand(12000000, 20000000);
					$taksasi 		= 2017 - $value2['tahun'];
					$taksasi 		= $ha - ($ha * $taksasi * 0.05);

					$survei->tambahJaminanKendaraan($value2['tipe'], $value2['merk'], $color[rand(0,4)], $value2['tahun'], $char[rand(0,25)].' '.rand(1000,9999).' '.$char[rand(0,25)].$char[rand(0,25)], $value2['nomor_bpkb'], $faker->ean13, $faker->ean13, Carbon::parse('+'.rand(1,5).' years')->format('d/m/Y'), $s_usaha[rand(0,1)], 'Rp '.number_format($taksasi,0, "," ,"."), $fungsi_kend[rand(0,2)], $value2['atas_nama'], [['alamat' => $faker->address]]);
				}
			}

			if($value->jaminan_tanah_bangunan->count())
			{
				foreach ($value->jaminan_tanah_bangunan as $key2 => $value2) 
				{
					$m_persegi 		= rand(500000, 4000000);
					$m_bangunan 	= rand(200000, 500000);

					$nilai_jaminan 		= ($value2->luas_tanah * $m_persegi) +  ($value2->luas_bangunan * $m_bangunan); 
					$taksasi_tanah 		= ($value2->luas_tanah * $m_persegi); 
					$taksasi_bangunan 	= ($value2->luas_bangunan * $m_bangunan); 

					$survei->tambahJaminanTanahBangunan($value2['tipe'], $value2['jenis_sertifikat'], $value2['nomor_sertifikat'], $value2['masa_berlaku_sertifikat'], $value2['atas_nama'], $value2['luas_tanah'], $jalan[rand(0,2)], rand(3,4).' meter', $ltk_t_jalan[rand(0,2)], $lingkungan[rand(0,6)], 'Rp '.number_format($nilai_jaminan,0, "," ,"."), 'Rp '.number_format($taksasi_tanah,0, "," ,"."), 'Rp '.number_format($nilai_jaminan * 0.01,0, "," ,"."), $listrik[rand(0,2)], $air[rand(0,1)], null, $value2['alamat'], $value2['luas_bangunan'], $fs_bag[rand(0,1)], $bntk_bag[rand(0,2)], $kons_bag[rand(0,2)], $lantai_bag[rand(0,4)], $dinding_bag[rand(0,3)], 'Rp '.number_format($taksasi_bangunan,0, "," ,"."));
				}
			}

			$survei->tambahKepribadian($faker->name, $faker->phoneNumber, $hubungan[rand(0,4)], $review[rand(0,4)]);
			
			$survei->tambahKepribadian($faker->name, $faker->phoneNumber, $hubungan[rand(0,4)], $review[rand(0,4)]);

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

			$survei->setKeuangan('Rp '.rand(2,3).'.'.rand(1,9).'00.000', 'Rp '.rand(2,3).'.'.rand(1,9).'00.000', $p_saha, 'Rp 0', 'Rp '.rand(5,9).'00.000', 'Rp '.rand(1,4).'00.000', $bp, 'Rp 0', $b_lain, $s_p_utama, $jtk);

			$survei->setNasabah($status_nasa[rand(0,1)], $prev_kredit[rand(0,2)], $prev_collateral[rand(0,1)]);

			$tgl_awal 	= Carbon::parse(rand(2,9).' months ago');

			$survei->setRekening($bank_nama[rand(0,4)], rand(1000000,9000000), $tgl_awal->format('d/m/Y'), $tgl_awal->addMonths(3)->format('d/m/Y'), 'Rp '.rand(1,20).'.'.rand(1,9).'00.000', 'Rp '.rand(1,20).'.'.rand(1,9).'00.000');

			$survei->save();
		}
	}
}
