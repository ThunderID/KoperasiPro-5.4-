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

			<div class="sidebar-content _window" data-padd-top="auto" data-padd-bottom="32">
				<div class="list-group">
				    @foreach($page_datas->credits as $key => $value)
				        <a href="{{route('credit.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item {{$key == 0? 'first': ''}} {{((isset($page_datas->id) && $page_datas->id == $value->id) ? 'active' : '')}} " >
				            <h4 class="list-group-item-heading">
				                {{$value->creditor->name}} 
				                <span class="badge pull-right">{{$value->status}}</span>
				            </h4>
				            <p>{{$value->id}}</p>
				            <p class="list-group-item-text p-t-xs">{{$value->credit_amount->IDR()}}</p>
				        </a>
				    @endforeach
				</div>
			</div>
		</div>
		<div class="col-sm-9 text-center">
			<div class="_window" data-padd-top="auto" data-padd-bottom="32" style="padding-top:16px;padding-bottom: 16px;overflow-y: auto;margin-right: -15px; padding-right: 16px;">
					@yield('page_content')
			</div>
		</div>
	</div>  
@endpush

@push('scripts')
@endpush
