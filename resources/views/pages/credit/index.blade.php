@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('daftar_kredit')
	active
@stop

@push('content')
	<div class="row field">
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
		<div class="col-sm-9 text-center">
			<h4 class="text-center" style="margin-top: 21%">Belum Ada Data Dipilih</h4>
			<p class="text-center p-b-md">Silahkan Terlebih Dahulu Memilih Data Kredit</p>
			<span class="glyphicon glyphicon-hand-left" style="font-size: 30px;"></span>
		</div>
	</div>  
@endpush

@push('scripts')
@endpush
