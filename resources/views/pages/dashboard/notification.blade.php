@extends('template.cms_template')

@section('dashboard')
	active in
@stop

@push('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="list-group">
			    @foreach(\App\Web\Services\Notification::all() as $key => $value)
					<a href="{{$value->link}}" target="_blank" class="list-group-item {{$key == 0? 'first': ''}}">
			            <p class="list-group-item-text">{{$value->description}}</p>
			        </a>
			    @endforeach
			</div>
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
