@php
// dd($datas);
@endphp
<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">{!! (count($datas) == 1) ? '1. Tanah &amp; Bangunan' : '&nbsp;' !!}</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Tanah &amp; Bangunan {{ $k + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['tipe']) && $v['tipe'] == 'ruko') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Ruko
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['tipe']) && $v['tipe'] == 'rumah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Rumah
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['tipe']) && $v['tipe'] == 'tanah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tombak
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['tipe']) && $v['tipe'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['nomor_sertifikat'])) ? $v['nomor_sertifikat'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Luas</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['luas'])) ? $v['luas'] : '' }}</span>
					<span style="float: right;">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['provinsi'])) ? $v['alamat'][0]['provinsi'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">
						{{ (isset($v['alamat']) && isset($v['alamat'][0]['rt'])) ? $v['alamat'][0]['rt'] . '/' : '' }}
						{{ (isset($v['alamat']) && isset($v['alamat'][0]['rw'])) ? $v['alamat'][0]['rw'] : '' }}
					</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['desa'])) ? $v['alamat'][0]['desa'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['desa'])) ? $v['alamat'][0]['desa'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['regensi'])) ? $v['alamat'][0]['regensi'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['provinsi'])) ? $v['alamat'][0]['provinsi'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Tanah &amp; Bangunan {{ count($datas) + 1 }}</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Tipe</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Ruko
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Rumah
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Tombak
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Nomor Sertifikat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Luas</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <span style="float: right;">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Alamat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">RT/RW</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Desa/Dusun</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Kecamatan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Kota/Kabupaten</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Provinsi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Tanah &amp; Bangunan 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Ruko
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Rumah
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tombak
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Luas</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right;">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Tanah &amp; Bangunan 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Ruko
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Rumah
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tombak
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Luas</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right;">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>