<div class="row m-l-none m-r-none">
	@forelse($datas as $k => $v)
		<div class="col-sm-12 m-b-md">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan tanah &amp; bangunan {{ $k + 1 }}</strong></p>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jenis Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['jenis_sertifikat']) && $v['jenis_sertifikat'] == 'shm') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHM
							</p>
						</li>
						<li class=" text-capitalize" style="width: 300px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['jenis_sertifikat']) && ($v['jenis_sertifikat'] == 'hgb' || $v['jenis_sertifikat'] == 'shgb')) ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHGB berlaku sampai th.
								<span class="dot-line">{!! (isset($v['masa_berlaku_sertifikat'])) ? $v['masa_berlaku_sertifikat'] : str_repeat('&nbsp;', 12) !!}</span>
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['nomor_sertifikat'])) ? $v['nomor_sertifikat'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Atas Nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['atas_nama'])) ? $v['atas_nama'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Luas Tanah</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['luas_tanah'])) ? $v['luas_tanah'] : '' }}</span>
					<span style="float: right;">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Luas Bangunan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['luas_bangunan'])) ? $v['luas_bangunan'] : '' }}</span>
					<span style="float: right;">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['alamat'])) ? $v['alamat'][0]['alamat'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">
						{{ (isset($v['alamat']) && isset($v['alamat'][0]['rt'])) ? $v['alamat'][0]['rt'] . ' / ' : '' }}
						{{ (isset($v['alamat']) && isset($v['alamat'][0]['rw'])) ? $v['alamat'][0]['rw'] : '' }}
					</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['desa'])) ? $v['alamat'][0]['desa'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['distrik'])) ? $v['alamat'][0]['distrik'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['regensi'])) ? $v['alamat'][0]['regensi'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['alamat']) && isset($v['alamat'][0]['provinsi'])) ? $v['alamat'][0]['provinsi'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>
	@empty
		@foreach(range(1,3) as $k)
			<div class="col-sm-12 m-b-md">
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan tanah &amp; bangunan {{ $k }}</strong></p>
				<div class="row row-info m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Jenis Sertifikat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> SHM
								</p>
							</li>
							<li class=" text-capitalize" style="width: 300px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> SHGB berlaku sampai th.
									<span class="dot-line">{!! str_repeat('&nbsp;', 10) !!}</span>
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">No Sertifikat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Luas Tanah</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <span style="float: right">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Luas Bangunan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <span style="float: right">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Atas Nama</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Alamat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">RT/RW</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Desa/Dusun</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Kecamatan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Kota/Kabupaten</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Provinsi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endforeach
	@endforelse
</div>