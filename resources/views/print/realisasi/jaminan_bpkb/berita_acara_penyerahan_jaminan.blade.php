@php
	$hari 	= ['monday' => 'senin', 'tuesday' => 'selasa', 'wednesday' => 'rabu', 'thursday' => 'kamis', 'friday' => 'jumat', 'saturday' => 'sabtu', 'sunday' => 'minggu'];
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>PENYERAHAN BARANG JAMINAN SECARA SUKARELA</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Styles -->
		<style>

		</style>
	</head>
	<body>
		<div class="container" style="width: 21cm;height: 29.7cm; ">
			<header>
				<div class="row">
					<div class="col-sm-12 text-left">
						<h3>BPR/KOPERASI {{$koperasi['nama']}}</h3>
						<p>{{$koperasi['alamat']}}</p>
						<p>Telp : {{$koperasi['nomor_telepon']}}</p>
					</div>
				</div>
				<hr>
			</header>
			<div class="row text-center">
				<div class="col-sm-12">
					<h2>BERITA ACARA</h2>
					<h4>PENYERAHAN BARANG JAMINAN SECARA SUKARELA</h4>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>

			<div class="row text-justify">
				<div class="col-sm-12">
					<p>
						Pada hari ini {{$hari[strtolower(Carbon\Carbon::now()->format('l'))]}} tanggal {{Carbon\Carbon::now()->format('d-m-Y')}} sehubungan dengan pinjaman atas nama Sdr. {{$kredit['debitur']['nama']}}  dengan alamat {{$kredit['debitur']['alamat'][0]['alamat']}}. sesuai dengan Surat Perjanjian Kredit No. ……………………………………………. tanggal …………………………… yang telah terjadi wan prestasi / ingkar janji, dalam rangka memenuhi kewajiban selaku Pemberi Fidusia ataupun Pemegang Obyek Fidusia, sesuai dengan pasal 30 Undang-undang No. 42 tahun 1999 tentang Jaminan Fidusia, bersama dengan ini kami selaku pihak Pemberi Fidusia atau Pemegang Obyek Fidusia, menyerahkan dengan sukarela secara sadar dan tanpa paksaan dari pihak manapun kepada Penerima Fidusia atau pihak yang mewakilinya, atas obyek fidusia / barang jaminan berupa kendaraan bermotor dengan identitas sebagai berikut :
					</p>

					<p>
						@foreach($kredit['jaminan_kendaraan'] as $key1 => $value1)
							&emsp;&emsp;&emsp;<p>Kendaraan {{$key1+1}}</p>
							@foreach($value1 as $key2 => $value2)
								@if(in_array($key2, ['tipe', 'merk', 'tahun', 'atas_nama', 'nomor_rangka', 'nomor_mesin', 'nomor_bpkb', 'nomor_polisi', 'status_kepemilikan']))
									<div class="row">
										<div class="col-sm-3 col-sm-offset-1">
											{{ucwords(str_replace('_',' ',$key2))}} 
										</div>
										<div class="col-sm-1">
											:
										</div>
										<div class="col-sm-7">
											{{ucwords(str_replace('_',' ',$value2))}}
										</div>
									</div>
								@endif
							@endforeach
						@endforeach
					</p>

					<div class="clearfix">&nbsp;</div>

					<p>
						Untuk selanjutnya, bilamana setelah lewatnya waktu 7(tujuh) hari sejak tanggal penyerahan obyek fidusia ini tidak dilakukan pelunasan atas seluruh kewajiban yang tertunggak, maka pihak BPR/KSP {{$koperasi['nama']}} (selaku penerima fidusia) diberikan kewenangan untuk melakukan penjualan di bawah tangan atas obyek fidusia tersebut diatas dengan harga tertinggi yang bisa didapatkan. Bilamana terdapat kelebihan atas penjualan obyek fidusia, maka kelebihan tersebut akan dikembalikan kepada pemberi fidusia dan bilamana masih terdapat kekurangan maka Debitur tetap bertanggung jawab atas utang yang belum terbayar, sesuai dengan pasal 34 ayat 1 dan ayat 2 dari Undang-undang No. 42 tahun 1999 tentang Jaminan Fidusia.
					</p>
					<p>
						Atas penyerahan obyek fidusia ini maupun atas penjualan obyek fidusia setelah lewatnya tenggat waktu yang diberikan, kami menyatakan akan menyerahkan sepenuhnya pada kebijakan BPR/KSP {{$koperasi['nama']}}. dan tidak akan melakukan tuntutan apapun baik pidana maupun perdata kepada pihak BPR/KSP {{$koperasi['nama']}}. ataupun pihak yang mewakilinya di kemudian hari.
					</p>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-center">
				<div class="col-sm-4">
					Yang Menyerahkan
				</div>
				<div class="col-sm-8">
					Yang Menerima
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>

				<div class="col-sm-4">
					({{$kredit['debitur']['nama']}})
				</div>
				<div class="col-sm-4">
					(PETUGAS 1)
				</div>
				<div class="col-sm-4">
					(PETUGAS 2)
				</div>
			</div>
		</div>
	</body>
</html>
