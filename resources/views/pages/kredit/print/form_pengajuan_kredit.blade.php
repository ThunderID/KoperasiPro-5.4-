@extends('template.print_template')
@push('content')
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<h4 class="text-capitalize m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Rencana Kredit</h4>
		</div>
	</div>
	@include('pages.kredit.print.components.data_kredit')

	<div class="row">
		<div class="col-sm-6">
			<h4 class="text-capitalize text-center m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Data Pribadi</h4>
			@include('pages.kredit.print.components.data_pribadi')
		</div>
		<div class="col-sm-6">
			<h4 class="text-capitalize text-center m-b-md" style="background-color: #eee; padding: 5px; font-size: 16px;">Data Keluarga</h4>
			@include('pages.kredit.print.components.data_keluarga')
		</div>
	</div>


	<div class="clearfix">&nbsp;</div>
@endpush