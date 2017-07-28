<div class="row m-l-none m-r-none">
	@forelse($datas as $k => $v)
		<div class="col-sm-12 m-b-md">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan kendaraan {{ $k + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jenis Kendaraan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['tipe']) && $v['tipe'] == 'roda_2') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 2
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['tipe']) && $v['tipe'] == 'roda_4') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 4
							</p>
						</li>
						<li class=" text-capitalize" style="width: 100px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['tipe']) && $v['tipe'] == 'roda_6') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 6
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
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['merk']) && $v['merk'] == 'daihatsu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Daihatsu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'honda') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Honda
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'isuzu') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Isuzu
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['merk']) && $v['merk'] == 'kawasaki') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kawasaki
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'kia') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kia
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'mitsubishi') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Mitsubishi
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['merk']) && $v['merk'] == 'nissan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Nissan
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'suzuki') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Suzuki
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'toyota') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Toyota
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['merk']) && $v['merk'] == 'yamaha') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Yamaha
							</p>
						</li>
						<li class=" text-capitalize" style="width: 120px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['merk']) && $v['merk'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">No. BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['nomor_bpkb'])) ? $v['nomor_bpkb'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tahun</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['tahun'])) ? $v['tahun'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Atas nama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['atas_nama'])) ? $v['atas_nama'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>
	@empty
		@foreach(range(1,2) as $k)
			<div class="col-sm-12 m-b-md">
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>jaminan kendaraan {{ $k }}</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Jenis Kendaraan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Roda 4
								</p>
							</li>
							<li class=" text-capitalize" style="width: 100px;">
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
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Daihatsu
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Honda
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Isuzu
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Kawasaki
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Kia
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Mitsubishi
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Nissan
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Suzuki
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Toyota
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Yamaha
								</p>
							</li>
							<li class=" text-capitalize" style="width: 120px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Lainnya
								</p>
							</li>
						</ul>
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
						<p class="text text-capitalize">Tahun</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
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
			</div>
		@endforeach
	@endforelse
</div>