@if (isset($page_datas->credit['rekening']) && !empty($page_datas->credit['rekening']))
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>rekening</strong></p>
		</div>
	</div>
	@foreach ($page_datas->credit['rekening'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-sm text-capitalize">
					<u>rekening {{ $key+1 }}</u>
				</p>
			</div>
		</div>
		<div class="row m-b-xs">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="text-uppercase text-light">{{ (isset($value['nama_bank']) && !is_null($value['nama_bank'])) ? str_replace('_', ' ', $value['nama_bank']) : '-' }}</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<p class="text-capitalize text-light">{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }} </p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="m-b-xs text-capitalize text-light">{{ (isset($value['saldo_awal']) && !is_null($value['saldo_awal'])) ? $value['saldo_awal'] : '-' }} </p>
				<p class="text-capitalize text-muted text-sm m-t-min-xs" style="font-size: 10px;"><em>( saldo awal )</em></p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="m-b-xs text-capitalize text-light">{{ (isset($value['saldo_akhir']) && !is_null($value['saldo_akhir'])) ? $value['saldo_akhir'] : '-' }} </p>
				<p class="text-capitalize text-muted text-sm m-t-min-xs" style="font-size: 10px;"><em>( saldo akhir )</em></p>
			</div>
		</div>
	@endforeach
@else
@endif