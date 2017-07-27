<div class="row m-l-none m-r-none m-t-xs">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">{!! (count($datas) == 1) ? '2. Kendaraan' : '&nbsp;' !!}</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Kendaraan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: {!! (isset($v['tipe']) && $v['tipe'] == 'roda_2') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 2
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['tipe']) && $v['tipe'] == 'roda_4') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 4
							</p>
						</li>
						<li class="text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								{!! (isset($v['tipe']) && $v['tipe'] == 'roda_6') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: <span class="string">{{ (isset($v['nomor_bpkb'])) ? $v['nomor_bpkb'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Kendaraan {{ count($datas) + 1 }}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Tipe</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class=" text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
								</p>
							</li>
							<li class=" text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Roda 4
								</p>
							</li>
							<li class=" text-capitalize" style="width: 110px;">
								<p class="text-capitalize m-b-xs text">
									<i class="fa fa-square-o label-fa-icon"></i> Roda 6
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text">Nomor BPKB</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">2 Kendaraan</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Kendaraan {{ count($datas) + 1 }}</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 4
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md" style="font-size: 14px;">&nbsp;</p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><strong>Kendaraan 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								: <i class="fa fa-square-o label-fa-icon"></i> Roda 2
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 4
							</p>
						</li>
						<li class=" text-capitalize" style="width: 110px;">
							<p class="text-capitalize m-b-xs text">
								<i class="fa fa-square-o label-fa-icon"></i> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text">Nomor BPKB</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>