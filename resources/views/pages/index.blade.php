@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_kredit_baru')
    active
@stop

@push('content')
	'hi'
	@include('components.alertbox')
	<a href="javascript:void(0);" id="halo">say Halo!</a>
	
@endpush

@push('scripts')
@endpush