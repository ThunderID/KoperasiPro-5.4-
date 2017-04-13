@extends('template.print_template')
@push('content')
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12">
			<h1>FORM PENGAJUAN KREDIT</h1>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	
	<div class="row m-b-sm">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				@include('pages.kredit.print.pengajuan.data_kreditur')
				@include('pages.kredit.print.pengajuan.data_kredit')
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p class="m-b-xs text-capitalize text-sm"><strong>jaminan</strong></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			@include('pages.kredit.print.pengajuan.data_jaminan_kendaraan')
			@include('pages.kredit.print.pengajuan.data_jaminan_tanah_bangunan')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	@include('pages.kredit.print.pengajuan.surat_pernyataan')

	<div class="row">
		<div class="col-sm-12 text-center">
			<p>{{ TAuth::activeOffice()['koperasi']['nama'] }}, {{ date('d F Y') }}</p>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="row text-center">
		<div class="col-sm-4">
			<p>_______________________________</p>
			<p>Referensi</p>
		</div>
		<div class="col-sm-4">
			<p>_______________________________</p>
			<p>Keluarga Pemohon</p>
		</div>
		<div class="col-sm-4">
			<p>_______________________________</p>
			<p>Pemohon</p>
		</div>
	</div>
@endpush