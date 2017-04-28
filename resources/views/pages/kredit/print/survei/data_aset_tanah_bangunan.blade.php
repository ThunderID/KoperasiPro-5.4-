@if (isset($page_datas->credit['aset_tanah_bangunan']) && !empty($page_datas->credit['aset_tanah_bangunan']))
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			@foreach ($page_datas->credit['aset_tanah_bangunan'] as $key => $value)
				<div class="row">
					<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
						<p class="m-b-xs text-capitalize">
							<u>aset tanah &amp; bangunan {{ $key+1 }}</u>
						</p>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }} - 
							{{ (isset($value['luas']) && !is_null($value['luas'])) ? str_replace('_', ' ', $value['luas']) : '0' }} M<sup>2</sup>
						</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['alamat']['alamat']) && !is_null($value['alamat']['alamat'])) ? $value['alamat']['alamat'] : '' }}
							RT {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }} / RW {{ isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-' }} <br/>
							{{ (isset($value['alamat']['desa']) && !is_null($value['alamat']['desa'])) ? $value['alamat']['desa'] : '' }} 
							{{ (isset($value['alamat']['distrik']) && !is_null($value['alamat']['distrik'])) ? $value['alamat']['distrik'] .'<br/>' : '' }}
							{{ (isset($value['alamat']['regensi']) && !is_null($value['alamat']['regensi'])) ? $value['alamat']['regensi'] : '' }} - 
							{{ (isset($value['alamat']['provinsi']) && !is_null($value['alamat']['provinsi'])) ? $value['alamat']['provinsi'] : '' }} - 
							{{ (isset($value['alamat']['negara']) && !is_null($value['alamat']['negara'])) ? $value['alamat']['negara'] : '' }}
						</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@else
@endif