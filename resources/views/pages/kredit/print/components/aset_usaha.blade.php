<div class="row m-l-none m-r-none m-t-xs">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif

		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md">{!! (count($datas) == 1) ? '3. Usaha' : '&nbsp;' !!}</p>
			<p class="text-capitalize m-l-min-md text-xs"><strong>Usaha {{ $k + 1 }}</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Bidang Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['bidang_usaha']) ? $v['bidang_usaha'] : str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nama Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['nama_usaha']) ? $v['nama_usaha'] : str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tgl Berdiri</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['tanggal_berdiri']) ? $v['tanggal_berdiri'] : str_repeat('.', 167) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Status Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="bagi_hasil" style="height: 11px;" {{ (isset($v['status']) && $v['status'] == 'bagi_hasil') ? 'checked' : 'disabled' }}> Bagi Hasil
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="milik_keluarga" style="height: 11px;" {{ (isset($v['status']) && $v['status'] == 'milik_keluarga') ? 'checked' : 'disabled' }}> Milik Keluarga
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;" {{ (isset($v['status']) && $v['status'] == 'milik_sendiri') ? 'checked' : 'disabled' }}> Milik Sendiri
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lain_lain" style="height: 11px;" {{ (isset($v['status']) && $v['status'] == 'lain_lain') ? 'checked' : 'disabled' }}> Lain-lain
							</p>
						</li>
					</ul>
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
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Status Tempat Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;" {{ (isset($v['status_tempat_usaha']) && $v['status_tempat_usaha'] == 'milik_sendiri') ? 'checked' : 'disabled' }}> Milik Sendiri
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="sewa" style="height: 11px;" {{ (isset($v['status_tempat_usaha']) && $v['status_tempat_usaha'] == 'sewa') ? 'checked' : 'disabled' }}> Sewa
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lain_lain" style="height: 11px;" {{ (isset($v['status_tempat_usaha']) && $v['status_tempat_usaha'] == 'lain_lain') ? 'checked' : 'disabled' }}> Lain-lain
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Luas Tempat Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['luas_tempat_usaha']) ? $v['luas_tempat_usaha'] : str_repeat('.', 41) }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Karyawan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['jumlah_karyawan']) ? $v['jumlah_karyawan'] : str_repeat('.', 32) }} Orang</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nilai Aset</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['nilai_aset']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['nilai_aset'], 3) }}</span>
						@else
							RP {{ str_repeat('.', 40) }}
						@endif
					</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Perputaran Stok</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['perputaran_stok']) ? $v['perputaran_stok'] : str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Konsumen Perbulan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['jumlah_konsumen_perbulan']) ? $v['jumlah_konsumen_perbulan'] : str_repeat('.', 34) }} Orang</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Pesaing Perkota</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['jumlah_saingan_perkota']) ? $v['jumlah_saingan_perkota'] : str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Uraian</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['uraian']) ? $v['uraian'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
		</div>	

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-uppercase m-l-min-md">&nbsp;</p>
				<p class="text-capitalize m-l-min-md text-xs"><strong>Usaha {{ count($datas) + 1 }}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Bidang Usaha</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Nama Usaha</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Tgl Berdiri</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Status Usaha</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="bagi_hasil" style="height: 11px;"> Bagi Hasil
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="milik_keluarga" style="height: 11px;"> Milik Keluarga
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;"> Milik Sendiri
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lain-lain
								</p>
							</li>
						</ul>
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
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Status Tempat Usaha</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;"> Milik Sendiri
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="sewa" style="height: 11px;"> Sewa
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="lain_lain" style="height: 11px;"> Lain-lain
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Luas Tempat Usaha</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 41) }} M<sup>2</sup></p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Jumlah Karyawan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 32) }} Orang</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Nilai Aset</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: RP {{ str_repeat('.', 40) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Perputaran Stok</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Jumlah Konsumen Perbulan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 34) }} Orang</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Jumlah Pesaing Perkota</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Uraian</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md">3. Usaha</p>
			<p class="text-capitalize m-l-min-md text-xs"><strong>Usaha 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Bidang Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nama Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tgl Berdiri</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Status Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="bagi_hasil" style="height: 11px;"> Bagi Hasil
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="milik_keluarga" style="height: 11px;"> Milik Keluarga
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;"> Milik Sendiri
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lain-lain
							</p>
						</li>
					</ul>
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
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Status Tempat Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;"> Milik Sendiri
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="sewa" style="height: 11px;"> Sewa
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lain_lain" style="height: 11px;"> Lain-lain
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Luas Tempat Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 41) }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Karyawan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 32) }} Orang</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nilai Aset</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Perputaran Stok</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 38) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Konsumen Perbulan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 34) }} Orang</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Pesaing Perkota</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Uraian</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md">&nbsp;</p>
			<p class="text-capitalize m-l-min-md text-xs"><strong>Usaha 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Bidang Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nama Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tgl Berdiri</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Status Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="bagi_hasil" style="height: 11px;"> Bagi Hasil
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="milik_keluarga" style="height: 11px;"> Milik Keluarga
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;"> Milik Sendiri
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lain-lain
							</p>
						</li>
					</ul>
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
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Status Tempat Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="milik_sendiri" style="height: 11px;"> Milik Sendiri
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="sewa" style="height: 11px;"> Sewa
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="lain_lain" style="height: 11px;"> Lain-lain
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Luas Tempat Usaha</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 41) }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Karyawan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 32) }} Orang</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nilai Aset</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Perputaran Stok</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 38) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Konsumen Perbulan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 34) }} Orang</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Jumlah Pesaing Perkota</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Uraian</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
		</div>
	@endforelse
</div>