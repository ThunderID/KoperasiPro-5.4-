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
				<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan 1</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tipe</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: {!! (isset($v2['tipe']) && $v2['tipe'] == 'tanah') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Tanah
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 150px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									{!! (isset($v2['tipe']) && $v2['tipe'] == 'bangunan') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Tanah &amp; bangunan
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jenis Sertifikat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> SHM
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 300px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> SHGB Sampai Tahun {{ str_repeat('.', 30) }}
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. Sertifikat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Atas Nama</p>
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
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
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
						<p class="text-sm text-capitalize">Luas Tanah</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Luas Bangunan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 38) }} M<sup>2</sup></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Fungsi Bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Bentuk Bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
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
						<p class="text-sm text-capitalize">Bentuk bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tingkat
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Tidak Tingkat
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
						<p class="text-sm text-capitalize">Konstruksi Bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Permanen
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> semi permanen
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Lantai bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Keramik
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Tegel
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Ubin
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Dinding bangunan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Bambu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Kayu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Tembok
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
						<p class="text-sm text-capitalize">Listrik</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> 450 watt
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> 900 watt
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> 1300 watt
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Air</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> PDAM
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Sumur
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jalan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Aspal
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Batu
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Lebar Jalan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }} M<sup>2</sup></p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Letak lokasi terhadap jalan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 180px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih rendah dari jalan
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 180px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih tinggi dari jalan
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 180px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Sama dengan jalan
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
						<p class="text-sm text-capitalize">lingkungan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Industri
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Kampung
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasar
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Perkantoran
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Pertokoan
								</p>
							</li>
							<li class="text-sm text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Perumahan
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
						<p class="text-sm text-capitalize">Nilai Jaminan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Taksasi Tanah</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Taksasi bangunan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Njop</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
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
			<p class="text-capitalize m-l-min-md">tidak ada data jaminan tanah &amp; bangunan</p>
		</div>
	@endforelse

	@if ($total_survei == 0)
		{{-- no data survei --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah &amp; bangunan
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> SHM
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 300px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> SHGB Sampai Tahun {{ str_repeat('.', 30) }}
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas Nama</p>
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
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
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
					<p class="text-sm text-capitalize">Luas Tanah</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Luas Bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 38) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Fungsi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Bentuk Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
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
					<p class="text-sm text-capitalize">Bentuk bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tingkat
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tidak Tingkat
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
					<p class="text-sm text-capitalize">Konstruksi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Permanen
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> semi permanen
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Lantai bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Keramik
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tegel
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Ubin
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Dinding bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Bambu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kayu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tembok
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
					<p class="text-sm text-capitalize">Listrik</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> 450 watt
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> 900 watt
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> 1300 watt
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Air</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> PDAM
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Sumur
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Aspal
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Batu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Lebar Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Letak lokasi terhadap jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih rendah dari jalan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih tinggi dari jalan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Sama dengan jalan
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
					<p class="text-sm text-capitalize">lingkungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Industri
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kampung
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasar
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Perkantoran
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Pertokoan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Perumahan
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
					<p class="text-sm text-capitalize">Nilai Jaminan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Taksasi Tanah</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Taksasi bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Njop</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
			</div>
		</div>
	@elseif ($total_survei == 1)
		{{-- data survei hanya 1 --}}
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah &amp; bangunan
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> SHM
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 300px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> SHGB Sampai Tahun {{ str_repeat('.', 30) }}
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas Nama</p>
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
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
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
					<p class="text-sm text-capitalize">Luas Tanah</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Luas Bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 38) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Fungsi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Bentuk Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
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
					<p class="text-sm text-capitalize">Bentuk bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tingkat
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tidak Tingkat
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
					<p class="text-sm text-capitalize">Konstruksi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Permanen
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> semi permanen
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Lantai bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Keramik
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tegel
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Ubin
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Dinding bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Bambu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kayu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tembok
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
					<p class="text-sm text-capitalize">Listrik</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> 450 watt
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> 900 watt
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> 1300 watt
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Air</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> PDAM
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Sumur
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Aspal
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Batu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Lebar Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Letak lokasi terhadap jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih rendah dari jalan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih tinggi dari jalan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Sama dengan jalan
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
					<p class="text-sm text-capitalize">lingkungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Industri
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kampung
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasar
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Perkantoran
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Pertokoan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Perumahan
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
					<p class="text-sm text-capitalize">Nilai Jaminan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Taksasi Tanah</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Taksasi bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Njop</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 150px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah &amp; bangunan
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> SHM
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 300px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> SHGB Sampai Tahun {{ str_repeat('.', 30) }}
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No. Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas Nama</p>
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
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 22) }}/{{ str_repeat('.', 22) }}</p>
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
					<p class="text-sm text-capitalize">Luas Tanah</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Luas Bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 38) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Fungsi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Bentuk Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Ruko
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rumah
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
					<p class="text-sm text-capitalize">Bentuk bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tingkat
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tidak Tingkat
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
					<p class="text-sm text-capitalize">Konstruksi Bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Permanen
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> semi permanen
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Lantai bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Keramik
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tegel
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Ubin
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Dinding bangunan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Bambu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kayu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tembok
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
					<p class="text-sm text-capitalize">Listrik</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> 450 watt
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> 900 watt
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> 1300 watt
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Air</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> PDAM
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Sumur
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Aspal
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Batu
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Tanah
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Lebar Jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }} M<sup>2</sup></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Letak lokasi terhadap jalan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih rendah dari jalan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Lebih tinggi dari jalan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 180px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Sama dengan jalan
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
					<p class="text-sm text-capitalize">lingkungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Industri
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Kampung
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasar
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Perkantoran
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 90px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								&nbsp;&nbsp;<i class="fa fa-square-o" style="font-size: 11px;"></i> Pertokoan
							</p>
						</li>
						<li class="text-sm text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Perumahan
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
					<p class="text-sm text-capitalize">Nilai Jaminan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Taksasi Tanah</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Taksasi bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 42) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Njop</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 40) }}</p>
				</div>
			</div>
		</div>
	@endif
	{{-- <div class="col-sm-6 col-md-6">
		<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan 2</strong></p>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Tipe</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Tanah
					</li>
					<li class="text-sm text-capitalize" style="width: 150px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tanah &amp; Bangunan
					</li>
				</ul>
			</div>
		</div>
		<div class="row m-b-xs">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Jenis Sertifikat</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px">
						: <input class="m-b-none" type="checkbox" value="shm" style="height: 11px;"> SHM
					</li>
					<li class="text-sm text-capitalize" style="width: 300px;">
						<input class="m-b-none" type="checkbox" value="honda" style="height: 11px;"> SHGB Sampai Tahun {{ str_repeat('.', 30) }}
					</li>
				</ul>
			</div>
		</div>
		<div class="row m-b-xs">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">No. Sertifikat</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 155) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Atas Nama</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 155) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Alamat</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 155) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">RT/RW</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 28) }} / {{ str_repeat('.', 28) }}</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Provinsi</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 48) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Kota/Kabupaten</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 60) }}</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Kecamatan</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 48) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Desa/Dusun</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 155) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Luas Tanah</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 55) }} M<sup>2</sup></p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Luas Bangunan</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 43) }} M<sup>2</sup></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Fungsi Bangunan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Ruko
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Rumah
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Bentuk Bangunan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Ruko
					</li>
					<li class="text-sm text-capitalize" style="width: 120px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Rumah
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Lainnya
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Bentuk bangunan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Tingkat
					</li>
					<li class="text-sm text-capitalize" style="width: 120px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tidak Tingkat
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Lainnya
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Konstruksi Bangunan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Permanen
					</li>
					<li class="text-sm text-capitalize" style="width: 120px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> semi permanen
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Lantai bangunan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Keramik
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tanah
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tegel
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Ubin
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> lainnya
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Dinding bangunan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Bambu
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Kayu
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tembok
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> lainnya
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Listrik</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> 450 watt
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> 900 watt
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> 1300 watt
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Air</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> PDAM
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Sumur
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Jalan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Aspal
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Batu
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tanah
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Lebar Jalan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }} M<sup>2</sup></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Letak lokasi terhadap jalan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 180px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Lebih rendah dari jalan
					</li>
					<li class="text-sm text-capitalize" style="width: 180px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> lebih tinggi dari jalan
					</li>
					<li class="text-sm text-capitalize" style="width: 180px;">
						&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> sama dengan jalan
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> lainnya
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">lingkungan</p>
			</div>
			<div class="col-sm-9 p-l-none p-r-none">
				<ul class="list-inline m-b-none">
					<li class="text-sm text-capitalize" style="width: 90px;">
						: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> industri
					</li>
					<li class="text-sm text-capitalize" style="width: 120px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> kampung
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> pasar
					</li>
					<li class="text-sm text-capitalize" style="width: 120px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> perkantoran
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> pertokoan
					</li>
					<li class="text-sm text-capitalize" style="width: 120px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> perumahan
					</li>
					<li class="text-sm text-capitalize" style="width: 90px;">
						<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> lainnya
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Nilai Jaminan</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 55) }}</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Taksasi Tanah</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 35) }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Taksasi bangunan</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 55) }}</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">Njop</p>
			</div>
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text-sm text-capitalize">: Rp {{ str_repeat('.', 35) }}</p>
			</div>
		</div>
	</div> --}}
</div>