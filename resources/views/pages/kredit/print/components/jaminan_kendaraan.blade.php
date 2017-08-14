<div class="row m-l-none m-r-none">
	@php
		$total_survei = 0;
	@endphp
	@forelse ($datas as $k => $v)
		@forelse ($v['survei_jaminan_kendaraan'] as $k2 => $v2)
			@if ($total_survei % 2 == 0)
				</div>
				<div class="row m-l-none m-r-none">
			@endif

			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan kendaraan {{ $total_survei + 1 }}</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Jenis Kendaraan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['tipe']) && $v2['tipe'] == 'roda_2') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 2
								</p>
							</li>
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['tipe']) && $v2['tipe'] == 'roda_4') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 4
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['tipe']) && $v2['tipe'] == 'roda_6') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 6
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Merk</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['merk']) && $v2['merk'] == 'daihatsu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Daihatsu
								</p>
							</li>
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'honda') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Honda
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'isuzu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Isuzu
								</p>
							</li>
							<li class="text text-capitalize" style="width: 100px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'kawasaki') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kawasaki
								</p>
							</li>
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['merk']) && $v2['merk'] == 'kia') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kia
								</p>
							</li>
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'mitsubishi') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Mitsubishi
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'nissan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Nissan
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'suzuki') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Suzuki
								</p>
							</li>
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['merk']) && $v2['merk'] == 'toyota') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Toyota
								</p>
							</li>
							<li class="text text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'yamaha') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Yamaha
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['merk']) && $v2['merk'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Warna</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['warna']) && $v2['warna'] == 'biru') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Biru
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['warna']) && $v2['warna'] == 'hijau') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Hijau
								</p>
							</li>
							<li class="text text-capitalize" style="width: 80px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['warna']) && $v2['warna'] == 'hitam') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Hitam
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['warna']) && $v2['warna'] == 'merah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Merah
								</p>
							</li>
							<li class="text text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['warna']) && $v2['warna'] == 'merah_muda') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Merah Muda
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['warna']) && $v2['warna'] == 'orange') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Orange
								</p>
							</li>
							<li class="text text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['warna']) && $v2['warna'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Tahun</p>
					</div>
					<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['tahun'])) ? $v2['tahun'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Atas nama</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['atas_nama'])) ? $v2['atas_nama'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Alamat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['alamat'])) ? $v2['alamat'][0]['alamat'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">RT/RW</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">
							{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['rt'])) ? $v2['alamat'][0]['rt'] . ' / ' : '' }}
							{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['rw'])) ? $v2['alamat'][0]['rw'] : '' }}
						</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Desa/Dusun</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['desa'])) ? $v2['alamat'][0]['desa'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Kecamatan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['distrik'])) ? $v2['alamat'][0]['distrik'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Kota/Kabupaten</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['regensi'])) ? $v2['alamat'][0]['regensi'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Provinsi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['provinsi'])) ? $v2['alamat'][0]['provinsi'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">No. BPKB</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ isset($v2['nomor_bpkb']) ? $v2['nomor_bpkb'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">No. Mesin</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['nomor_mesin'])) ? $v2['nomor_mesin'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">No. Rangka</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['nomor_rangka'])) ? $v2['nomor_rangka'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">No. Polisi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['nomor_polisi'])) ? $v2['nomor_polisi'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Masa Berlaku</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['masa_berlaku_stnk'])) ? $v2['masa_berlaku_stnk'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Harga Taksasi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <span class="money"> {{ (isset($v2['harga_taksasi'])) ? substr($v2['harga_taksasi'], 3) : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">status kepemilikan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['status_kepemilikan'])) ? $v2['status_kepemilikan'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">fungsi sehari-hari</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['fungsi_sehari_hari'])) ? $v2['fungsi_sehari_hari'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
			</div>
			
			@php
				$total_survei++;
			@endphp
		@empty
		@endforelse
	@empty
	@endforelse
	
	@if ($total_survei == 1)
		{{-- data survei hanya 1 --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan kendaraan {{ $total_survei + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 4
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Merk</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Daihatsu
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Honda
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Isuzu
							</p>
						</li>
						<li class="text text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kawasaki
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Kia
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Mitsubishi
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Nissan
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Suzuki
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Toyota
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Yamaha
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Warna</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Biru
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Hijau
							</p>
						</li>
						<li class="text text-capitalize" style="width: 80px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Hitam
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Merah
							</p>
						</li>
						<li class="text text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Merah Muda
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Orange
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Mesin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Rangka</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Polisi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Masa Berlaku</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Harga Taksasi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">status kepemilikan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">fungsi sehari-hari</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@elseif ($total_survei == 0)
		{{-- no data survei --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan kendaraan 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 4
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Merk</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Daihatsu
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Honda
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Isuzu
							</p>
						</li>
						<li class="text text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kawasaki
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Kia
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Mitsubishi
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Nissan
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Suzuki
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Toyota
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Yamaha
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Warna</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Biru
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Hijau
							</p>
						</li>
						<li class="text text-capitalize" style="width: 80px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Hitam
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Merah
							</p>
						</li>
						<li class="text text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Merah Muda
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Orange
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Mesin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Rangka</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Polisi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Masa Berlaku</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Harga Taksasi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">status kepemilikan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">fungsi sehari-hari</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan kendaraan 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 4
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Merk</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Daihatsu
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Honda
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Isuzu
							</p>
						</li>
						<li class="text text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kawasaki
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Kia
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Mitsubishi
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Nissan
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Suzuki
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Toyota
							</p>
						</li>
						<li class="text text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Yamaha
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Warna</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Biru
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Hijau
							</p>
						</li>
						<li class="text text-capitalize" style="width: 80px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Hitam
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Merah
							</p>
						</li>
						<li class="text text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Merah Muda
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Orange
							</p>
						</li>
						<li class="text text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">RT/RW</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Desa/Dusun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Kecamatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Provinsi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Mesin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Rangka</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. Polisi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Masa Berlaku</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Harga Taksasi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">status kepemilikan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">fungsi sehari-hari</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endif
</div>