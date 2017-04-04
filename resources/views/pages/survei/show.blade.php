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
				@include('pages.survey.components.data_panels.data_kepribadian',[
					'edit' => true
				])
			</div>
		</div>		

		<div class="clearfix">&nbsp;</div>

		<!-- BLOCK 3 Display Ekonomi Makro // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.eco_macro',[
					'edit' => true
				])
			</div>
		</div>		

		<div class="clearfix">&nbsp;</div>		

		<!-- BLOCK 4 Display Data Keuangan // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_keuangan',[
					'edit' => true
				])
			</div>
		</div>	

		<div class="clearfix">&nbsp;</div>		

		<!-- BLOCK 5 Display Data Aset // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_aset',[
					'edit' => true
				])
			</div>
		</div>		

		<div class="clearfix">&nbsp;</div>		
		
		<!-- BLOCK 6 Display Data Jaminan // -->
		<div class="row">
			<div class="col-sm-12">
				@include('pages.survey.components.data_panels.data_jaminan',[
					'edit' => true
				])
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
	@stack('show_modals')
@append