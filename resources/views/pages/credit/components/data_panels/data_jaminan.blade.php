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
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>{{ ucwords($value->type) }}</strong></p>
					<p>
						{{ strtoupper($value->legal) }}
					</p>
				</div>
			</div>

		</div>
		<div class="col-sm-6">

			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p class="p-b-sm"><strong>Status</strong></p>
					<p>
						{{ ucwords(str_replace('_', ' ', $value->ownership_status)) }}
					</p>
				</div>
			</div>

		</div>
	@endforeach
</div>