@php
/*
	null => wont show a things

	param -> title = title
	param -> status => lists
	param -> status_default => default title
	param -> sorts => lists
	param -> sorts_default => default title

*/
@endphp
<div class="title">
	<div class="row">
		<div class="col-xs-6 col-md-6">
			<h2>{{ $param['title'] }}</h2>
		</div>
		<div class="col-xs-6 col-md-6 p-r-none text-right filters" style="margin-top: -6px;">
			@if (!is_null($param['status']))
				<div class="dropdown">
					<a class="btn dropdown-toggle fa-animate" type="button" data-toggle="dropdown">
						@if (Input::has('status'))
							{{ ucwords(Input::get('status')) }}
						@else
							{{ ucWords(str_replace('_', ' ', $param['status_default'])) }}
						@endif
						<span>
							<i class="fa fa-lg fa-angle-down" aria-hidden="true"></i>
						</span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ route(Route::currentRouteName(), Input::only('q','sort')) }}">
								{{ ucwords(str_replace('_', ' ', $param['status_default'])) }}
							</a>
						</li>
						@foreach ($param['status'] as $item)
							<li>
								<a href="{{ route(Route::currentRouteName(), Input::only('q','sort')) }}&status={{$item}}">
									{{ ucWords(str_replace('_', ' ', $item)) }}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>
</div>
<div class="search">
	<form class="form" action="{{ route(Route::currentRouteName(), Input::only('status','sort')) }}" data-pjax=true data-ajax-submit=false>
		<div class="input-group">
			<input class="form-control" name="q" type="text" placeholder="{{ (isset($param['placeholder_input'])) ? $param['placeholder_input'] : 'Cari Data Kredit' }}" value="{{ Input::get('q') }}">
			<span class="input-group-btn group-btn-search">
				<a class="btn clear-search {{ !Input::has('q') ? 'disabled' : '' }}" href="{{ route(Route::currentRouteName(), Input::only('status','sort')) }}" data-toggle="tooltip" title="Hapus pencarian">
					<i class="fa fa-window-close" aria-hidden="true"></i>
				</a>							
				<button class="btn" type="submit" data-toggle="tooltip" title="Cari data" data-search="true">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</span>                        
		</div>
	</form>
</div>
{{-- <div class="row filters">
	<div class="col-sm-6 left">
	</div>
	<div class="col-sm-6 right">
	</div>
</div> --}}