<div class="list-group">
    @foreach($page_datas->persons as $key => $value)
		<a href="{{route(Route::currentRouteName(), array_merge(Input::all(), ['id' => $value->id]))}}" class="list-group-item {{$key == 0? 'first': ''}}">
            <h4 class="list-group-item-heading">
                {{$value->name}} 
            </h4>
            <p class="list-group-item-text text-right">{{$value->phone_number}}</p>
        </a>
    @endforeach
</div>