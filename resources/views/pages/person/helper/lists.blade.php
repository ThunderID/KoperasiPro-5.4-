
<form class="form" action="{{route(Route::currentRouteName(), Input::all())}}">
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon3" style="padding: 0px">
			<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				@if(Input::has('status'))
					{{ucwords(Input::get('status'))}}
				@else
					Semua
				@endif
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				@foreach($page_datas->person_filters as $key => $value)
					<li><a href="{{route(Route::currentRouteName(), array_merge(Input::all(), ['status' => $key]))}}">{{$value}}</a></li>
				@endforeach
			</ul>
		</span>
		<input type="text" class="form-control" name="q" id="basic-url" aria-describedby="basic-addon3">
	</div>
</form>

<div class="clearfix">&nbsp;</div>

<div class="list-group">
	@foreach($page_datas->persons as $key => $value)
		<a href="{{route(Route::currentRouteName(), array_merge(Input::all(), ['id' => $value->id]))}}" class="list-group-item">
			<h4 class="list-group-item-heading">
				{{$value->name}} 
			</h4>
		</a>
	@endforeach
</div>