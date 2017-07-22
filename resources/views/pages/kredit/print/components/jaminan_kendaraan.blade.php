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
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="daihatsu" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'daihatsu') ? 'checked' : 'disabled' }}> Daihatsu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="honda" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'honda') ? 'checked' : 'disabled' }}> Honda
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="isuzu" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'isuzu') ? 'checked' : 'disabled' }}> Isuzu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="kawasaki" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'kawasaki') ? 'checked' : 'disabled' }}> Kawasaki
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="kia" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'kia') ? 'checked' : 'disabled' }}> Kia
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="mitsubishi" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'mitsubishi') ? 'checked' : 'disabled' }}> Mitsubishi
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="nissan" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'nissan') ? 'checked' : 'disabled' }}> Nissan
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="suzuki" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'suzuki') ? 'checked' : 'disabled' }}> Suzuki
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="toyota" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'toyota') ? 'checked' : 'disabled' }}> Toyota
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="yamaha" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'yamaha') ? 'checked' : 'disabled' }}> Yamaha
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;" {{ (isset($v2['merk']) && $v2['merk'] == 'lain_lain') ? 'checked' : 'disabled' }}> Lainnya
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
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="biru" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'biru') ? 'checked' : 'disabled' }}> Biru
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="hijau" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'hijau') ? 'checked' : 'disabled' }}> Hijau
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="hitam" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'hitam') ? 'checked' : 'disabled' }}> Hitam
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="merah" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'merah') ? 'checked' : 'disabled' }}> Merah
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="merah_muda" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'merah_muda') ? 'checked' : 'disabled' }}> Merah Muda
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="orange" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'orange') ? 'checked' : 'disabled' }}> Orange
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;" {{ (isset($v2['warna']) && $v2['warna'] == 'lain_lain') ? 'checked' : 'disabled' }}> Lainnya
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="biru" style="height: 11px;"> Biru
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="hijau" style="height: 11px;"> Hijau
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="hitam" style="height: 11px;"> Hitam
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="merah" style="height: 11px;"> Merah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="merah_muda" style="height: 11px;"> Merah Muda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="orange" style="height: 11px;"> Orange
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lainnya
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="daihatsu" style="height: 11px;"> Daihatsu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="honda" style="height: 11px;"> Honda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="isuzu" style="height: 11px;"> Isuzu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="kawasaki" style="height: 11px;"> Kawasaki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="kia" style="height: 11px;"> Kia
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="mitsubishi" style="height: 11px;"> Mitsubishi
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="nissan" style="height: 11px;"> Nissan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="suzuki" style="height: 11px;"> Suzuki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="toyota" style="height: 11px;"> Toyota
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="yamaha" style="height: 11px;"> Yamaha
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lainnya
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="biru" style="height: 11px;"> Biru
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="hijau" style="height: 11px;"> Hijau
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="hitam" style="height: 11px;"> Hitam
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="merah" style="height: 11px;"> Merah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="merah_muda" style="height: 11px;"> Merah Muda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="orange" style="height: 11px;"> Orange
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lainnya
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="daihatsu" style="height: 11px;"> Daihatsu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="honda" style="height: 11px;"> Honda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="isuzu" style="height: 11px;"> Isuzu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="kawasaki" style="height: 11px;"> Kawasaki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="kia" style="height: 11px;"> Kia
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="mitsubishi" style="height: 11px;"> Mitsubishi
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="nissan" style="height: 11px;"> Nissan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="suzuki" style="height: 11px;"> Suzuki
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="toyota" style="height: 11px;"> Toyota
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="yamaha" style="height: 11px;"> Yamaha
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lainnya
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="biru" style="height: 11px;"> Biru
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="hijau" style="height: 11px;"> Hijau
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="hitam" style="height: 11px;"> Hitam
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="merah" style="height: 11px;"> Merah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="merah_muda" style="height: 11px;"> Merah Muda
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="orange" style="height: 11px;"> Orange
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lainnya
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