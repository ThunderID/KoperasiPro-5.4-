<div class="row m-l-none m-r-none m-t-xs">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-md">{!! (count($datas) == 1) ? '2. Kendaraan' : '&nbsp;' !!}</p>
			<p class="text-capitalize m-l-min-md text-xs"><strong>Kendaraan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;" {{ (isset($v['tipe']) && $v['tipe'] == 'roda_2') ? 'checked' : 'disabled' }}> Roda 2
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;" {{ (isset($v['tipe']) && $v['tipe'] == 'roda_4') ? 'checked' : 'disabled' }}> Roda 4
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="roda_6" style="height: 11px;" {{ (isset($v['tipe']) && $v['tipe'] == 'roda_6') ? 'checked' : 'disabled' }}> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor BPKB</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['nomor_bpkb']) ? $v['nomor_bpkb'] : str_repeat('.', 150) }}</p>	
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-uppercase m-l-min-lg">&nbsp;</p>
				<p class="text-capitalize m-l-min-md text-xs"><strong>Kendaraan {{ count($datas) + 1 }}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Tipe</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Roda 2
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Roda 4
								</p>
							</li>
							<li class="text-sm">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="roda_6" style="height: 11px;"> Roda 6
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm">Nomor BPKB</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>	
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-lg">2. Kendaraan</p>
			<p class="text-capitalize m-l-min-md text-xs"><strong>Kendaraan 1</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Roda 2
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Roda 4
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="roda_6" style="height: 11px;"> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor BPKB</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>	
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-uppercase m-l-min-lg">&nbsp;</p>
			<p class="text-capitalize m-l-min-md text-xs"><strong>Kendaraan 2</strong></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Roda 2
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Roda 4
							</p>
						</li>
						<li class="text-sm">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="roda_6" style="height: 11px;"> Roda 6
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm">Nomor BPKB</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>	
				</div>
			</div>
		</div>
	@endforelse
</div>