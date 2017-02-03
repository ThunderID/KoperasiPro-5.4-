@extends('template.cms_template')

@push('content')
	'hi'
	@include('components.alertbox')
@endpush

@push('scripts')
	'hi'
@endpush
