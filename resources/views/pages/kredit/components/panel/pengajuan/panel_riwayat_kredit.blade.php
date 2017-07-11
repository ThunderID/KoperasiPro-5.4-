<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-riwayat-kredit">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">riwayat kredit nasabah</p>
				</div>
			</div>

			@forelse($page_datas->credit['debitur']['kredit'] as $key => $value)
				<div class="row">
					<div class="col-sm-12">
						<p class="m-t-sm m-b-xs text-capitalize">
							<strong>kredit {{ $key+1 }}</strong>
						</p>
						<p class="text-capitalize text-light m-b-xs">
							Pinjaman {{ (isset($value['pengajuan_kredit']) && !is_null($value['pengajuan_kredit'])) ? $value['pengajuan_kredit'] : '-' }}
						</p>
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['jangka_waktu']) && !is_null($value['jangka_waktu'])) ? $value['jangka_waktu'] : '-' }} Bulan 
							@if (isset($value['jenis_kredit']) && !is_null($value['jenis_kredit']))
								@if ($value['jenis_kredit'] == 'pa')
									(Angsuran)
								@elseif ($value['jenis_kredit'] == 'pt')
									(Musiman)
								@elseif ($value['jenis_kredit'] == 'rumah_delta')
									(Rumah Delta)
								@else
									({{ str_replace('_', ' ', $value['jenis_kredit']) }})
								@endif
							@endif
						</p>
						<p class="text-capitalize text-light m-b-xs">
							Pengajuan Tgl {{ (isset($value['tanggal_pengajuan']) && !is_null($value['tanggal_pengajuan'])) ? $value['tanggal_pengajuan'] : '-' }}
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						@forelse((array)$value['jaminan_tanah_bangunan'] as $key2 => $value2)
							<p class="m-t-sm m-b-xs text-capitalize text-muted">
								<u>jaminan tanah &amp; bangunan {{ $key2+1 }}</u>
							</p>
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value2['tipe']) && !is_null($value2['tipe'])) ? str_replace('_', ' ', $value2['tipe']) : '-' }}
								<span> ( {{ (isset($value2['jenis_sertifikat']) && !is_null($value2['jenis_sertifikat'])) ? str_replace('_', ' ', $value2['jenis_sertifikat']) : '-' }} )</span>
							</p>
							<p class="text-capitalize text-light m-b-xs">
								No. Sertifikat {{ (isset($value2['nomor_sertifikat']) && !is_null($value2['nomor_sertifikat'])) ? $value2['nomor_sertifikat'] : '-' }}
							</p>
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value2['luas_bangunan']) && !is_null($value2['luas_bangunan'])) ? str_replace('_', ' ', $value2['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
								{{ (isset($value2['luas_tanah']) && !is_null($value2['luas_tanah'])) ? str_replace('_', ' ', $value2['luas_tanah']) : '-'  }} M<sup>2</sup> 
								<span class="text-capitalize text-muted" style="font-size: 11px;"><em>( bangunan / tanah )</em></span>
							</p>
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value2['atas_nama']) && !is_null($value2['atas_nama'])) ? $value2['atas_nama'] : '-' }}
							</p>
							<p class="text-capitalize text-light m-b-xs">
								@foreach ($value2['alamat'] as $k => $v)
									@if ($k == 0)
										{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }}
										RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
										{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} 
										{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] .'<br/>' : '' }}
										{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
										{{ (isset($v['provinsi']) && !is_null($v['provinsi'])) ? $v['provinsi'] : '' }} - 
										{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
									@endif
								@endforeach
							</p>
							<p class="text-capitalize text-light m-b-xs">
								Sertifikat berlaku sampai th. {{ (isset($value2['masa_berlaku_sertifikat']) && !is_null($value2['masa_berlaku_sertifikat'])) ? $value2['masa_berlaku_sertifikat'] : '-' }}
							</p>
						@empty
							<p class="m-t-sm m-b-xs text-capitalize text-muted">
								<u>jaminan tanah &amp; bangunan </u>
							</p>
							<p class="text-left"><i>Tidak ada jaminan tanah &amp; bangunan</i></p>
						@endforelse
					</div>
					<div class="col-sm-6">
						@forelse((array)$value['jaminan_kendaraan'] as $key2 => $value2)
							<p class="m-t-sm m-b-xs text-capitalize text-muted">
								<u>jaminan kendaraan {{ $key2+1 }}</u>
							</p>
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value2['merk']) && !is_null($value2['merk'])) ? $value2['merk'] : '-' }} 
								Th. {{ (isset($value2['tahun']) && !is_null($value2['tahun'])) ? $value2['tahun'] : '-' }}
								({{ (isset($value2['tipe']) && !is_null($value2['tipe'])) ? str_replace('_', ' ', $value2['tipe']) : '-' }})
							</p>
							
							<p class="text-capitalize text-light m-b-xs">
								No. BPKB {{ (isset($value2['nomor_bpkb']) && !is_null($value2['nomor_bpkb'])) ? $value2['nomor_bpkb'] : '-' }}
							</p>

							<p class="text-capitalize text-light m-b-md">
								{{ (isset($value2['atas_nama']) && !is_null($value2['atas_nama'])) ? $value2['atas_nama'] : '-' }}
							</p>
						@empty
							<p class="m-t-sm m-b-xs text-capitalize text-muted">
								<u>jaminan kendaraan </u>
							</p>
							<p class="text-left"><i>Tidak ada jaminan kendaraan</i></p>
						@endforelse
					</div>
				</div>
				@if(count($page_datas->credit['debitur']['kredit'] > 1))
					<hr class="m-b-md">
				@endif
			@empty
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p class="text-light">Belum ada data riwayat kredit.</p>
					</div>
				</div>
			@endforelse
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>