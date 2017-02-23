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
					<a href="{{route('user.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
						<h4 class="list-group-item-heading">{{$value->owner->name}} <span class="badge">active</span></h4>
						<p class="list-group-item-text">{{$value->email}}</p>
					</a>
				@endforeach
			</div>
		</div>
		<div class="col-sm-9">
			<h3 style="margin-top: 5px">Data Access</h3>
			<hr>
			<table>
				@foreach($registry_detail->accesses as $value)
					<tr class="row">
						<td class="col-sm-3"><h4><small>{{$value->office->name}}</small></h4></td>
						<td class="col-sm-9">
							<h4>{{$value->role}}</h4>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection