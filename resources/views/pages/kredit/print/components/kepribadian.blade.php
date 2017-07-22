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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;" {{ (isset($v['hubungan']) && $v['hubungan'] == 'orang_tua') ? 'checked' : 'disabled' }}> Orang Tua
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;" {{ (isset($v['hubungan']) && $v['hubungan'] == 'pasangan') ? 'checked' : 'disabled' }}> Pasangan
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;" {{ (isset($v['hubungan']) && $v['hubungan'] == 'saudara') ? 'checked' : 'disabled' }}> Saudara
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;" {{ (isset($v['hubungan']) && $v['hubungan'] == 'rekan_kerja') ? 'checked' : 'disabled' }}> Rekan Kerja
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;" {{ (isset($v['hubungan']) && $v['hubungan'] == 'tetangga') ? 'checked' : 'disabled' }}> Tetangga
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
								<p class="text-sm text-capitalize m-b-xs">
									: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;"> Orang Tua
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> Pasangan
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;"> Saudara
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;"> Rekan Kerja
								</p>
							</li>
							<li class="text-sm text-capitalize">
								<p class="text-sm text-capitalize m-b-xs">
									<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;"> Tetangga
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;"> Orang Tua
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> Pasangan
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;"> Saudara
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;"> Rekan Kerja
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;"> Tetangga
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
							<p class="text-sm text-capitalize m-b-xs">
								: <input class="m-b-none" type="checkbox" value="orang_tua" style="height: 11px;"> Orang Tua
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="pasangan" style="height: 11px;"> Pasangan
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="saudara" style="height: 11px;"> Saudara
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="rekan_kerja" style="height: 11px;"> Rekan Kerja
							</p>
						</li>
						<li class="text-sm text-capitalize">
							<p class="text-sm text-capitalize m-b-xs">
								<input class="m-b-none" type="checkbox" value="tetangga" style="height: 11px;"> Tetangga
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