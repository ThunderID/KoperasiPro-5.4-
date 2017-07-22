@extends('template.print_template')
@push('content')
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-8 text-right">
			<h4 style="font-size:20px;">FORMULIR PERMOHONAN KREDIT {{str_repeat('&nbsp;&nbsp;&nbsp;', 1)}}</h4>
		</div>
		<div class="col-sm-4 text-left">
			<table style="border:1px solid;width:100%;height:35px;"><tr><td></td></tr></table>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">RENCANA KREDIT</h4>
		</div>
	</div>
	@include('pages.kredit.print.components.data_kredit')

	<div class="row">
		<div class="col-sm-6">
			<h4 class="text-capitalize text-center m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">DATA PRIBADI</h4>
			@include('pages.kredit.print.components.data_pribadi')
		</div>
		<div class="col-sm-6">
			<h4 class="text-capitalize text-center m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">DATA KELUARGA</h4>
			@include('pages.kredit.print.components.data_keluarga')
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h4 class="text-capitalize text-center m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">JAMINAN KENDARAAN</h4>
			@include('pages.kredit.print.components.pengajuan_jaminan_kendaraan')
		</div>
		<div class="col-sm-6">
			<h4 class="text-capitalize text-center m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">JAMINAN TANAH BANGUNAN</h4>
			@include('pages.kredit.print.components.pengajuan_jaminan_tanah_bangunan')
		</div>
	</div>

	<!-- AREA TTD -->
	<div class="row">
		<div class="col-sm-12 text-center">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">TANDA TANGAN DAN PERNYATAAN</h4>
		</div>
	</div>

	<div class="row m-l-none m-r-none">
		<div class="col-sm-12">
			<p class="text-justify text-sm">
				Surat permonohan ini, saya isi dengan sebenarnya dan saya mengijinkan Pihak Koperasi untuk mendapatkan dan meneliti informasi yang diperlukan serta tidak mewajibkan Pihak Koperasi untuk memberikan penjelasan terhadap segala keputusan yang dikeluarkan. Sehubungan dengan hal ini, saya menyatakan bersedia dan mentaati segala persyaratan dan ketentuan yang berlaku pada Koperasi beserta setiap perubahannya.
			</p>
		</div>

		<div class="col-sm-12">
			<p class="text-left text-capitalize text-sm">{{str_repeat('.', 15)}}, {{str_repeat('.', 30)}}20....</p>
		</div>
		<div class="col-sm-4">
			<p class="text-left text-capitalize text-sm">Pemohon </p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			@if(!empty($page_datas->credit['debitur']['nama']))
				<p class="text-left text-capitalize text-sm">{{$page_datas->credit['debitur']['nama']}} </p>
			@else
				<p class="text-left text-capitalize text-sm">Nama Jelas : </p>
			@endif
		</div>
		<div class="col-sm-4">
		@if(count($page_datas->credit['debitur']['relasi']))
			<p class="text-left text-capitalize text-sm">{{ucwords(str_replace('_', ' ', $page_datas->credit['debitur']['relasi'][0]['pivot']['hubungan']))}}</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p class="text-left text-capitalize text-sm">{{$page_datas->credit['debitur']['relasi'][0]['nama']}} </p>
		@else
			<p class="text-left text-capitalize text-sm">Suami / Istri / Orang Tua Pemohon *)</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p class="text-left text-capitalize text-sm">Nama Jelas : </p>
		@endif
		</div>
		<div class="col-sm-4">
		@if(count($page_datas->credit['marketing']))
			<p class="text-left text-capitalize text-sm">Referensi</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p class="text-left text-capitalize text-sm">{{$page_datas->credit['marketing']['nama']}} </p>
		@else
			<p class="text-left text-capitalize text-sm">Referensi</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p class="text-left text-capitalize text-sm">Nama Jelas : </p>
		@endif
		</div>
	</div>

	<!-- AREA CATATAN -->
	<div class="row">
		<div class="col-sm-12 text-center">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">DIISI OLEH KOPERASI</h4>
		</div>
	</div>

	<div class="row m-l-none m-r-none">
		<div class="col-sm-6">
			<p class="text-left text-capitalize text-sm">CUSTOMER SERVICE/ADMINISTRASI KREDIT (1) </p>
			<p class="text-left text-capitalize text-sm">Permohonan Kredit diterima oleh &emsp;&nbsp;: </p>
			<p class="text-left text-capitalize text-sm">Tanggal dan Paraf {{str_repeat('&emsp;', 8)}}: </p>
		</div>
		<div class="col-sm-6">
			<p class="text-left text-capitalize text-sm">ACCOUNT OFFICER/MARKETING (2) </p>
			<p class="text-left text-capitalize text-sm">Permohonan Kredit diterima oleh &emsp;&nbsp;: </p>
			<p class="text-left text-capitalize text-sm">Tanggal dan Paraf {{str_repeat('&emsp;', 8)}}: </p>
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>
@endpush