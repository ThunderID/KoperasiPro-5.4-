@extends('layout.master')

@section('navigation')
	@include('navigation.fixed_top')
@endsection

@section('header')
	@include('header.tab')
@endsection

@section('content')
	<div class="row" style="padding-top: 15px;">
		<div class="col-sm-3">
			<form class="form">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon3">Cari</span>
					<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
				</div>
			</form>
			<div class="clearfix">&nbsp;</div>
			<div class="list-group">
				@foreach($kredit as $key => $value)
					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">{{$value->debitur->nama}} <span class="badge">{{$value->statusTerbaru()->status}}</span></h4>
						<p class="list-group-item-text">{{$value->nomor}}</p>
						<p class="list-group-item-text text-right">IDR {{number_format($value->pinjaman->value)}}</p>
					</a>
				@endforeach
			</div>
		</div>
		<div class="col-sm-9">
		</div>
	</div>
@endsection