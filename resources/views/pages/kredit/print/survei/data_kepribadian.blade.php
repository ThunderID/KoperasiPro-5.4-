@if (isset($page_datas->credit['survei_kepribadian']) && !empty($page_datas->credit['survei_kepribadian']))
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>kepribadian</strong></p>
		</div>
	</div>
	@foreach ($page_datas->credit['survei_kepribadian'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					<u>referens {{ $key+1 }}</u>
				</p>
			</div>
		</div>
		<div class="row m-b-xs">
			<div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">{{ (isset($value['nama_referens']) && !is_null($value['nama_referens'])) ? $value['nama_referens'] : '-' }} - {{ (isset($value['hubungan']) && !is_null($value['hubungan'])) ? str_replace('_', ' ', $value['hubungan']) : '-'  }}</p>
				<p class="text-capitalize text-light m-b-xs">{{ (isset($value['telepon_referens']) && !is_null($value['telepon_referens'])) ? $value['telepon_referens'] : '-' }}</p>
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? $value['uraian'] : '-' }}</p>
				<p class="text-capitalize text-muted text-sm m-b-xs m-t-min-xs" style="font-size: 10px;"><em>( uraian )</em></p>
			</div>
		</div>
	@endforeach
@else
@endif