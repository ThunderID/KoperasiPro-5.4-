<div class="row m-l-none m-r-none">
	<div class="col-sm-6 col-md-6">
		<div class="row row-info">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text text-capitalize">Tgl Pengajuan</p>
			</div>
			<div class="col-sm-8 p-l-none p-r-none text">
				: <span class="string">{{ (isset($datas['tanggal_pengajuan'])) ? $datas['tanggal_pengajuan'] : '' }}</span>
				<div class="dot-line"></div>
			</div>
		</div>
		<div class="row row-info">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text text-capitalize">Jumlah Pinjaman</p>
			</div>
			<div class="col-sm-8 p-l-none p-r-none text">
				: Rp <span class="money">{{ isset($datas['pengajuan_kredit']) ? substr($datas['pengajuan_kredit'], 3) : '' }}</span>
				<div class="dot-line"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-6">
		<div class="row row-info">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text text-capitalize">Jenis Kredit</p>
			</div>
			<div class="col-sm-8 p-l-none p-r-none text">
				<ul class="list-inline m-b-none">
					<li class=" text-capitalize" style="width: 120px;">
						<p class="text-capitalize m-b-xs text">
							: {!! (isset($datas['jenis_kredit']) && $datas['jenis_kredit'] == 'pa') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Angsuran
						</p>
					</li>
					<li class=" text-capitalize" style="width: 100px;">
						<p class="text-capitalize m-b-xs text">
							{!! (isset($datas['jenis_kredit']) && $datas['jenis_kredit'] == 'pt') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Musiman
						</p>
					</li>
					<li class=" text-capitalize" style="width: 150px;">
						<p class="text-capitalize m-b-xs text">
							{!! (isset($datas['jenis_kredit']) && $datas['jenis_kredit'] == 'rumah_delta') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Rumah Delta
						</p>
					</li>
					<li class=" text-capitalize" style="width: 100px;">
						<p class="text-capitalize m-b-xs text">
							&nbsp;&nbsp;{!! (isset($datas['jenis_kredit']) && $datas['jenis_kredit'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
						</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="row row-info">
			<div class="col-sm-3 p-l-none p-r-none">
				<p class="text text-capitalize">Lama Angsuran</p>
			</div>
			<div class="col-sm-8 p-l-none p-r-none text">
				: <span class="string">{{ (isset($datas['jangka_waktu'])) ? $datas['jangka_waktu'] : '' }}</span>
				<span style="float: right;">Bulan</span>
				<div class="dot-line"></div>
			</div>
		</div>
	</div>
</div>