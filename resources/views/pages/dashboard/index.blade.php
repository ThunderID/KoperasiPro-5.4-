@extends('template.cms_template')

@section('dashboard')
	active in
@stop

@push('content')
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			@foreach($page_attributes->hook as $key => $value)
				<div class="row">
					@foreach($value as $key2 => $value2)
						<div class="col-sm-{{12/count($value)}}">
							@include($value2)
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
