<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif

		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>survei kepribadian {{ $k + 1 }}</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nama Referensi</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['nama_referens']) ? $v['nama_referens'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: {!! (isset($v['hubungan']) && $v['hubungan'] == 'orang_tua') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Orang Tua
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'pasangan') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Pasangan
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'saudara') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Saudara
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'rekan_kerja') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Rekan Kerja
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								{!! (isset($v['hubungan']) && $v['hubungan'] == 'tetangga') ? '<i class="fa fa-check-square-o" style="font-size: 11px;"></i>' : '<i class="fa fa-square-o" style="font-size: 11px;"></i>' !!} Tetangga
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor Telp/HP</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['telepon_referens']) ? $v['telepon_referens'] : str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Uraian</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['uraian']) ? $v['uraian'] : str_repeat('.', 43) }}</p>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md text-sm"><strong>survei kepribadian {{ count($datas) + 1 }}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Nama Referensi</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Hubungan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									: <i class="fa fa-square-o" style="font-size: 11px;"></i> Orang Tua
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasangan
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Saudara
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Rekan Kerja
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-capitalize m-b-xs" style="font-size: 10px;">
									<i class="fa fa-square-o" style="font-size: 11px;"></i> Tetangga
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Nomor Telp/HP</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Uraian</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>survei kepribadian 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nama Referensi</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Orang Tua
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasangan
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Saudara
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rekan Kerja
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tetangga
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor Telp/HP</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Uraian</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm"><strong>survei kepribadian 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nama Referensi</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Hubungan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								: <i class="fa fa-square-o" style="font-size: 11px;"></i> Orang Tua
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Pasangan
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Saudara
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Rekan Kerja
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-capitalize m-b-xs" style="font-size: 10px;">
								<i class="fa fa-square-o" style="font-size: 11px;"></i> Tetangga
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor Telp/HP</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 45) }}</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Uraian</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 43) }}</p>
				</div>
			</div>
		</div>
	@endforelse
</div>