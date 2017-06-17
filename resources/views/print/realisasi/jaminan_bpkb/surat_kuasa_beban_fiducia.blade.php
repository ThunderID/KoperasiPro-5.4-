@php
	$hari 	= ['monday' => 'senin', 'tuesday' => 'selasa', 'wednesday' => 'rabu', 'thursday' => 'kamis', 'friday' => 'jumat', 'saturday' => 'sabtu', 'sunday' => 'minggu'];
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SURAT KUASA PEMBEBANAN JAMINAN/SERTIFIKAT FIDUSIA</title>

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
			<div class="clearfix">&nbsp;</div>
			
			<div class="row text-center">
				<div class="col-sm-12">
					<h3>SURAT KUASA PEMBEBANAN JAMINAN/SERTIFIKAT FIDUSIA</h3>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-justify">
				<div class="col-sm-12">
					<p>
						Saya yang bertanda tangan dibawah ini :	
					</p>
					<p>
					&emsp;&emsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$kredit['kreditur']['nama']}}<br/>

					&emsp;&emsp;Pekerjaan&nbsp;&nbsp;: {{$kredit['kreditur']['pekerjaan']}}<br/>
					
					&emsp;&emsp;Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$kredit['kreditur']['alamat'][0]['alamat']}}<br/>
					
					&emsp;&emsp;( Selanjutnya  disebut Pemberi Kuasa )</p>
					
					<p>Dengan ini memberi kuasa kepada : </p>
					<p>
					&emsp;&emsp;BPR/KOPERASI {{$koperasi['nama']}}<br/>
					&emsp;&emsp;{{$koperasi['alamat']}}<br/>
					
					&emsp;&emsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$pimpinan['nama']}}</br>
					
					&emsp;&emsp;Pekerjaan&nbsp;&nbsp;: Pimpinan {{$koperasi['nama']}}<br/>
					
					&emsp;&emsp;Alamat&nbsp;&nbsp;: {{$koperasi['alamat']}}<br/>
					
					&emsp;&emsp;( Selanjutnya disebut Penerima Kuasa )</p>

					<div class="clearfix">&nbsp;</div>

					<p>
						Pemberi kuasa menerangkan dengan ini memberi kuasa kepada Penerima Kuasa
					</p>
					<p>
						-------------------------------------------------------------------------
						<strong>
							K H U S U S
						</strong>
						------------------------------------------------------------------------
					</p>
					<p>
						Dengan hak subtitusi untuk membebankan jaminan fiducia atas obyek jaminan fiducia yang akan disebut dibawah ini, guna menjamin pelunasan hutang kredit atas nama  {{$kredit['kreditur']['nama']}} selaku debitur, sejumlah {{$kredit['pengajuan_kredit']}} ({{\App\Service\Helpers\Terbilang::dariRupiah($kredit['pengajuan_kredit'])}}). Sejumlah uang yang dapat ditentukan dikemudian hari berdasarkan Perjanjian Kredit yang ditandatangani oleh debitur Pemberi Kuasa dengan BPR/KOPERASI {{$koperasi['nama']}} {{$koperasi['alamat']}} selaku kreditur dan dibuktikan dengn Perjanjian Kredit No. ............................. tertanggal ................... berikut penambahan, perubahan, perpanjangan serta pembaharuannya yang mungkin diadakan kemudian, sampai nilai penjaminan sebesar Rp ..................... atas obyek fiducia berupa kendaraan dengan spesifikasi sebagai berikut :
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
					<p class="clearfix">&nbsp;</p>
					<p>
						Yang bernilai Rp ........................
					</p>
					<p>
						Yang selanjutnya cukup disebut <strong>OBYEK JAMINAN FIDUCIA.</strong>
					</p>
						Kuasa untuk membebankan fiducia ini meliputi kuasa untuk menghadap tiap –tiap pejabat yang berwenang dimana perlu memberikan keterangan–keterangan serta memperlihatkan dan menyerahkan surat – surat yang diminta, membuat/minta dibuatkan serta menandatangani akta pemberian jaminan fiducia serta surat  -surat lain yang diperlukan, memilih domisili, memberikan pernyataan bahwa obyek jaminan fiducia betul milik Pemberi Kuasa. Tidak tersangkut dalam sengketa bebas dari sitaan dan dari beban – beban apapun, mendaftarkan hak pemberi jaminan fiducia tersebut kepada notaries maupun pejabat lain yang berwenang berdasarkan ketentuan Undang – undang yang berlaku, diantaranya Undang – undang No.42 tahun 1999 dan selanjutnya melakukan segala sesuatu yang dipandang baik dan berguna untuk mencapai maksud pemberian kuasa tersebut diatas dengan tidak ada satupun yang dikecualikan dan apabila untuk melakukan suatu tindakan tersebut dalam surat ini masih diperlukan kuasa dan lebih khusus lagi maka kuasa yang dimaksud kata demi kata dianggap telah termaktub dalam surat ini.
					</p>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-center">
				<div class="col-sm-6">
					Malang, {{Carbon\Carbon::now()->format('d-m-Y')}}
					<br/>Pemberi Kuasa
				</div>
				<div class="col-sm-6">
					Penerima Kuasa
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>

				<div class="col-sm-6">
					({{$kredit['kreditur']['nama']}})
				</div>
				<div class="col-sm-6">
					({{$pimpinan['nama']}})
				</div>
			</div>
		
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		</div>
	</body>
</html>
