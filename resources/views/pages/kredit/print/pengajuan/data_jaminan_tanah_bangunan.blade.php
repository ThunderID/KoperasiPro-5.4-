@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
	@foreach ($page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-none">
					<u>jaminan tanah &amp; bangunan {{ $key+1 }}</u>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-sm m-b-xs text-capitalize text-sm text-muted"><strong>info jaminan</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light">
							Tipe
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light">
							{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
							<span> ( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-' }} )</span>
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light">
							no. sertifikat
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light">
							{{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? $value['nomor_sertifikat'] : '-' }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light">
							masa berlaku sampai
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light">
							{{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? $value['masa_berlaku_sertifikat'] : '-' }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light">
							atas nama
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light">
							{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-sm m-b-xs text-capitalize text-sm text-muted"><strong>info {{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							luas
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
							{{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup> 
							<span class="text-capitalize text-muted m-t-min-xs" style="font-size: 10px;"><em>( bangunan / tanah )</em></span>
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							alamat
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['alamat']['alamat']) && !is_null($value['alamat']['alamat'])) ? $value['alamat']['alamat'] : '' }}
							RT {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }} / RW {{ isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-' }}
							{{ (isset($value['alamat']['desa']) && !is_null($value['alamat']['desa'])) ? $value['alamat']['desa'] : '' }} 
							{!! (isset($value['alamat']['distrik']) && !is_null($value['alamat']['distrik'])) ? $value['alamat']['distrik'] .' <br/>' : '' !!}
							{{ (isset($value['alamat']['regensi']) && !is_null($value['alamat']['regensi'])) ? $value['alamat']['regensi'] : '' }} - 
							{{ (isset($value['alamat']['provinsi']) && !is_null($value['alamat']['provinsi'])) ? $value['alamat']['provinsi'] : '' }} - 
							{{ (isset($value['alamat']['negara']) && !is_null($value['alamat']['negara'])) ? $value['alamat']['negara'] : '' }}
						</p>
					</div>
				</div>

			</div>
		</div>
	@endforeach
@else
@endif