@extends('template.print_template')
@push('content')
	{{-- kepribadian --}}
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Kepribadian</h4>
		</div>
	</div>
	{{-- include form kepribadian --}}
	@include('pages.kredit.print.components.kepribadian', [
		'datas' => $page_datas->credit['survei_kepribadian']
	])
	<div class="clearfix">&nbsp;</div>

	{{-- keuangan --}}
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Keuangan</h4>
		</div>
	</div>
	{{-- include form keuangan --}}
	@include('pages.kredit.print.components.keuangan', [
		'datas' => $page_datas->credit['survei_keuangan']
	])
	<div class="clearfix">&nbsp;</div>

	{{-- rekening --}}
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Rekening</h4>
		</div>
	</div>
	{{-- include form rekening --}}
	@include('pages.kredit.print.components.rekening', [
		'datas' => $page_datas->credit['survei_rekening']
	])
	<div class="clearfix">&nbsp;</div>

	{{-- aset --}}
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Aset</h4>
		</div>
	</div>
	{{-- include form aset tanah bangunan --}}
	@include('pages.kredit.print.components.aset_tanah_bangunan', [
		'datas' => $page_datas->credit['survei_aset_tanah_bangunan']
	])
	<hr>
	{{-- include form aset kendaraan --}}
	@include('pages.kredit.print.components.aset_kendaraan', [
		'datas' => $page_datas->credit['survei_aset_kendaraan']
	])
	<hr>
	{{-- include form aset usaha --}}
	@include('pages.kredit.print.components.aset_usaha', [
		'datas' => $page_datas->credit['survei_aset_usaha']
	])
	<div class="clearfix">&nbsp;</div>


	{{-- jaminan kendaraan --}}
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Jaminan Kendaraan</h4>
		</div>
	</div>
	{{-- include form jaminan kendaraan --}}
	@include('pages.kredit.print.components.jaminan_kendaraan', [
		'datas' => $page_datas->credit['jaminan_kendaraan']
	])
	<div class="clearfix">&nbsp;</div>

	{{-- jaminan tanah & bangunan --}}
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center"  style="padding-left: 10px; padding-right: 10px;">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Form Survei Jaminan &amp; Tanah</h4>
		</div>
	</div>
	{{-- include form jaminan tanah bangunan --}}
	@include('pages.kredit.print.components.jaminan_tanah_bangunan', [
		'datas' => $page_datas->credit['jaminan_tanah_bangunan']
	])
	<div class="clearfix">&nbsp;</div>
@endpush