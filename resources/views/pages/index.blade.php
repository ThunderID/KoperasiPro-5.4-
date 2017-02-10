@extends('template.cms_template')

@section('dashboard')
    active in
@stop

@push('content')
	'hi'
	@include('components.alertbox')
	<a href="javascript:void(0);" id="halo">say Halo!</a>
	
@endpush

@push('scripts')
@endpush