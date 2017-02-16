@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('daftar_kredit')
	active
@stop

@push('content')
	<div class="row" style="padding-top: 20px;">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kredit',
					'status'			=> 	['analyzing','drafting'],
					'status_default'	=> 'semua'
				]])
			</div>

			<div class="sidebar-content">
				@include('pages.credit.helper.lists')
			</div>
		</div>
		<div class="col-sm-9">

			<!-- BLOCK 1 Display Data Rencana Kredit // -->
			<div class="row">
				<div class="col-sm-12">
					@include('pages.credit.show.rencana_kredit')
				</div>
			</div>

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		   
			<!-- BLOCK 2 Display Data Pribadi,  Data Kelurga, Data Penjamin // -->
			<div class="row">
				<div class="col-sm-6">
					@include('pages.credit.show.data_pribadi')
				</div>
				<div class="col-sm-6">
					@include('pages.credit.show.data_keluarga')
					@include('pages.credit.show.data_penjamin')
				</div>
			</div>

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

			<!-- BLOCK 3 Display Data Keuangan, Data Aset, Data Jaminan // -->
			<div class="row">
				<div class="col-sm-6">
					@if(isset($page_datas->credit->finance))
						@include('pages.credit.show.data_keuangan')
					@endif
				</div>
				<div class="col-sm-6">
					@if(isset($page_datas->credit->asset))
						@include('pages.credit.show.data_aset')
					@endif
					@include('pages.credit.show.data_jaminan')
				</div>
			</div>

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			
			<!-- BLOCK 4 Action Button // -->
			<div class="row">
				<div class="col-sm-6 text-left">
					{{Form::open(['url' => route('credit.destroy', ['id' => $page_datas->credit->credit->id]), 'class' => 'form form-inline'])}}
						<button class="btn btn-danger">Tolak</button>
					{{Form::close()}}
				</div>
				<div class="col-sm-6 text-right">
					<a class="btn btn-primary">Ajukan</a>
					<a class="btn btn-primary">Drafting</a>
				</div>
			</div>

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>

		</div>
	</div>	
@endpush

@push('scripts')
@endpush
