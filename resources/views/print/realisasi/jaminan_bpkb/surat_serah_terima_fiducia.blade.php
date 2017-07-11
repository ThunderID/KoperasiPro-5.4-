@php
	$hari 	= ['monday' => 'senin', 'tuesday' => 'selasa', 'wednesday' => 'rabu', 'thursday' => 'kamis', 'friday' => 'jumat', 'saturday' => 'sabtu', 'sunday' => 'minggu'];
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SURAT PENYERAHAN HAK MILIK SECARA FIDUSIA</title>

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
					<h3>SURAT PENYERAHAN HAK MILIK SECARA FIDUSIA</h3>
					<h5>No : ...............................</h5>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-justify">
				<div class="col-sm-12">
					<p>
						Surat Penyerahan Hak Milik Secara FIDUSIA ini dibuat pada hari {{$hari[strtolower(Carbon\Carbon::now()->format('l'))]}} tanggal {{Carbon\Carbon::now()->format('d-m-Y')}} oleh dan antara :	
					</p>

					<p>
						<ol>
							<li> 
								{{$pimpinan['nama']}} jabatan Pimpinan BPR/BPR/KOPERASI, yang dalam hal ini bertindak untuk dan atas nama BPR/KOPERASI {{$koperasi['nama']}} yang berkedudukan di {{$koperasi['alamat']}}, selanjutnya disebut BPR/KOPERASI, dengan :
							</li>
							<li>
								{{$kredit['debitur']['nama']}}, beralamat di {{$kredit['debitur']['alamat'][0]['alamat']}} yang dalam hal ini bertindak dan atas nama Pribadi selanjutnya disebut PEMINJAM.	
							</li>
						</ol>
					</p>
					<p>
						BPR/KOPERASI dan PEMINJAM tersebut di atas, dengan ini menerangkan bahwa : 	
					</p>

					<p>
						<ol>
							<li>
								Oleh Kedua Belah Pihak telah dibuat dan ditandatangani Surat Perjanjian Kredit, tertanggal  di bawah nomor SPK: {{$kredit['nomor_kredit']}} dan lampiran-lampirannya yang selanjutnya akan disebut sebagai PERJANJIAN dan merupakan bagian satu kesatuan tak terpisahkan dengan Surat Penyerahan Hak Milik Secara FIDUSIA ini;
							</li>
							<li>
								Berdasarkan Perjanjian tersebut di atas, dengan ini PEMINJAM menyatakan dengan sesungguhnya telah dan secara sah berhutang dan menerima hutang   tersebut dari BPR/KOPERASI berupa uang sebesar {{$kredit['pengajuan_kredit']}} ({{\App\Service\Helpers\Terbilang::dariRupiah($kredit['pengajuan_kredit'])}}) yang jumlah tersebut beserta perinciannya tercantum dalam  Perjanjian, yang selanjutnya disebut juga sebagai pinjaman;							
							</li>
							<li>
								Atas Hutang tersebut diatas PEMINJAM berjanji dan mengikatkan diri untuk membayar kembali kepada BPR/KOPERASI sesuai dengan ketentuan dan syarat–syarat pembayaran sebagaimana ditetapkan dalam perjanjian;
							</li>
							<li>
								Untuk menjamin lebih lanjut pembayaran (pembayaran-pembayaran) Hutang yang harus dilaksanakan oleh PEMINJAM kepada BPR/KOPERASI sesuai dengan ketentuan-ketentuan dan syarat-syarat sebagaimana ditetapkan dalam Perjanjian, maka PEMINJAM dengan ini menyerahkan Hak milik atas Barang sebagai Jaminan Kepercayaan (FEO/FIDUCIARE EIGENDOM OVERDRACHT/FIDUSIA) atas barang (barang-barang) milik PEMINJAM kepada BPR/KOPERASI dengan spesifikasi barang (barang-barang) sebagai berikut :
							</li>
							<li>
								PEMINJAM dengan ini juga menyatakan bahwa barang-barang jaminan tersebut diatas adalah milik pribadi secara sah dari PEMINJAM baik secara hukum maupun fisik dan PEMINJAM dengan ini menyatakan bahwa barang-barang jaminan tersebut tidak dalam keadaan dijaminkan atas sesuatu hutang atau pada pihak lain atau apapun namanya ataupun tidak tersangkut perkara atau sengketa baik didalam maupun diluar pengadilan serta tidak ditaruh dibawah penyitaan (conservatoir/revindicatoir beslag) atau bebas dari segala beban dan selama pinjaman yang berkenaan dengan perjanjian kredit ini belum lunas tidak akan diberatkan dengan beban apapun kepada pihak ketiga;
							</li>
							<li>
								Berdasarkan hal-hal tersebut di atas, Kedua Belah Pihak setuju dan sepakat bahwa penyerahan jaminan secara FIDUSIA ini (yang selanjutnya disebut Surat) dilakukan dengan syarat-syarat dan ketentuan-ketentuan yang lazim dipergunakan dalam penyerahan hak milik secara FIDUSIA sebagaimana yang tertulis pada bagian ii (kedua) PERJANJIAN ini yang juga merupakan satu kesatuan dari dan tidak terpisahkan dengan Surat Penyerahan Hak Milik secara FIDUSIA ini;
							</li>
							<li>
								Surat Penyerahan Hak milik secara FIDUSIA ini mulai berlaku dan mengikat sejak tanggal ditanda tangani oleh kedua belah pihak dan berakhir sampai kewajiban PEMINJAM selesai dipenuhi seluruhnya, dibuat dalam rangkap 2 (DUA) yang dibubuhi meterai secukupnya, dan mempunyai kekuatan hukum yang sama. Lembar asli Pertama dipegang oleh BPR/BPR/KOPERASI, lembar asli kedua dipegang oleh PEMINJAM;		
							</li>
						</ol>
					</p> 	

					<div class="clearfix">&nbsp;</div>

					<p>
						Menerangkan :
						<ul>
							<li>
								Bahwa {{$kredit['debitur']['nama']}} (selanjutnya disebut Debitur) telah memperoleh fasilitas kredit dari Pihak Kedua, sejumlah {{$kredit['pengajuan_kredit']}} ({{\App\Service\Helpers\Terbilang::dariRupiah($kredit['pengajuan_kredit'])}}) sebagaimana tersebut dalam Perjanjian Kredit Nomer {{$kredit['nomor_kredit']}}, tanggal {{$kredit['tanggal_pengajuan']}} ;
							</li>
							<li>
								Bahwa dalam memberikan kredit/pinjaman tersebut, Pihak Kedua membutuhkan jaminan pribadi Pihak Pertama untuk pelunasan hutang Debitur tersebut;
							</li>
							<li>
								Bahwa untuk menjamin pembayaran kembali hutang Debitur kepada Pihak Kedua tersebut, baik yang sekarang ada maupun dikemudian hari akan ada, maka Pihak Pertama bersedia sebagai Penjamin/Penanggung hutang (borg);
							</li>
						</ul>
					</p>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-center">
				<div class="col-sm-6">
					BPR/KOPERASI
				</div>
				<div class="col-sm-6">
					PEMINJAM
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>

				<div class="col-sm-6">
					({{$pimpinan['nama']}})
				</div>
				<div class="col-sm-6">
					({{$kredit['debitur']['nama']}})
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
