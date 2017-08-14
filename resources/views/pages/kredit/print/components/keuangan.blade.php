<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md m-b-sm" style="font-size: 12px;"><strong>Keuangan {{ $k + 1 }}</strong></p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><u>Penghasilan</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Rutin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: Rp <span class="money"> {{ (isset($v['penghasilan_rutin'])) ? substr($v['penghasilan_rutin'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Pasangan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['penghasilan_pasangan'])) ? substr($v['penghasilan_pasangan'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['penghasilan_usaha'])) ? substr($v['penghasilan_usaha'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan lain</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['penghasilan_lain'])) ? substr($v['penghasilan_lain'], 3) : '' }}</span>
					<div class="dot-line"></div>
					<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Total Pendapatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					@php
						$penghasilan_rutin = isset($v['penghasilan_rutin']) ? (int) str_replace('.', '', substr($v['penghasilan_rutin'], 3)) : 0;
						$penghasilan_pasangan = isset($v['penghasilan_pasangan']) ? (int) str_replace('.', '', substr($v['penghasilan_pasangan'], 3)) : 0;
						$penghasilan_usaha = isset($v['penghasilan_usaha']) ? (int) str_replace('.', '', substr($v['penghasilan_usaha'], 3)) : 0;
						$penghasilan_lain = isset($v['penghasilan_lain']) ? (int) str_replace('.', '', substr($v['penghasilan_lain'], 3)) : 0;
						$total = $penghasilan_rutin + $penghasilan_pasangan + $penghasilan_usaha + $penghasilan_lain;
					@endphp

					: Rp <span class="money"> {{ ($total != 0) ? $total : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<p class="text-capitalize m-l-min-md m-t-sm" style="font-size: 12px;"><u>Pengeluaran</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Rutin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['biaya_rutin'])) ? substr($v['biaya_rutin'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Rumah Tangga</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['biaya_rumah_tangga'])) ? substr($v['biaya_rumah_tangga'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Pendidikan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['biaya_pendidikan'])) ? substr($v['biaya_pendidikan'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Angsuran Kredit</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <span class="money"> {{ (isset($v['biaya_angsuran'])) ? substr($v['biaya_angsuran'], 3) : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya lain</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none">
					: Rp <span class="money"> {{ (isset($v['biaya_lain'])) ? substr($v['biaya_lain'], 3) : '' }}</span>
					<div class="dot-line"></div>
					<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Total Pengeluaran</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					@php
						$biaya_rutin = isset($v['biaya_rutin']) ? (int) str_replace('.', '', substr($v['biaya_rutin'], 3)) : 0;
						$biaya_rumah_tangga = isset($v['biaya_rumah_tangga']) ? (int) str_replace('.', '', substr($v['biaya_rumah_tangga'], 3)) : 0;
						$biaya_pendidikan = isset($v['biaya_pendidikan']) ? (int) str_replace('.', '', substr($v['biaya_pendidikan'], 3)) : 0;
						$biaya_angsuran = isset($v['biaya_angsuran']) ? (int) str_replace('.', '', substr($v['biaya_angsuran'], 3)) : 0;
						$biaya_lain = isset($v['biaya_lain']) ? (int) str_replace('.', '', substr($v['biaya_lain'], 3)) : 0;
						$total = $biaya_rutin + $biaya_rumah_tangga + $biaya_pendidikan + $biaya_angsuran + $biaya_lain;
					@endphp

					: Rp <span class="money"> {{ ($total != 0) ? $total : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row m-t-md">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Sumber pendapatan utama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string"> {{ (isset($v['sumber_penghasilan_utama'])) ? $v['sumber_penghasilan_utama'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jumlah tanggungan keluarga</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <span class="string"> {{ (isset($v['jumlah_tanggungan_keluarga'])) ? $v['jumlah_tanggungan_keluarga'] : '' }}</span>
					<div class="dot-line"></div>
				</div>
			</div>
		</div>
		
		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md m-b-sm" style="font-size: 12px;"><strong>Keuangan {{ count($datas) + 1 }}</strong></p>
				<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><u>Penghasilan</u></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Penghasilan Rutin</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Penghasilan Pasangan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Penghasilan Usaha</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Penghasilan lain</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
						<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Total Pendapatan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<p class="text-capitalize m-l-min-md m-t-sm" style="font-size: 12px;"><u>Pengeluaran</u></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Biaya Rutin</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Biaya Rumah Tangga</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Biaya Pendidikan</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Biaya Angsuran Kredit</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Biaya lain</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none">
						: Rp <div class="dot-line"></div>
						<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Total Pengeluaran</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: Rp <div class="dot-line"></div>
					</div>
				</div>
				<div class="row m-t-md">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Sumber pendapatan utama</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text text-capitalize">Jumlah tanggungan keluarga</p>
					</div>
					<div class="col-sm-8 p-l-none p-r-none text">
						: <div class="dot-line"></div>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md m-b-sm" style="font-size: 12px;"><strong>Keuangan 1</strong></p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><u>Penghasilan</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Rutin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Pasangan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan lain</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
					<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Total Pendapatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<p class="text-capitalize m-l-min-md m-t-sm" style="font-size: 12px;"><u>Pengeluaran</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Rutin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Rumah Tangga</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Pendidikan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Angsuran Kredit</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya lain</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none">
					: Rp <div class="dot-line"></div>
					<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Total Pengeluaran</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row m-t-md">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Sumber pendapatan utama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jumlah tanggungan keluarga</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md m-b-sm" style="font-size: 12px;"><strong>Keuangan 2</strong></p>
			<p class="text-capitalize m-l-min-md" style="font-size: 12px;"><u>Penghasilan</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Rutin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Pasangan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan Usaha</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Penghasilan lain</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
					<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Total Pendapatan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<p class="text-capitalize m-l-min-md m-t-sm" style="font-size: 12px;"><u>Pengeluaran</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Rutin</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Rumah Tangga</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Pendidikan</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya Angsuran Kredit</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Biaya lain</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none">
					: Rp <div class="dot-line"></div>
					<hr class="m-t-xs m-b-md " style="padding-left: 20px; padding-right: 20px; left: 0; border-width: 2px; border-color: #999;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Total Pengeluaran</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: Rp <div class="dot-line"></div>
				</div>
			</div>
			<div class="row m-t-md">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Sumber pendapatan utama</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text text-capitalize">Jumlah tanggungan keluarga</p>
				</div>
				<div class="col-sm-8 p-l-none p-r-none text">
					: <div class="dot-line"></div>
				</div>
			</div>
		</div>
	@endforelse
</div>