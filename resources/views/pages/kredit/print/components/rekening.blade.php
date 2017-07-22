<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm">rekening {{ $k + 1 }}</p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Nama Bank</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;" {{ (isset($v['rekening']) && $v['rekening'] == 'bca') ? 'checked' : '' }}> BCA
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;" {{ (isset($v['rekening']) && $v['rekening'] == 'bni') ? 'checked' : '' }}> BNI
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;" {{ (isset($v['rekening']) && $v['rekening'] == 'bri') ? 'checked' : '' }}> BRI
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;" {{ (isset($v['rekening']) && $v['rekening'] == 'danamon') ? 'checked' : '' }}> Danamon
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;" {{ (isset($v['rekening']) && $v['rekening'] == 'mandiri') ? 'checked' : '' }}> Mandiri
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;" {{ (isset($v['rekening']) && $v['rekening'] == 'lainnya') ? 'checked' : '' }}> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Nomor Rekening</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['nomor_rekening']) ? $v['nomor_rekening'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tgl Saldo Awal</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['tanggal_awal']) ? $v['tanggal_awal'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Saldo Awal</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['saldo_awal']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['saldo_awal'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tgl Saldo Akhir</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['tanggal_akhir']) ? $v['tanggal_akhir'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Saldo Akhir</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['saldo_akhir']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['saldo_akhir'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
		</div>

		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md text-sm">rekening {{ count($datas) + 1 }}</p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Nama Bank</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;"> BCA
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> BNI
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> BRI
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;"> Danamon
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;"> Mandiri
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;"> Lainnya
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Nomor Rekening</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tgl Saldo Awal</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Saldo Awal</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tgl Saldo Akhir</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Saldo Akhir</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm">rekening 1</p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Nama Bank</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;"> BCA
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> BNI
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> BRI
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;"> Danamon
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;"> Mandiri
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;"> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Nomor Rekening</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tgl Saldo Awal</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Saldo Awal</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tgl Saldo Akhir</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Saldo Akhir</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md text-sm">rekening 2</p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Nama Bank</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;"> BCA
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> BNI
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> BRI
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;"> Danamon
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;"> Mandiri
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;"> Lainnya
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Nomor Rekening</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tgl Saldo Awal</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Saldo Awal</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tgl Saldo Akhir</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Saldo Akhir</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
		</div>
	@endforelse
</div>