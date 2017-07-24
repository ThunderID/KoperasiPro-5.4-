@php
	// dd($datas);
@endphp
<div class="row m-l-none m-r-none">
	@forelse ($datas as $k => $v)
		@if ($k % 2 == 0)
			</div>
			<div class="row m-l-none m-r-none">
		@endif
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md m-b-sm text-sm"><strong>Keuangan {{ $k + 1 }}</strong></p>
			<p class="text-capitalize m-l-min-md text-sm"><u>Penghasilan</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Rutin</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['penghasilan_rutin']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['penghasilan_rutin'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Pasangan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['penghasilan_pasangan']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['penghasilan_pasangan'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['penghasilan_usaha']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['penghasilan_usaha'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan lain</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['penghasilan_lain']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['penghasilan_lain'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
					<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Total Pendapatan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">
						@php
							$penghasilan_rutin = isset($v['penghasilan_rutin']) ? (int) str_replace('.', '', substr($v['penghasilan_rutin'], 3)) : 0;
							$penghasilan_pasangan = isset($v['penghasilan_pasangan']) ? (int) str_replace('.', '', substr($v['penghasilan_pasangan'], 3)) : 0;
							$penghasilan_usaha = isset($v['penghasilan_usaha']) ? (int) str_replace('.', '', substr($v['penghasilan_usaha'], 3)) : 0;
							$penghasilan_lain = isset($v['penghasilan_lain']) ? (int) str_replace('.', '', substr($v['penghasilan_lain'], 3)) : 0;
							$total = $penghasilan_rutin + $penghasilan_pasangan + $penghasilan_usaha + $penghasilan_lain;
						@endphp
						: 
						@if ($total != 0)
							Rp <span style="float: right; padding-right: 20px;"> {{ $total }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<p class="text-capitalize m-l-min-md m-t-sm text-sm"><u>Pengeluaran</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Rutin</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['biaya_rutin']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['biaya_rutin'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Rumah Tangga</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['biaya_rumah_tangga']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['biaya_rumah_tangga'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Pendidikan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['biaya_pendidikan']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['biaya_pendidikan'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Angsuran Kredit</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['biaya_angsuran']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['biaya_angsuran'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya lain</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: 
						@if (isset($v['biaya_lain']))
							Rp <span style="float: right; padding-right: 20px;"> {{ substr($v['biaya_lain'], 3) }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
					<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Total Pengeluaran</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">
						@php
							$biaya_rutin = isset($v['biaya_rutin']) ? (int) str_replace('.', '', substr($v['biaya_rutin'], 3)) : 0;
							$biaya_rumah_tangga = isset($v['biaya_rumah_tangga']) ? (int) str_replace('.', '', substr($v['biaya_rumah_tangga'], 3)) : 0;
							$biaya_pendidikan = isset($v['biaya_pendidikan']) ? (int) str_replace('.', '', substr($v['biaya_pendidikan'], 3)) : 0;
							$biaya_angsuran = isset($v['biaya_angsuran']) ? (int) str_replace('.', '', substr($v['biaya_angsuran'], 3)) : 0;
							$biaya_lain = isset($v['biaya_lain']) ? (int) str_replace('.', '', substr($v['biaya_lain'], 3)) : 0;
							$total = $biaya_rutin + $biaya_rumah_tangga + $biaya_pendidikan + $biaya_angsuran + $biaya_lain;
						@endphp
						: 
						@if ($total != 0)
							Rp <span style="float: right; padding-right: 20px;"> {{ $total }}</span> 
						@else
							Rp {{ str_repeat('.', 145) }}
						@endif
					</p>
				</div>
			</div>
			<div class="row m-t-md">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Sumber pendapatan utama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['sumber_penghasilan_utama']) ? $v['sumber_penghasilan_utama'] : str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jumlah tanggungan keluarga</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ isset($v['jumlah_tanggungan_keluarga']) ? $v['jumlah_tanggungan_keluarga'] : str_repeat('.', 138) }} Orang</p>
				</div>
			</div>
		</div>
		
		@if (count($datas) == 1)
			<div class="col-sm-6 col-md-6">
				<p class="text-capitalize m-l-min-md m-b-sm text-sm"><strong>Keuangan {{ count($datas) + 1 }}</strong></p>
				<p class="text-capitalize m-l-min-md text-sm"><u>Penghasilan</u></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Penghasilan Rutin</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Penghasilan Pasangan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Penghasilan Usaha</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Penghasilan lain</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
						<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Total Pendapatan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<p class="text-capitalize m-l-min-md m-t-sm text-sm"><u>Pengeluaran</u></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Biaya Rutin</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Biaya Rumah Tangga</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Biaya Pendidikan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Biaya Angsuran Kredit</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Biaya lain</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
						<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Total Pengeluaran</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row m-t-md">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Sumber pendapatan utama</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jumlah tanggungan keluarga</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm">: {{ str_repeat('.', 138) }} Orang</p>
					</div>
				</div>
			</div>
		@endif
	@empty
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md m-b-sm text-sm"><strong>Keuangan 1</strong></p>
			<p class="text-capitalize m-l-min-md text-sm"><u>Penghasilan</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Rutin</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Pasangan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan lain</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Total Pendapatan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<p class="text-capitalize m-l-min-md m-t-sm text-sm"><u>Pengeluaran</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Rutin</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Rumah Tangga</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Pendidikan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Angsuran Kredit</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya lain</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Total Pengeluaran</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row m-t-md">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Sumber pendapatan utama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jumlah tanggungan keluarga</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 138) }} Orang</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<p class="text-capitalize m-l-min-md m-b-sm text-sm"><strong>Keuangan 2</strong></p>
			<p class="text-capitalize m-l-min-md text-sm"><u>Penghasilan</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Rutin</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Pasangan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan Usaha</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Penghasilan lain</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Total Pendapatan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<p class="text-capitalize m-l-min-md m-t-sm text-sm"><u>Pengeluaran</u></p>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Rutin</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Rumah Tangga</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Pendidikan</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya Angsuran Kredit</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Biaya lain</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
					<hr class="m-t-xs m-b-md " style="width: 92%; left: 0;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Total Pengeluaran</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: Rp {{ str_repeat('.', 145) }}</p>
				</div>
			</div>
			<div class="row m-t-md">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Sumber pendapatan utama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 150) }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jumlah tanggungan keluarga</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm">: {{ str_repeat('.', 138) }} Orang</p>
				</div>
			</div>
		</div>
	@endforelse
</div>