<div class="row m-l-none m-r-none">
	@php
		$total_survei = 0;
		// dd($datas);
	@endphp
	@forelse ($datas as $k => $v)
		@forelse ($v['survei_jaminan_tanah_bangunan'] as $k2 => $v2)
			@if ($total_survei % 2 == 0)
				</div>
				<div class="row m-l-none m-r-none">
			@endif
		
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md text"><strong>jaminan tanah &amp; bangunan 1</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Tipe</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['tipe']) && $v2['tipe'] == 'tanah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tanah
								</p>
							</li>
							<li class=" text-capitalize" style="width: 200px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['tipe']) && $v2['tipe'] == 'bangunan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tanah &amp; bangunan
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Jenis Sertifikat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['jenis_sertifikat']) && $v2['jenis_sertifikat'] == 'shm') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHM
								</p>
							</li>
							<li class=" text-capitalize" style="width: 300px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['jenis_sertifikat']) && $v2['jenis_sertifikat'] == 'hgb') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHGB berlaku sampai th.
									<span class="dot-line">{!! (isset($v2['masa_berlaku_sertifikat'])) ? $v2['masa_berlaku_sertifikat'] : str_repeat('&nbsp;', 12) !!}</span>
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">No. Sertifikat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['nomor_sertifikat'])) ? $v2['nomor_sertifikat'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Atas Nama</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['atas_nama'])) ? $v2['atas_nama'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Alamat</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['alamat'])) ? $v2['alamat'][0]['alamat'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">RT/RW</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">
							{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['rt'])) ? $v2['alamat'][0]['rt'] : '' }}
							/ {{ (isset($v2['alamat']) && isset($v2['alamat'][0]['rw'])) ? $v2['alamat'][0]['rw'] : '' }}
						</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Desa/Dusun</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['desa'])) ? $v2['alamat'][0]['desa'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Kecamatan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['distrik'])) ? $v2['alamat'][0]['distrik'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Kota/Kabupaten</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['regensi'])) ? $v2['alamat'][0]['regensi'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Provinsi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ (isset($v2['alamat']) && isset($v2['alamat'][0]['provinsi'])) ? $v2['alamat'][0]['provinsi'] : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Luas Tanah</p>
					</div>
					<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ isset($v2['luas_tanah']) ? $v2['luas_tanah'] : '' }}</span> 
						<span style="float: right;">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
					<div class="col-sm-1">&nbsp;</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Luas Bangunan</p>
					</div>
					<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ isset($v2['luas_bangunan']) ? $v2['luas_bangunan'] : '' }}</span>
						<span style="float: right;">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Fungsi Bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['fungsi_bangunan']) && $v2['fungsi_bangunan'] == 'ruko') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Ruko
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['fungsi_bangunan']) && $v2['fungsi_bangunan'] == 'rumah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Rumah
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Bentuk bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['bentuk_bangunan']) && $v2['bentuk_bangunan'] == 'tingkat') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tingkat
								</p>
							</li>
							<li class=" text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['bentuk_bangunan']) && $v2['bentuk_bangunan'] == 'tidak_tingkat') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tidak Tingkat
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['bentuk_bangunan']) && $v2['bentuk_bangunan'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Konstruksi Bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['konstruksi_bangunan']) && $v2['konstruksi_bangunan'] == 'permanen') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Permanen
								</p>
							</li>
							<li class="text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['konstruksi_bangunan']) && $v2['konstruksi_bangunan'] == 'semi_permanen') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Semi Permanen
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-capitalize text">Lantai bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['lantai_bangunan']) && $v2['lantai_bangunan'] == 'keramik') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Keramik
								</p>
							</li>
							<li class=" text-capitalize" style="width: 100px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lantai_bangunan']) && $v2['lantai_bangunan'] == 'tanah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tanah
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lantai_bangunan']) && $v2['lantai_bangunan'] == 'tegel') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tegel
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lantai_bangunan']) && $v2['lantai_bangunan'] == 'ubin') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Ubin
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['lantai_bangunan']) && $v2['lantai_bangunan'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Dinding bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['dinding']) && $v2['dinding'] == 'bambu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Bambu
								</p>
							</li>
							<li class=" text-capitalize" style="width: 100px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['dinding']) && $v2['dinding'] == 'kayu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kayu
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['dinding']) && $v2['dinding'] == 'tembok') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tembok
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['dinding']) && $v2['dinding'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Listrik</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['listrik']) && $v2['listrik'] == '450_watt') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} 450 watt
								</p>
							</li>
							<li class=" text-capitalize" style="width: 100px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['listrik']) && $v2['listrik'] == '900_watt') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} 900 watt
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['listrik']) && $v2['listrik'] == '1300_watt') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} 1300 watt
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Air</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['air']) && $v2['air'] == 'pdam') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} PDAM
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['air']) && $v2['air'] == 'sumur') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Sumur
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Jalan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['jalan']) && $v2['jalan'] == 'aspal') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Aspal
								</p>
							</li>
							<li class=" text-capitalize" style="width: 100px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['jalan']) && $v2['jalan'] == 'batu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Batu
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['jalan']) && $v2['jalan'] == 'tanah') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tanah
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Lebar Jalan</p>
					</div>
					<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
						: <span class="string">{{ isset($v2['lebar_jalan']) ? $v2['lebar_jalan'] : '' }}</span>
						<span style="float: right">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Letak lokasi terhadap jalan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 250px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['letak_lokasi_terhadap_jalan']) && $v2['letak_lokasi_terhadap_jalan'] == 'lebih_rendah_dari_jalan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lebih rendah dari jalan
								</p>
							</li>
							<li class=" text-capitalize" style="width: 250px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['letak_lokasi_terhadap_jalan']) && $v2['letak_lokasi_terhadap_jalan'] == 'lebih_tinggi_dari_jalan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lebih tinggi dari jalan
								</p>
							</li>
							<li class=" text-capitalize" style="width: 250px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['letak_lokasi_terhadap_jalan']) && $v2['letak_lokasi_terhadap_jalan'] == 'sama_dengan_jalan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Sama dengan jalan
								</p>
							</li>
							<li class=" text-capitalize" style="width: 250px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['letak_lokasi_terhadap_jalan']) && $v2['letak_lokasi_terhadap_jalan'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">lingkungan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs text">
									: {!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'industri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o" style="font-size: 13px;"></i>' !!} Industri
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'kampung') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kampung
								</p>
							</li>
							<li class=" text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'pasar') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Pasar
								</p>
							</li>
							<li class=" text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'perkantoran') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Perkantoran
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'pertokoan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Pertokoan
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									{!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'perumahan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Perumahan
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;{!! (isset($v2['lingkungan']) && $v2['lingkungan'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Nilai Jaminan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <span class="money">{{ isset($v2['nilai_jaminan']) ? substr($v2['nilai_jaminan'], 3) : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Taksasi Tanah</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <span class="money"> {{ (isset($v2['taksasi_tanah'])) ? substr($v2['taksasi_tanah'], 3) : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Taksasi bangunan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <span class="money"> {{ (isset($v2['taksasi_bangunan'])) ? substr($v2['taksasi_bangunan'], 3) : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">Njop</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <span class="money"> {{ (isset($v2['njop'])) ? substr($v2['njop'], 3) : '' }}</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class=" text-capitalize text">PBB Terakhir</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <span class="money"> {{ (isset($v2['pbb_terakhir'])) ? substr($v2['pbb_terakhir'], 3) : '' }}</span>
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

	@if ($total_survei == 0)
		{{-- no data survei --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text"><strong>jaminan tanah &amp; bangunan 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
						<li class=" text-capitalize" style="width: 200px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah &amp; bangunan
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Jenis Sertifikat</p>
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
								{!! (isset($v2['jenis_sertifikat']) && $v2['jenis_sertifikat'] == 'hgb') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHGB berlaku sampai th.
								<span class="dot-line">{!! str_repeat('&nbsp;', 10) !!}</span>
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">No. Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Atas Nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
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
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Luas Tanah</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
				<div class="col-sm-1">&nbsp;</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Luas Bangunan</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Fungsi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Ruko
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Rumah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Bentuk bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Tingkat
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tidak Tingkat
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Konstruksi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Permanen
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> semi permanen
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Lantai bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Keramik
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tegel
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Ubin
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Dinding bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Bambu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kayu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tembok
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Listrik</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> 450 watt
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> 900 watt
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> 1300 watt
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Air</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> PDAM
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Sumur
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Aspal
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Batu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Lebar Jalan</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Letak lokasi terhadap jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Lebih rendah dari jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lebih tinggi dari jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Sama dengan jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">lingkungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Industri
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kampung
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pasar
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Perkantoran
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pertokoan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Perumahan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Nilai Jaminan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Taksasi Tanah</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Taksasi bangunan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Njop</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">PBB Terakhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text"><strong>jaminan tanah &amp; bangunan 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
						<li class=" text-capitalize" style="width: 200px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah &amp; bangunan
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Jenis Sertifikat</p>
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
								{!! (isset($v2['jenis_sertifikat']) && $v2['jenis_sertifikat'] == 'hgb') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHGB berlaku sampai th.
								<span class="dot-line">{!! str_repeat('&nbsp;', 10) !!}</span>
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">No. Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Atas Nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
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
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Luas Tanah</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
				<div class="col-sm-1">&nbsp;</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Luas Bangunan</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Fungsi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Ruko
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Rumah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Bentuk bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Tingkat
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tidak Tingkat
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Konstruksi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Permanen
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> semi permanen
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Lantai bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Keramik
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tegel
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Ubin
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Dinding bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Bambu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kayu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tembok
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Listrik</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> 450 watt
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> 900 watt
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> 1300 watt
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Air</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> PDAM
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Sumur
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Aspal
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Batu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Lebar Jalan</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Letak lokasi terhadap jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Lebih rendah dari jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lebih tinggi dari jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Sama dengan jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">lingkungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Industri
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kampung
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pasar
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Perkantoran
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pertokoan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Perumahan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Nilai Jaminan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Taksasi Tanah</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Taksasi bangunan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Njop</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">PBB Terakhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@elseif ($total_survei == 1)
		{{-- data survei hanya 1 --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text"><strong>jaminan tanah &amp; bangunan 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
						<li class=" text-capitalize" style="width: 200px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah &amp; bangunan
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Jenis Sertifikat</p>
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
								{!! (isset($v2['jenis_sertifikat']) && $v2['jenis_sertifikat'] == 'hgb') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} SHGB berlaku sampai th.
								<span class="dot-line">{!! str_repeat('&nbsp;', 10) !!}</span>
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">No. Sertifikat</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Atas Nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
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
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Luas Tanah</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
				<div class="col-sm-1">&nbsp;</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Luas Bangunan</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Fungsi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Ruko
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Rumah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Bentuk bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Tingkat
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tidak Tingkat
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Konstruksi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Permanen
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> semi permanen
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Lantai bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Keramik
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tegel
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Ubin
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Dinding bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Bambu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kayu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tembok
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Listrik</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> 450 watt
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> 900 watt
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> 1300 watt
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Air</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> PDAM
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Sumur
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Aspal
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Batu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tanah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Lebar Jalan</p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none text text-capitalize">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Letak lokasi terhadap jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Lebih rendah dari jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lebih tinggi dari jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Sama dengan jalan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 250px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">lingkungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Industri
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Kampung
							</p>
						</li>
						<li class=" text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pasar
							</p>
						</li>
						<li class=" text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Perkantoran
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pertokoan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Perumahan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Nilai Jaminan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Taksasi Tanah</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Taksasi bangunan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">Njop</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class=" text-capitalize text">PBB Terakhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endif
</div>