@extends('template.cms_template')

@section('kredit')
	active in
@stop

@section('daftar_kredit')
	active
@stop

@push('content')
	<div class="row">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Kredit',
					'status'			=> 	['analyzing','drafting']
					'status_default'	=> 'semua',
				]])
			</div>

			<div class="sidebar-content">
				@include('pages.credit.helper.lists')
			</div>
		</div>
		<div class="col-sm-9">
			<h3 style="margin-top: 5px">Data credits</h3>
			<hr/>
		</div>
	</div>  
@endpush

@push('scripts')
@endpush
