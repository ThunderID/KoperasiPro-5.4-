@extends('template.cms_template')

@section('registrasi')
	active in
@stop

@section('data_orang')
	active
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-3 content-sidebar">
			<div class="sidebar-header p-b-sm">
				@include('components.sidebar.basic_header',[ 'param' => [
					'title' 			=> 'Data Orang',
					'status'			=> 	[],
					'status_default'	=> 'semua'
				]])
			</div>

			<div class="sidebar-content">
				@include('pages.person.helper.lists')
			</div>
		</div>

		<div class="col-sm-9">
			
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
