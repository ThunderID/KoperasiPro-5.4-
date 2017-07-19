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
		DB::table('s_aset_k')->truncate();
		DB::table('s_aset_tb')->truncate();
		DB::table('s_aset_u')->truncate();
		DB::table('s_jaminan_k')->truncate();
		DB::table('s_jaminan_tb')->truncate();
		DB::table('s_foto_jaminan')->truncate();
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

		$foto_roda_2		= [
									'http://1.bp.blogspot.com/-0MtNPLX1uh4/VH5lEoxepNI/AAAAAAAAC8Q/3zGwTVWtVr4/s1600/96.Jual%2BMotor%2BBekas%2BHarga%2B3jt2.jpg',
									'https://lh3.googleusercontent.com/-b8UpslQVYno/VYnQMnqNcqI/AAAAAAAAAGg/f3z90Ol1L9Q/w1280-h960/2222.jpg',
									'https://s.kaskus.id/c320x320/images/fjb/2017/07/08/tmp_phpvsquu1_9000171_1499509540.jpg',
									'http://img.olx.biz.id/2BAB/76714/298241767_1_644x461_di-jual-motor-daerah-mataram-mataram-kota.jpg',
									'http://3.bp.blogspot.com/-mm7YtbsSUNw/VH5lFgT6njI/AAAAAAAAC8c/sBOPrU4mGOY/s1600/96.Jual%2BMotor%2BBekas%2BHarga%2B3jt.jpg3.jpg',	
							];

		$foto_roda_4		= [
									'http://hargamobil-terbaru.com/wp-content/uploads/2015/12/Jual-Mobil-Bekas-Subaru-Surabaya.jpg',
									'http://www.batamniaga.com/premium/jual-mobil/honda-jazz-2008/mobil1.JPG',
									'https://virgana.files.wordpress.com/2013/11/tphoto_00017.jpg',
									'https://jualmobilhondastreamdibandung.files.wordpress.com/2011/09/jual-cepat-mobil-honda-stream-di-bandung.jpg',
									'https://cdns.klimg.com/otosia.com/p/headline/476x238/0000384659.jpg'
							];

		$foto_tanah 		= [
									'http://www.jualsewatanah.com/iklan/images/2015/05/1518_1.jpg',
									'http://gambar-rumah.com/attachments/surabaya/94227d1335085552-jual-tanah-murah-berprospek-surabaya-barat-dsc_9885.jpg',
									'http://cdn.gresnews.com/showimg.php?size=view&imgname=201512234947-jual-beli-tanah%20strategihukum%20net.jpg',
									'http://gambar-rumah.com/attachments/bsd/180490d1346777589-jual-tanah-serpong-cilenggang-murah-strategis-5-menit-ke-serpong-cilenggang-gambar-depan.jpg',
									'https://id1-cdn.pgimgs.com/listing/7293623/UPHO.32517404.V800/Di-Jual-Tanah-di-Jl-By-Pass-Ida-Bagus-Mantra-Desa-Lebih-Gianyar-Bali-View-Pantai-Langsung-Gianyar-Indonesia.jpg',
							];

		$foto_rumah 		= [
									'https://picture.urbanindo.com/listing/603079917/16/83949044/ruko-dijual-bandung-barat-jual-ruko-bandung-barat-lokasi-padalarang/618/412.jpg',
									'http://gambar-rumah.com/attachments/jakarta-pusat/6032320d1466878777-di-jual-rukan-di-jakarta-pusat-yg-sangat-strategis-rukan-1a.jpg',
									'http://gambar-rumah.com/attachments/yogyakarta/7336954d1476275924-jual-rumah-di-berbah-sleman-jogja-rumah-dijual-dekat-jual-rumah-dekat-bandara-jogja-3-.jpg',
									'http://gambardesainproperti.com/wp-content/uploads/2014/01/Tip-Menjual-Rumah.jpg',
									'http://gambar-rumah.com/attachments/bekasi/40994d1323411675-di-jual-ruko-di-grand-wisata-bekasi-p9140010.jpg'
							];

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

					if(str_is($value2['tipe'], 'roda_2'))
					{
						$foto_j	= $foto_roda_2[rand(0,4)];
					}
					else
					{
						$foto_j	= $foto_roda_4[rand(0,4)];
					}

					$survei->tambahJaminanKendaraan($value2['tipe'], $value2['merk'], $color[rand(0,4)], $value2['tahun'], $char[rand(0,25)].' '.rand(1000,9999).' '.$char[rand(0,25)].$char[rand(0,25)], $value2['nomor_bpkb'], $faker->ean13, $faker->ean13, Carbon::parse('+'.rand(1,5).' years')->format('d/m/Y'), $s_usaha[rand(0,1)], 'Rp '.number_format($taksasi,0, "," ,"."), $fungsi_kend[rand(0,2)], $value2['atas_nama'], [['alamat' => $faker->address]], null, null, null, [['url' => $foto_j, 'keterangan' => 'Foto Jaminan']]);
				}
			}


			if($value->jaminan_tanah_bangunan->count())
			{
				foreach ($value->jaminan_tanah_bangunan as $key2 => $value2) 
				{

					if(str_is($value2['tipe'], 'tanah'))
					{
						$foto_j	= $foto_tanah[rand(0,4)];
					}
					else
					{
						$foto_j	= $foto_rumah[rand(0,4)];
					}

					$m_persegi 		= rand(500000, 4000000);
					$m_bangunan 	= rand(200000, 500000);

					$nilai_jaminan 		= ($value2->luas_tanah * $m_persegi) +  ($value2->luas_bangunan * $m_bangunan); 
					$taksasi_tanah 		= ($value2->luas_tanah * $m_persegi); 
					$taksasi_bangunan 	= ($value2->luas_bangunan * $m_bangunan); 

					$survei->tambahJaminanTanahBangunan($value2['tipe'], $value2['jenis_sertifikat'], $value2['nomor_sertifikat'], $value2['masa_berlaku_sertifikat'], $value2['atas_nama'], $value2['luas_tanah'], $jalan[rand(0,2)], rand(3,4).' meter', $ltk_t_jalan[rand(0,2)], $lingkungan[rand(0,6)], 'Rp '.number_format($nilai_jaminan,0, "," ,"."), 'Rp '.number_format($taksasi_tanah,0, "," ,"."), 'Rp '.number_format(($nilai_jaminan /($m_persegi + $m_bangunan)),0, "," ,"."), 'Rp '.number_format($nilai_jaminan * 0.01,0, "," ,"."), $listrik[rand(0,2)], $air[rand(0,1)], null, $value2['alamat'], $value2['luas_bangunan'], $fs_bag[rand(0,1)], $bntk_bag[rand(0,2)], $kons_bag[rand(0,2)], $lantai_bag[rand(0,4)], $dinding_bag[rand(0,3)], 'Rp '.number_format($taksasi_bangunan,0, "," ,"."), null, null, [['url' => $foto_j, 'keterangan' => 'Foto Jaminan']]);
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
