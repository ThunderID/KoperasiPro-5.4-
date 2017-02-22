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
					<a href="{{route('personality.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
						<h4 class="list-group-item-heading">{{$value->owner->name}}</h4>
						<p class="list-group-item-text">{{$value->character}}</p>
					</a>
				@endforeach
			</div>
		</div>
		<div class="col-sm-9">
			<h3 style="margin-top: 5px">Data Kepribadian</h3>
			<hr>
			<table>
				<tr class="row">
					<td class="col-sm-3"><h4><small>Dilingkungan Tinggal</small></h4></td>
					<td class="col-sm-9">
						<h4>{{$value->residence['acquinted']}}</h4>
					</td>
				</tr>
				<tr class="row">
					<td class="col-sm-3"><h4><small>Dilingkungan Kerja</small></h4></td>
					<td class="col-sm-9">
						<h4>{{$value->workplace['acquinted']}}</h4>
					</td>
				</tr>
				<tr class="row">
					<td class="col-sm-3"><h4><small>Karakter</small></h4></td>
					<td class="col-sm-9">
						<h4>{{$value->character}}</h4>
					</td>
				</tr>
				<tr class="row">
					<td class="col-sm-3"><h4><small>Pola Hidup</small></h4></td>
					<td class="col-sm-9">
						<h4>{{$value->lifestyle}}</h4>
					</td>
				</tr>
			</table>
		</div>
	</div>
@endsection