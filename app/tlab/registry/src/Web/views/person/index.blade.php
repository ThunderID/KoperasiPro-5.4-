@extends('registry::master')

@section('content')
	<div class="row" style="padding-top: 20px;">
        <div class="col-sm-3">
            <form class="form">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3" style="padding: 0px">
                        <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            @if(Input::has('pria'))
                                Pria
                            @elseif(Input::has('wanita'))
                                Wanita
                            @else
                                Semua
                            @endif
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{route('person.index', ['pria' => true])}}">Pria</a></li>
                            <li><a href="{{route('person.index', ['wanita' => true])}}">Wanita</a></li>
                             <li><a href="{{route('person.index')}}">Semua</a></li>
                        </ul>
                    </span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
            </form>


            <div class="clearfix">&nbsp;</div>

            <div class="list-group">
				@foreach($registry as $key => $value)
					<a href="{{route('person.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
						<h4 class="list-group-item-heading">{{$value->name}} <span class="badge">{{$value->date_of_birth->diffInYears(Carbon\Carbon::now())}}</span></h4>
                        @foreach($value->phones as $phone)
    				        <p class="list-group-item-text text-right">{{$phone->number}}</p>
				        @endforeach
                    </a>
				@endforeach
            </div>
        </div>
        <div class="col-sm-9">
            <h3 style="margin-top: 5px">Data Person</h3>
            <hr/>
        </div>
    </div>
@endsection