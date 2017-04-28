@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="data-nasabah" role="tabpanel">
					@include ('pages.kredit.components.panel.survei.panel_nasabah')
				</div>
				<div class="tab-pane fade" id="data-kepribadian" role="tabpanel">
					@include ('pages.kredit.components.panel.survei.panel_kepribadian')
				</div>
				<div class="tab-pane fade" id="data-aset" role="tabpanel">
					@include ('pages.kredit.components.panel.survei.panel_aset')
				</div>
				<div class="tab-pane fade" id="data-jaminan" role="tabpanel">
					@include ('pages.kredit.components.panel.survei.panel_jaminan')
				</div>
				<div class="tab-pane fade" id="data-rekening" role="tabpanel">
					@include ('pages.kredit.components.panel.survei.panel_rekening')
				</div>
				<div class="tab-pane fade" id="data-keuangan" role="tabpanel">
					@include ('pages.kredit.components.panel.survei.panel_keuangan')
				</div>
			</div>
		</div>
	</div>

	<!-- BLOCK 2 Display Data Kreditur // -->
	{{-- <div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_kreditur',[
				'edit' => true
			])
		</div>
	</div>		 --}}

	<!-- BLOCK 3 Display Data karakter & kepribadian // -->
	{{-- <div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_kepribadian',[
				'edit' => true
			])
		</div>
	</div>	 --}}	
	
	<!-- BLOCK 6 Display Data Keuangan // -->
	{{-- <div class="row">
		<div class="col-sm-12">
			@include('pages.kredit.components.data_panels.survei.data_keuangan',[
				'edit' => true
			])
		</div>
	</div> --}}
@stop

@section('page_modals')
	@stack('show_modals')
@append

@section('page_scripts')
@append