@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('daftar_kredit')
    active
@stop

@push('content')
	'hi'
	@include('components.alertbox')

	
@endpush

@push('scripts')

@endpush