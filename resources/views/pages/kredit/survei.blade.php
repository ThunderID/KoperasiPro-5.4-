@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<!-- BLOCK 1 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.pengajuan.data_kredit')
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 2 Display Data Kepribadian // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_kepribadian',[
				'edit' => true
			])
		</div>
	</div>		

	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 3 Display Ekonomi Makro // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.eco_macro',[
				'edit' => true
			])
		</div>
	</div>		

	<div class="clearfix">&nbsp;</div>		

	<!-- BLOCK 4 Display Data Keuangan // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_keuangan',[
				'edit' => true
			])
		</div>
	</div>	

	<div class="clearfix">&nbsp;</div>	

	<!-- BLOCK 5 Display Data Aset // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_aset',[
				'edit' => true
			])
		</div>
	</div>		

	<div class="clearfix">&nbsp;</div>
	
	<!-- BLOCK 6 Display Data Jaminan // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_jaminan',[
				'edit' => true
			])
		</div>
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append