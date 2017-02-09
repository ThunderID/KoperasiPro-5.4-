@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_kredit_baru')
    active
@stop

@push('content')
	<div class="row" style="padding-top: 20px;">
        <div class="col-sm-3">
            @include('pages.credit.helper.lists')
        </div>
        <div class="col-sm-9">
            <h3 style="margin-top: 5px">Data credits</h3>
            <hr/>
        </div>
    </div>	
@endpush

@push('scripts')
@endpush
