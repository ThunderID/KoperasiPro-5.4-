<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>rekening {{ $k + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nama Bank</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['rekening']) && $v['rekening'] == 'bca') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} BCA
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['rekening']) && $v['rekening'] == 'bni') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} BNI
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['rekening']) && $v['rekening'] == 'bri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} BRI
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['rekening']) && $v['rekening'] == 'danamon') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Danamon
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['rekening']) && $v['rekening'] == 'mandiri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Mandiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['rekening']) && $v['rekening'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nomor Rekening</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['nomor_rekening'])) ? $v['nomor_rekening'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tgl Saldo Awal</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['tanggal_awal'])) ? $v['tanggal_awal'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Saldo Awal</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: Rp <span class="money"> {{ (isset($v['saldo_awal'])) ? substr($v['saldo_awal'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tgl Saldo Akhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['tanggal_akhir'])) ? $v['tanggal_akhir'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Saldo Akhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['saldo_akhir'])) ? substr($v['saldo_akhir'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>rekening {{ count($datas) + 1 }}</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Nama Bank</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> BCA
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> BNI
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> BRI
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Danamon
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Mandiri
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Nomor Rekening</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Tgl Saldo Awal</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Saldo Awal</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Tgl Saldo Akhir</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Saldo Akhir</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>rekening 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nama Bank</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> BCA
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> BNI
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> BRI
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Danamon
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Mandiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nomor Rekening</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tgl Saldo Awal</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Saldo Awal</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tgl Saldo Akhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Saldo Akhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>rekening 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nama Bank</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> BCA
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> BNI
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> BRI
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Danamon
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Mandiri
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nomor Rekening</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tgl Saldo Awal</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Saldo Awal</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Tgl Saldo Akhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Saldo Akhir</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>