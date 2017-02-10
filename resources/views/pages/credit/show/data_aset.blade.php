<div class="row">
	<div class="col-sm-12">
		<h3>DATA ASET</h3>
		<hr/>
	</div>
</div>

@foreach($page_datas->credit->asset as $key => $value)
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
			<h4>{{$value->ownership_status}}</h4>
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