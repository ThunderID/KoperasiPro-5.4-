
@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<!-- BLOCK 1 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.pengajuan.data_kredit')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

	<!-- BLOCK 2 Display Data Rencana Kredit // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.pengajuan.data_kreditur')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

   <!-- 3 Data Kelurga // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.pengajuan.data_keluarga')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

   <!-- 4 Data Data Penjamin // -->
	<div class="row">
		<div class="col-sm-12">
			{{-- @include('pages.kredit.components.data_panels.pengajuan.data_penjamin',[
				'edit' => true
			]) --}}
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>

   <!-- BLOCK 5 Data jaminan // -->
	<div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.pengajuan.data_jaminan')
		</div>
	</div>

	<div class="clearfix">&nbsp;</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append