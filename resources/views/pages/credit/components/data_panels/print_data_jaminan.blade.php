<div class="row m-t-xl-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA JAMINAN</h4>
		<hr class="print"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		@foreach($page_datas->credit->credit->collaterals as $key => $value)
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>{{ ucwords($value->type) }}</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ strtoupper($value->legal) }}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Status</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ ucwords(str_replace('_', ' ', $value->ownership_status)) }}</strong></p>
			</div>
		</div>
		@endforeach
	</div>
</div>