<div class="row">
	<div class="col-sm-12">
		<h4>DATA JAMINAN</h4>
		<hr/>
	</div>
</div>

<div class="row">
	@foreach($page_datas->credit->credit->collaterals as $key => $value)
		<div class="col-sm-6">

			<div class="row m-b-xl">
				<div class="col-sm-4">
					<p>{{ucwords($value->type)}}</p>
				</div>
				<div class="col-sm-8">
					<p><strong>{{strtoupper($value->legal)}}</strong></p>
				</div>
			</div>

		</div>
		<div class="col-sm-6">

			<div class="row m-b-xl">
				<div class="col-sm-4">
					<p>Status</p>
				</div>
				<div class="col-sm-8">
					<p><strong>{{ucwords(str_replace('_', ' ', $value->ownership_status))}}</strong></p>
				</div>
			</div>

		</div>
	@endforeach
</div>