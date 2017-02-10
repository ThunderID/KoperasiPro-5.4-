<div class="row">
	<div class="col-sm-12">
		<h3>DATA ASET</h3>
		<hr/>
	</div>
</div>

@foreach($page_datas->credit->asset->assets as $key => $value)
	<br>
	<h5><strong>Asset {{$key+1}}</strong></h5>
	<div class="row">
		<div class="col-sm-6">
			<h4><small>Jenis</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->type}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h4><small>Status</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{str_replace('_', ' ', $value->ownership_status)}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h4><small>Sejak</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->since->format('d M Y')}}</h4>
		</div>
	</div>
@endforeach