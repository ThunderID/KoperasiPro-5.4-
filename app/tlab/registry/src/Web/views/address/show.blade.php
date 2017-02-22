@extends('registry::master')

@section('content')
	<div class="row" style="padding-top: 20px;">
        <div class="col-sm-3">
            <form class="form">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
                        Cari
                    </span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
            </form>

            <div class="clearfix">&nbsp;</div>

            <div class="list-group">
				@foreach($registry as $key => $value)
					<a href="{{route('address.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
						<h4 class="list-group-item-heading">{{$value->address->city}} <span class="badge">{{$value->address->province}}</span></h4>
				        <p class="list-group-item-text">{{$value->address->street}}</p>
				    </a>
				@endforeach
            </div>
        </div>
         <div class="col-sm-9">
            <h3 style="margin-top: 5px">Address</h3>
            <hr/>
            <table>
                <tr class="row">
                    <td class="col-sm-3"><h4><small>Address</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->address->street}}</h4></td>
                </tr>
                 <tr class="row">
                    <td class="col-sm-3"><h4><small>City</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->address->city}}</h4></td>
                </tr>
                 <tr class="row">
                    <td class="col-sm-3"><h4><small>Province</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->address->province}}</h4></td>
                </tr>
                 <tr class="row">
                    <td class="col-sm-3"><h4><small>Country</small></h4></td>
                    <td class="col-sm-9"><h4>{{$registry_detail->address->country}}</h4></td>
                </tr>
            </table>
            <br>
            <br>
            <h3 style="margin-top: 5px">People Live Here</h3>
            <hr/>
            <table>
                @foreach($registry_detail->houses as $value)
                    <tr class="row">
                        <td class="col-sm-9">
                            <h4>{{$value->name}}</h4>
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <br>
            <h3 style="margin-top: 5px">Office Here</h3>
            <hr/>
            <table>
                @foreach($registry_detail->offices as $value)
                    <tr class="row">
                        <td class="col-sm-9">
                            <h4>{{$value->name}}</h4>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection