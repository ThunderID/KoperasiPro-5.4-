@extends('credit::master')

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
				@foreach($credit as $key => $value)
					<a href="{{route('collateral.show', array_merge(['id' => $value->id], Input::all()))}}" class="list-group-item">
						<h4 class="list-group-item-heading">{{$value->creditor->name}} <span class="badge">Pending</span></h4>
						<p class="list-group-item-text text-right">{{$value->credit_amount->IDR()}}</p>
					</a>
				@endforeach
			</div>
		</div>
		<div class="col-sm-9">
			<h3 style="margin-top: 5px">Data credits</h3>
			<hr/>
		</div>
	</div>
@endsection