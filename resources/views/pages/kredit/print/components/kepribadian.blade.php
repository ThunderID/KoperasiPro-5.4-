<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif

		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>survei kepribadian {{ $k + 1 }}</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nama Referensi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['nama_referens'])) ? $v['nama_referens'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 140px">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['hubungan']) && $v['hubungan'] == 'orang_tua') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Orang Tua
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'pasangan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Pasangan
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'saudara') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Saudara
							</p>
						</li>
						<li class="text-capitalize" style="width: 140px">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;{!! (isset($v['hubungan']) && $v['hubungan'] == 'rekan_kerja') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Rekan Kerja
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'tetangga') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Tetangga
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Nomor Telp/HP</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string">{{ (isset($v['telepon_referens'])) ? $v['telepon_referens'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Uraian</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['uraian'])) ? $v['uraian'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>survei kepribadian {{ count($datas) + 1 }}</strong></p>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Nama Referensi</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Hubungan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-capitalize" style="width: 140px">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Orang Tua
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Pasangan
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Saudara
								</p>
							</li>
							<li class="text-capitalize" style="width: 140px">
								<p class="text-capitalize m-b-xs text">
									&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Rekan Kerja
								</p>
							</li>
							<li class="text-capitalize" style="width: 110px">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Tetangga
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Nomor Telp/HP</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row row-info">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Uraian</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>survei kepribadian 1</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nama Referensi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 140px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Orang Tua
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pasangan
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Saudara
							</p>
						</li>
						<li class="text-capitalize" style="width: 140px">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Rekan Kerja
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tetangga
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor Telp/HP</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Uraian</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>survei kepribadian 2</strong></p>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nama Referensi</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 140px">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Orang Tua
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Pasangan
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Saudara
							</p>
						</li>
						<li class="text-capitalize" style="width: 140px">
							<p class="text-capitalize m-b-xs text">
								&nbsp;&nbsp;<i class="fa fa-square-o label-fa-icon"></i> Rekan Kerja
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Tetangga
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor Telp/HP</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row row-info">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Uraian</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>