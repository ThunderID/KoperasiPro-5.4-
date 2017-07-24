<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md">{!! (count($datas) == 1) ? '1. Tanah &amp; Bangunan' : '&nbsp;' !!}</p>
			<p class="text-capitalize m-l-min-md text-sm"><strong>Tanah &amp; Bangunan {{ $k + 1 }}</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: {!! (isset($v['tipe']) && $v['tipe'] == 'ruko') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Ruko
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['tipe']) && $v['tipe'] == 'rumah') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Rumah
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['tipe']) && $v['tipe'] == 'tambak') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Tambak
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['tipe']) && $v['tipe'] == 'lainnya') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Lain-lain
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor Sertifikat</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['nomor_sertifikat']) ? $v['nomor_sertifikat'] : str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Luas</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['luas']) ? $v['luas'] : str_repeat('.', 40) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ (isset($v['alamat']) && isset($v['alamat'][0]['alamat'])) ? $v['alamat'][0]['alamat'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">RT/RW</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ (isset($v['alamat']) && isset($v['alamat'][0]['rt'])) ? $v['alamat'][0]['rt'] : str_repeat('.', 22) }}/{{ (isset($v['alamat']) && isset($v['alamat'][0]['rw'])) ? $v['alamat'][0]['rw'] : str_repeat('.', 22) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Provinsi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ (isset($v['alamat']) && isset($v['alamat'][0]['provinsi'])) ? $v['alamat'][0]['provinsi'] : str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ (isset($v['alamat']) && isset($v['alamat'][0]['regensi'])) ? $v['alamat'][0]['regensi'] : str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Kecamatan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ (isset($v['alamat']) && isset($v['alamat'][0]['distrik'])) ? $v['alamat'][0]['distrik'] : str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Desa/Dusun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ (isset($v['alamat']) && isset($v['alamat'][0]['desa'])) ? $v['alamat'][0]['desa'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-uppercase m-l-min-lg">&nbsp;</p>
				<p class="text-capitalize m-l-min-md text-sm"><strong>Tanah &amp; Bangunan {{ count($datas) + 1 }}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Tipe</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
								</p>
							</li>
							<li class="text-sm">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
								</p>
							</li>
							<li class="text-sm">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Tambak
								</p>
							</li>
							<li class="text-sm">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Lain-lain
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Nomor Sertifikat</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Luas</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Alamat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">RT/RW</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Provinsi</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Kota/Kabupaten</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Kecamatan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Desa/Dusun</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-lg">&nbsp;</p>
			<p class="text-capitalize m-l-min-md text-sm"><strong>Tanah &amp; Bangunan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tambak
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lain-lain
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor Sertifikat</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Luas</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">RT/RW</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Provinsi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Kecamatan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Desa/Dusun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-lg">&nbsp;</p>
			<p class="text-capitalize m-l-min-md text-sm"><strong>Tanah &amp; Bangunan 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tambak
							</p>
						</li>
						<li class="text-sm">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lain-lain
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor Sertifikat</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Luas</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">RT/RW</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Provinsi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Kecamatan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Desa/Dusun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
		</div>
	@endforelse
</div>