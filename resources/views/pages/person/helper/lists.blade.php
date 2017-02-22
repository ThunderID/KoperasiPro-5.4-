<div class="list-group">
    @foreach($page_datas->persons as $key => $value)
		<a href="{{route('person.show', ['id' => $value->id])}}" class="list-group-item {{$key == 0? 'first': ''}}">
            <h4 class="list-group-item-heading">
                {{$value->name}} 
            </h4>
            @foreach($value->phones as $phone)
	            <p class="list-group-item-text text-right">{{$phone->number}}</p>
        	@endforeach
        </a>
    @endforeach
</div>