<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		<div class="col-sm-12 col-md-12">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>keluarga {{ $k + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['pivot']['hubungan']) && $v['pivot']['hubungan'] == 'orang_tua') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Orang Tua
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['pivot']['hubungan']) && $v['pivot']['hubungan'] == 'pasangan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Pasangan
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['pivot']['hubungan']) && $v['pivot']['hubungan'] == 'saudara') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Saudara
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['nama'])) ? $v['nama'] : '' }}</span>
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
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">No. Telp/HP</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ isset($v['telepon']) ? $v['telepon'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>
	@empty
		<div class="col-sm-12 col-md-12">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>keluarga 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Orang Tua
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pasangan
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Saudara
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nama</p>
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
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-capitalize text">No. Telp/HP</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>