@if (isset($page_datas->credit['aset_kendaraan']) && !empty($page_datas->credit['aset_kendaraan']))
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			@foreach ($page_datas->credit['aset_kendaraan'] as $key => $value)
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-capitalize text-muted">
						<p class="m-b-xs text-capitalize">
							<u>aset kendaraan {{ $key+1 }}</u>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-capitalize text-light">
							{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
						</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<p class="m-b-xs text-capitalize text-light">
							{{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? str_replace('_', ' ', $value['nomor_bpkb']) : '-' }}
						</p>
						<p class="text-capitalize text-muted text-sm m-t-min-xs" style="font-size: 10px;"><em>( No. BPKB )</em></p>
					</div>
				</div>
				<div class="clearfix">&nbsp;</div>
			@endforeach
		</div>
	</div>
@else
@endif