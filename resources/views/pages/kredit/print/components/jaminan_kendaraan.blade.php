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
				<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan kendaraan {{ $total_survei + 1 }}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jenis Kendaraan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: {!! (isset($v2['tipe']) && $v2['tipe'] == 'roda_2') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Roda 2
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['tipe']) && $v2['tipe'] == 'roda_4') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Roda 4
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['tipe']) && $v2['tipe'] == 'roda_6') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Roda 6
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Merk</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: {!! (isset($v2['merk']) && $v2['merk'] == 'daihatsu') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Daihatsu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'honda') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Honda
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'isuzu') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Isuzu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'kawasaki') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Kawasaki
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									&nbsp;&nbsp;{!! (isset($v2['merk']) && $v2['merk'] == 'kia') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Kia
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'mitsubishi') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Mitsubishi
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'nissan') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Nissan
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'suzuki') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Suzuki
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									&nbsp;&nbsp;{!! (isset($v2['merk']) && $v2['merk'] == 'toyota') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Toyota
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'yamaha') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Yamaha
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['merk']) && $v2['merk'] == 'lainnya') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Warna</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: {!! (isset($v2['warna']) && $v2['warna'] == 'biru') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Biru
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['warna']) && $v2['warna'] == 'hijau') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Hijau
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['warna']) && $v2['warna'] == 'hitam') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Hitam
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['warna']) && $v2['warna'] == 'merah') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Merah
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									&nbsp;&nbsp;{!! (isset($v2['warna']) && $v2['warna'] == 'merah_muda') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Merah Muda
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['warna']) && $v2['warna'] == 'orange') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Biru
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['warna']) && $v2['warna'] == 'lain_lain') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Biru
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tahun</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['tahun']) ? $v2['tahun'] : str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Atas nama</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['atas_nama']) ? $v2['atas_nama'] : str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Alamat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['alamat'])) ? $v2['alamat'][0]['alamat'] : str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">RT/RW</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['rt'])) ? $v2['alamat'][0]['rt'] : str_repeat('.', 22) }}/{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['rw'])) ? $v2['alamat'][0]['rw'] : str_repeat('.', 22) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Provinsi</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['provinsi'])) ? $v2['alamat'][0]['provinsi'] : str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Kota/Kabupaten</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['regensi'])) ? $v2['alamat'][0]['regensi'] : str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Kecamatan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['distrik'])) ? $v2['alamat'][0]['distrik'] : str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Desa/Dusun</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['desa'])) ? $v2['alamat'][0]['desa'] : str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. BPKB</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['nomor_bpkb']) ? $v2['nomor_bpkb'] : str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. Mesin</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['nomor_mesin']) ? $v2['nomor_mesin'] : str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. Rangka</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['nomor_rangka']) ? $v2['nomor_rangka'] : str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. Polisi</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['nomor_polisi']) ? $v2['nomor_polisi'] : str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Masa Berlaku</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['masa_berlaku_stnk']) ? $v2['masa_berlaku_stnk'] : str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Harga Taksasi</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: 
							@if (isset($v2['harga_taksasi']))
								Rp <span style="float: right; padding-right: 20px;"> {{ substr($v2['harga_taksasi'], 3) }}</span>
							@else
								RP {{ str_repeat('.', 40) }}
							@endif
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">status kepemilikan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['status_kepemilikan']) ? $v2['status_kepemilikan'] : str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">fungsi sehari-hari</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ isset($v2['fungsi_sehari_hari']) ? $v2['fungsi_sehari_hari'] : str_repeat('.', 43) }}</p>
					</div>
				</div>
			</div>
			
			@php
				$total_survei++;
			@endphp
		@empty
		@endforelse
	@empty
		<div class="col-sm-12">
			<p class="text-capitalize m-l-min-md">tidak ada data jaminan kendaraan</p>
		</div>
	@endforelse
	
	@if ($total_survei == 1)
		{{-- data survei hanya 1 --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan kendaraan {{ $total_survei + 1 }}</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 2
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 4
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Merk</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Daihatsu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Honda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Isuzu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kawasaki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Kia
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Mitsubishi
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Nissan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Suzuki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Toyota
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Yamaha
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Warna</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Biru
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Hijau
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Hitam
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Merah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Merah Muda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Orange
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">RT/RW</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Provinsi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Kecamatan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Desa/Dusun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Mesin</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Rangka</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Polisi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Masa Berlaku</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Harga Taksasi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: 
						Rp {{ str_repeat('.', 40) }}
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">status kepemilikan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">fungsi sehari-hari</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
		</div>
	@elseif ($total_survei == 0)
		{{-- no data survei --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan kendaraan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 2
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 4
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Merk</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Daihatsu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Honda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Isuzu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kawasaki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Kia
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Mitsubishi
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Nissan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Suzuki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Toyota
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Yamaha
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Warna</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Biru
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Hijau
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Hitam
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Merah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Merah Muda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Orange
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">RT/RW</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Provinsi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Kecamatan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Desa/Dusun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Mesin</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Rangka</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Polisi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Masa Berlaku</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Harga Taksasi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: 
						Rp {{ str_repeat('.', 40) }}
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">status kepemilikan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">fungsi sehari-hari</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan kendaraan 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 2
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 4
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Merk</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Daihatsu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Honda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Isuzu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kawasaki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Kia
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Mitsubishi
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Nissan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Suzuki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Toyota
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Yamaha
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Warna</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Biru
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Hijau
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Hitam
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Merah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Merah Muda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Orange
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">RT/RW</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Provinsi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Kota/Kabupaten</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Kecamatan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Desa/Dusun</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Mesin</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Rangka</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Polisi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Masa Berlaku</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Harga Taksasi</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: 
						Rp {{ str_repeat('.', 40) }}
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">status kepemilikan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">fungsi sehari-hari</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
		</div>
	@endif
</div>