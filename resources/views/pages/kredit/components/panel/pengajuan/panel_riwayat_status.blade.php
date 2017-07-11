<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-riwayat-kredit">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">riwayat status kredit</p>
				</div>
			</div>

			@forelse($page_datas->credit['riwayat_status'] as $key => $value)
				<p class="text-capitalize text-sm text-muted"><em>{{ucwords(str_replace('_', ' ', $value['status']))}} tanggal {{$value['tanggal']}}</em></p>
				@forelse((array)$value['uraian'] as $k => $v)
					<p class="m-t-sm m-b-xs text-capitalize text-sm">
						<strong>Catatan {{$k}}</strong>
					</p>
					@if(is_array($v))
						@foreach($v as $k2 => $v2)
							<p class="text-light m-b-md">
								{{$v2}}
							</p>
						@endforeach
					@else
						<p class="text-light m-b-md">
							{{$v}}
						</p>
					@endif
				@empty
					<p class="m-t-sm m-b-xs text-capitalize text-sm">
						Tidak ada catatan
					</p>
				@endforelse

				@if(count($page_datas->credit['riwayat_status']) > 1)
					<hr class="m-b-md">
				@endif
			@empty
			@endforelse	
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>