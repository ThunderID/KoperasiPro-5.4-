<div class="row m-l-none m-r-none m-t-xs">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif

		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">{!! (count($datas) == 1) ? '3. Usaha' : '&nbsp;' !!}</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Usaha {{ $k + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Bidang Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['bidang_usaha'])) ? $v['bidang_usaha'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none text text-capitalize">
					<p class="text">Nama Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['nama_usaha'])) ? $v['nama_usaha'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tgl Berdiri</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['tanggal_berdiri'])) ? $v['tanggal_berdiri'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Status Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 120px">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['status']) && $v['status'] == 'bagi_hasil') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Bagi Hasil
							</p>
						</li>
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['status']) && $v['status'] == 'milik_keluarga') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Milik Keluarga
							</p>
						</li>
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['status']) && $v['status'] == 'milik_sendiri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Milik Sendiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['status']) && $v['status'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
							</p>
						</li>
					</ul>
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
					<p class="text">Status Tempat Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['status_tempat_usaha']) && $v['status_tempat_usaha'] == 'milik_sendiri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Milik Sendiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['status_tempat_usaha']) && $v['status_tempat_usaha'] == 'sewa') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Sewa
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['status_tempat_usaha']) && $v['status_tempat_usaha'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Luas Tempat Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ isset($v['luas_tempat_usaha']) ? $v['luas_tempat_usaha'] : '' }}</span> 
					<span style="float: right;">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Karyawan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ isset($v['jumlah_karyawan']) ? $v['jumlah_karyawan'] : '' }}</span> 
					<span style="float: right;">Orang</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nilai Aset</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: Rp <span class="money"> {{ (isset($v['nilai_aset'])) ? substr($v['nilai_aset'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Perputaran Stok</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ isset($v['perputaran_stok']) ? $v['perputaran_stok'] : '' }}</span> 
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Konsumen Perbulan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ isset($v['jumlah_konsumen_perbulan']) ? $v['jumlah_konsumen_perbulan'] : '' }}</span> 
					<span style="float: right;">Orang</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Pesaing Perkota</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ isset($v['jumlah_saingan_perkota']) ? $v['jumlah_saingan_perkota'] : '' }}</span> 
					<div class="dot-line"></div>
				</div>
			</div>
		</div>	

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Usaha {{ count($datas) + 1 }}</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Bidang Usaha</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Nama Usaha</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Tgl Berdiri</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Status Usaha</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 120px">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Bagi Hasil
								</p>
							</li>
							<li class="text-capitalize" style="width: 150px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Milik Keluarga
								</p>
							</li>
							<li class="text-capitalize" style="width: 150px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Milik Sendiri
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
								</p>
							</li>
						</ul>
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
						<p class="text">Status Tempat Usaha</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 150px">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Milik Sendiri
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Sewa
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Luas Tempat Usaha</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <span style="float: right">M<sup>2</sup></span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Jumlah Karyawan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <span style="float: right">Orang</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Nilai Aset</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Perputaran Stok</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Jumlah Konsumen Perbulan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <span style="float: right">Orang</span>
						<div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Jumlah Pesaing Perkota</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">3. Usaha</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Usaha 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Bidang Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nama Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tgl Berdiri</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Status Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 120px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Bagi Hasil
							</p>
						</li>
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Milik Keluarga
							</p>
						</li>
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Milik Sendiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
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
					<p class="text">Status Tempat Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Milik Sendiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Sewa
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Luas Tempat Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Karyawan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right">Orang</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nilai Aset</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Perputaran Stok</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Konsumen Perbulan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right">Orang</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Pesaing Perkota</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Usaha 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Bidang Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nama Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tgl Berdiri</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Status Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 120px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Bagi Hasil
							</p>
						</li>
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Milik Keluarga
							</p>
						</li>
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Milik Sendiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
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
					<p class="text">Status Tempat Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 150px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Milik Sendiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Sewa
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Luas Tempat Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right">M<sup>2</sup></span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Karyawan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right">Orang</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nilai Aset</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Perputaran Stok</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Konsumen Perbulan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span style="float: right">Orang</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Jumlah Pesaing Perkota</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>