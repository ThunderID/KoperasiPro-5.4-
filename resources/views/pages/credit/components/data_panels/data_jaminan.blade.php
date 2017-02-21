<div class="row">
	<div class="col-sm-12">
		<h3>DATA JAMINAN</h3>
		<hr/>
	</div>
</div>

@foreach($page_datas->credit->credit->collaterals as $key => $value)
	<div class="row">
		<div class="col-sm-3">
			<h4><small>{{ucwords($value->type)}}</small></h4>
		</div>
		<div class="col-sm-9" style="color: red">
			<h4>{{strtoupper($value->legal)}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-3">
			<h4><small>Status</small></h4>
		</div>
		<div class="col-sm-9" style="color: red">
			<h4>{{ucwords(str_replace('_', ' ', $value->ownership_status))}}</h4>
		</div>
	</div>
@endforeach