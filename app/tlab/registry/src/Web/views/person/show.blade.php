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
                        <p class="list-group-item-text">{{$value->nik}}</p>
                        <p class="list-group-item-text text-right">{{$value->phone_number}}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-9">
            <h3 style="margin-top: 5px">Somebody's Data</h3>
            <hr/>
            <table>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Name</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->name}}</h4></td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Date Of Birth</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->date_of_birth->format('d M Y')}}</h4></td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Jenis Kelamin</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->gender}}</h4></td>
                </tr>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Occupation</small></h4></td>
                    <td class="col-sm-9">
                        @foreach($registry_detail->works as $value)
                            <h4>{{$value->position}}</h4>
                        @endforeach
                    </td>
                </tr>
                @foreach($registry_detail->relatives as $value)
                    <tr class="row">
                        <td class="col-sm-3"><h4><small>{{$value->relation}}</small></h4></td>
                        <td class="col-sm-9">
                            <h4>{{$value->name}}</h4>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection