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
            <div class="title">
                <h2>Data credits</h2>
            </div>
            <div class="search">
                <form class="form" action="{{route('credit.index', Input::all())}}">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-search" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>                        
                    </div>
                </form>
            </div>

            <div class="row" style="height: 100px;">
            </div>
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
