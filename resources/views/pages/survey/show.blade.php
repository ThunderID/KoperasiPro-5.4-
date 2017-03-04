@extends('pages.survey.templates.index_show_template')

@section('page_content')
	
		<!-- BLOCK 1 Display Data Rencana Kredit // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.credit.components.data_panels.rencana_kredit')
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>

		<!-- BLOCK 2 Display Data Kepribadian // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_kepribadian')
			</div>
		</div>		

		<div class="clearfix">&nbsp;</div>

		<!-- BLOCK 3 Display Ekonomi Makro // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.eco_macro')
			</div>
		</div>		

		<div class="clearfix">&nbsp;</div>		

		<!-- BLOCK 4 Display Data Keuangan // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_keuangan')
			</div>
		</div>	

		<div class="clearfix">&nbsp;</div>		

		<!-- BLOCK 5 Display Data Aset // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_aset')
			</div>
		</div>		

		<div class="clearfix">&nbsp;</div>		
		
		<!-- BLOCK 6 Display Data Jaminan // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_jaminan')
			</div>
		</div>	

		<!-- <div class="clearfix">&nbsp;</div> -->
		<!-- <div class="clearfix">&nbsp;</div>		 -->

		<!-- BLOCK 7 Action Button // -->
<!-- 		<div class="row">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-success pull-right">Simpan</button>
			</div>
		</div> -->

		<div class="clearfix">&nbsp;</div>		

@stop

@section('page_modals')

	<!-- Data kepribadian // -->
	@component('components.modal', [
		'id' 		=> 'data_kepribadian',
		'title'		=> 'Data Kepribadian',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		@include('pages.survey.components.form.data_kepribadian')
	@endcomponent

	<!-- Data ekonomi makro // -->
	@component('components.modal', [
		'id' 		=> 'eco_macro',
		'title'		=> 'Ekonomi Makro',
		'settings'	=> [
			'hide_buttons'	=> true
		]
	])
		@include('pages.survey.components.form.eco_macro')
	@endcomponent

	<!-- Data aset // -->
	@component('components.modal', [
		'id' 		=> 'data_aset',
		'title'		=> 'Data Aset',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		@include('pages.survey.components.form.data_aset')
	@endcomponent		

	<!-- Data keuangan // -->
	@component('components.modal', [
		'id' 		=> 'data_keuangan',
		'title'		=> 'Data Keuangan',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		@include('pages.survey.components.form.data_keuangan')
	@endcomponent	

	<!-- Data jaminan // -->
	@component('components.modal', [
		'id' 		=> 'data_jaminan',
		'title'		=> 'Data Jaminan',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		@include('pages.survey.components.form.data_jaminan')
	@endcomponent		

@append