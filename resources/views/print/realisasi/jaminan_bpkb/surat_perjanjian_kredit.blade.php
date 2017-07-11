@php
	$hari 	= ['monday' => 'senin', 'tuesday' => 'selasa', 'wednesday' => 'rabu', 'thursday' => 'kamis', 'friday' => 'jumat', 'saturday' => 'sabtu', 'sunday' => 'minggu'];
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SURAT PERJANJIAN  KREDIT</title>

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
					<h3>SURAT PERJANJIAN  KREDIT</h3>
					<h5>No : {{$kredit['nomor_kredit']}} </h5>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-justify">
				<div class="col-sm-12">
					<p>
						Pada hari ini {{$hari[strtolower(Carbon\Carbon::now()->format('l'))]}} tanggal {{Carbon\Carbon::now()->format('d-m-Y')}}, telah dibuat dan ditandatangani perjanjian antara :
					</p>

					<p>
						<ol>
							<li> 
								{{$pimpinan['nama']}} jabatan Pimpinan BPR/KOPERASI, yang dalam hal ini bertindak untuk dan atas nama BPR/KOPERASI {{$koperasi['nama']}} yang berkedudukan di {{$koperasi['alamat']}}, selanjutnya disebut BPR/KOPERASI, dengan :
							</li>
							<li>
								{{$kredit['debitur']['nama']}}, beralamat di {{$kredit['debitur']['alamat'][0]['alamat']}} yang dalam hal ini bertindak dan atas nama Pribadi selanjutnya disebut PEMINJAM.	
							</li>
						</ol>
					</p>
					<p>
						Kedua belah pihak setuju untuk mengadakan Perjanjian Kredit (selanjutnya disebut PERJANJIAN) dengan menggunakan syarat-syarat dan ketentuan-ketentuan sebagai berikut :
					</p>

					<p>
						<ol>
							<li>
								Peminjam mengakui menerima uang sebagai pinjaman atau kredit dari BPR/KOPERASI sebagaimana oleh BPR/KOPERASI telah diserahkan kepadanya uang sebesar  {{$kredit['pengajuan_kredit']}} ({{\App\Service\Helpers\Terbilang::dariRupiah($kredit['pengajuan_kredit'])}}) dalam bentuk fasilitas Pinjaman Angsuran. Jumlah Pinjaman yang diberikan BPR/KOPERASI kepada Peminjam yang cukup dibuktikan dengan PERJANJIAN ini sebagai bukti/kwitansi tanda penerimaan atas jumlah pinjaman tersebut;
							</li>
							<li>
								Atas fasilitas pinjaman tersebut peminjam berkewajiban untuk membayar provisi kredit sebesar .... % (...... persen) dari pinjaman pokok, yang dipungut sekali dalam masa perjanjian kredit ini dan harus dibayar segera setelah perjanjian ini ditandatangani
							</li>
							<li>
								Pengembalian pinjaman atau kredit wajib dilakukan oleh peminjam dengan cara mengangsur bunga    dan/atau pokok pinjaman tiap bulan  dan dilakukan secara berturut-turut tanpa adanya suatu tunggakan atau penangguhan dengan jumlah angsuran per-bulan sebesar Rp................... (.................rupiah), dengan jangka waktu pinjaman ..... (...........) bulan sejak tanggal PERJANJIAN ini ditandatangani, dibayar dalam  .... (..............) kali angsuran, pada tanggal .... (...........) setiap bulannya, pengembalian pinjaman atau kredit berlaku mulai ....... dan berakhir pada ........., hingga seluruh pinjaman baik berupa pokok, bunga maupun biaya-biaya lainnya telah lunas;
							</li>
							<li>
								Sesuai keterangan dan pengakuan yang disampaikan Peminjam kepada BPR/KOPERASI, uang yang dipinjam dari BPR/KOPERASI hanya akan dipergunakan untuk keperluan KONSUMSI; Atas tujuan penggunaan fasilitas pinjaman tersebut, BPR/KOPERASI mempercayakan sepenuhnya kepada Peminjam dan tidak bertanggung jawab atas penggunaan uang hasil pinjaman tersebut dan BPR/KOPERASI sewaktu–waktu dapat meminta pelunasan pinjaman secara seketika apabila penggunaan uang hasil pinjaman diluar keperluan diatas;
							</li>
							<li>
								Peminjam, oleh karena kredit yang diterimanya dengan ini menyerahkan sebagai jaminan barang – barang beserta surat – suratnya berupa :	
							</li>
							<li>
								PERJANJIAN ini mulai berlaku dan mengikat sejak tanggal ditandatangani oleh kedua belah pihak dan berakhir sampai kewajiban PEMINJAM selesai dipenuhi seluruhnya. Kedua belah pihak telah sepakat untuk tunduk dan patuh kepada seluruh syarat perjanjian sebagaimana yang tertulis pada bagian ii (kedua) PERJANJIAN ini yang juga merupakan satu kesatuan dari dan tidak terpisahkan dengan PERJANJIAN ini;
							</li>
						</ol>
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

			<div class="clearfix">&nbsp;</div>
			
			<div class="row text-center">
				<div class="col-sm-12">
					<h3>SYARAT-SYARAT PERJANJIAN</h3>
				</div> 
			</div> 

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<div class="row text-justify">
				<div class="col-sm-12">
					<p>
						<ol>
							<li> 
								Pencairan Pinjaman Kredit dilakukan setelah PEMINJAM memenuhi seluruh kewajiban yang ditetapkan BPR/KOPERASI;
							</li>
							<li>
								PEMINJAM wajib membayar setiap angsuran tepat pada waktunya sebagaimana ditentukan dalam PERJANJIAN. Bilamana PEMINJAM tidak menepati pelaksanaan pembayaran sesuai tanggal dari masing-masing angsuran sebagaimana diatur dalam PERJANJIAN ini, maka dianggap telah cukup bukti bahwa PEMINJAM telah lalai/wanprestasi, sehingga tanpa memerlukan teguran dari BPR/KOPERASI kepada PEMINJAM dikenakan kewajiban sebagai berikut:
								<ol type="a">
									<li>
										Apabila terjadi keterlambatan pembayaran lebih dari 3 (tiga) hari dari tanggal jatuh tempo angsuran, maka kepada PEMINJAM dikenakan denda sebesar 0,5% (nol koma lima persen) per hari keterlambatan dari jumlah angsuran yang dihitung dari tanggal jatuh tempo angsuran;
									</li>
									<li>
										Apabila BPR/KOPERASI memandang perlu melakukan tindakan-tindakan penagihan kepada PEMINJAM, maka seluruh biaya-biaya dan ongkos-ongkos penagihan tersebut baik di dalam atau di luar pengadilan akan ditanggung seluruhnya dan harus dibayar oleh PEMINJAM;
									</li>
									<li>
										Semua biaya-biaya atau ongkos-ongkos termasuk ongkos penafsiran, penyimpanan, pemeliharaan, dan pemeriksaan barang jaminan, ongkos pengacara, ongkos penjualan, biaya-biaya atau ongkos-ongkos lainnya, dan segala macam biaya-biaya atau ongkos-ongkos yang ditimbulkan karena perjanjian ini maupun yang akan timbul di kemudian hari selama biaya-biaya atau ongkos-ongkos tersebut masih berhubungan dengan perjanjian kredit ini akan dibebankan dan dipikul oleh Peminjam;
									</li>
								</ol>	
							</li>
							<li>
								Seluruh hutang PEMINJAM berikut denda dan biaya-biaya lain yang timbul kepada BPR/KOPERASI dapat ditagih secara seketika dan sekaligus bilamana :
								<ol type="a">
									<li>
										PEMINJAM meninggal dunia kecuali jika para ahli waris dan atau yang memperoleh hak dapat memenuhi seluruh kewajiban PEMINJAM dan memperoleh persetujuan BPR/KOPERASI;
									</li>
									<li>
										PEMINJAM dinyatakan pailit atau mengajukan pailit atau dapat menunda pemba yaran hutang-hutangnya (surseance van betaling);
									</li>
									<li>
										Kekayaan PEMINJAM baik sebagian ataupun seluruhnya disita oleh pihak lain;
									</li>
									<li>
										Barang agunan tersebut dipindah tangankan atau dijaminkan kepada pihak ketiga  tanpa mendapatkan persetujuan tertulis dari BPR/KOPERASI;
									</li>
									<li>
										PEMINJAM lalai dalam membayar salah satu angsuran atau angsuran-angsurannya ataupun pelunasan pinjaman yang berupa jasa pinjaman, pokok pinjaman, jasa tambahan maupun biaya–biaya lain yang cukup dibuktikan dengan lewatnya waktu;
									</li>
									<li>
										PEMINJAM tersangkut dalam perkara pidana;
									</li>
									<li>
										Bilamana barang jaminan musnah, berkurang nilainnya baik sebagian ataupun seluruhnya atau karena sesuatu hal yang berakhir hak penguasaannya;
									</li>
									<li>
										Bilamana pernyataan-pernyataan, surat-surat, maupun keterangan-keterangan yang diberikan oleh Peminjam kepada BPR/KOPERASI dalam rangka pemberian kredit ini ternyata tidak benar dan palsu atau dipalsukan atau tidak mengandung kebenaran materiil;
									</li>
									<li>
										Menurut penilaian BPR/KOPERASI bahwa PEMINJAM tidak dapat menjalankan usahanya dengan baik yang akan mempengaruhi pemenuhan kewajiban PEMINJAM kepada BPR/KOPERASI;
									</li>
								</ol>
							</li>
							<li>
								Bilamana PEMINJAM bermaksud melunasi hutangnya kepada BPR/KOPERASI sebelum berakhirnya masa angsuran atau disebut dengan pelunasan dipercepat, maka PEMINJAM menyetujui untuk :
								<ol type="a">
									<li>
										Membayar penuh angsuran yang telah jatuh tempo;
									</li>
									<li>
										Membayar angsuran yang belum jatuh tempo dikurangi dengan discount yang diberikan oleh BPR/KOPERASI. Bilamana Peminjam melakukan pelunasan pinjaman dipercepat sampai dengan  ½ (setengah) masa kontrak pinjaman BPR/KOPERASI akan memberikan discount sebesar 50 % dari total sisa bunga yang harus dibayar; atau keringanan sebesar 20% dari total sisa bunga yang harus dibayar bilamana waktu pelunasan lebih dari ½ (setengah) masa kontrak pinjaman;
									</li>
								</ol>
							</li>
							<li>
								Peminjam menyetujui bahwa jumlah uang yang terhutang pada waktu tertentu didasarkan pada bukti dan catatan yang ada pada BPR/KOPERASI dan yang berlaku mengikat dan sah dalam menentukan dan menetapkan jumlah kredit atau hutang peminjam kepada BPR/KOPERASI serta melepaskan haknya untuk mengajukan keberatan atas pembuktian tersebut;
							</li>
							<li>
								Peminjam berjanji, menjamin serta mengikatkan diri untuk hal-hal sebagai berikut:
								<ol type="a">
									<li>
										Mendahulukan pembayaran yang terhutang berdasarkan perjanjian kredit ini dari pembayaran lainnya;
									</li>
									<li>
										Tidak mengadakan perjanjian kredit dengan Pihak Lain tanpa mendapat persetujuan tertulis terlebih dahulu dari BPR/KOPERASI sepanjang mengenai apa yang diberikan sebagai jaminan dalam perjanjian kredit ini;
									</li>
									<li>
										Bahwa Peminjam berjanji untuk memberikan jaminan pengganti ataupun jaminan tambahan bilamana dipandang perlu oleh pihak BPR/KOPERASI bilamana jaminan yang diberikan musnah atau berkurang nilainya baik sebagian ataupun seluruhnya atau karena sesuatu hal yang menyebabkan berakhirnya hak penguasaannya;
									</li>
									<li>
										Bahwa Peminjam tidak tersangkut dalam suatu perkara atau sengketa apapun;
									</li>
									<li>
										Bahwa Peminjam segera memberitahukan kepada BPR/KOPERASI segala perubahan dalam sifat dan/atau lingkup perusahaan atau kejadian/keadaan yang mempunyai pengaruh penting atau buruk atas usaha/kegiatan perusahaan Peminjam;
									</li>
									<li>
										Peminjam dengan ini berjanji akan tunduk kepada segala ketentuan-ketentuan dan kebiasaan-kebiasaan yang berlaku pada BPR/KOPERASI, baik yang berlaku sekarang maupun di kemudian hari;
									</li>
								</ol>
							</li>
							<li>
								Peminjam menyetujui dan memberi kuasa kepada BPR/KOPERASI untuk mengalihkan atau menggadai ulangkan atau dengan cara apapun memindahkan dan menyerahkan piutang atau tagihan-tagihan BPR/KOPERASI berdasarkan perjanjian ini kepada pihak lain dengan siapa pihak BPR/KOPERASI akan membuat perjanjian berikut semua hak, kekuasaan-kekuasaan dan jaminan-jaminan yang ada pada BPR/KOPERASI dengan syarat-syarat dan perjanjian-perjanjian yang dianggap baik menurut pandangan BPR/KOPERASI sendiri. Perjanjian ini mengikat dan dapat dieksekusi baik oleh BPR/KOPERASI maupun pengganti-penggantinya;
							</li>
							<li>
								Apabila timbul perselisihan sebagai akibat dari PERJANJIAN ini, pertama-tama akan diselesaikan secara musyawarah antara kedua belah pihak akan tetapi apabila tidak tercapai penyelesaian dalam musyawarah,maka kedua belah pihak sepakat agar sengketa yang timbul diselesaikan di Kantor Panitera Pengadilan Negeri Malang di Malang;
							</li>
							<li>
								Segala sesuatu yang belum diatur dengan PERJANJIAN ini termasuk pengurangan dan atau penambahan yang dianggap perlu oleh kedua belah pihak akan diatur kemudian dalam suatu perjanjian tambahan yang merupakan satu kesatuan dari dan tidak terpisahkan dengan PERJANJIAN ini;
							</li>
						</ol>
					</p>
					<p>
						Demikian syarat-syarat tersebut diatas merupakan satu kesatuan yang tidak terpisahkan dari SURAT PERJANJIAN KREDIT. No. {{$kredit['nomor_kredit']}} tertanggal {{$kredit['tanggal_pengajuan']}} yang telah dimengerti dan disepakati oleh kedua belah pihak.
					</p>
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
