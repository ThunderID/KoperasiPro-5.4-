<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA JAMINAN</h4>
		<hr/>
	</div>
</div>

@if(!empty($page_datas->credit['jaminan']))
<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Kendaraan</strong></p>
				
				@foreach($page_datas->credit->survey['jaminan']['kendaraan'] as $kendaraan)
				<div class="col-sm-12">

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Merk</strong></p>
							<p>
								{{ $kendaraan['merk'] }}
							</p>
						</div>

						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Jenis</strong></p>
							<p>
								{{ $kendaraan['jenis'] }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Warna</strong></p>
							<p>
								{{ $kendaraan['warna'] }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Tahun</strong></p>
							<p>
								{{ $kendaraan['tahun'] }}
							</p>
						</div>
					</div>
					
					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Atas Nama</strong></p>
							<p>
								{{ $kendaraan['atas_nama'] }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Alamat</strong></p>
							<p>
								{{ $kendaraan['alamat'] }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Nomor Polisi</strong></p>
							<p>
								{{ $kendaraan['nomor_polisi'] }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Nomor BPKB</strong></p>
							<p>
								{{ $kendaraan['no_bpkb'] }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Nomor Mesin</strong></p>
							<p>
								{{ $kendaraan['no_mesin'] }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Nomor Rangka</strong></p>
							<p>
								{{ $kendaraan['no_rangka'] }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Masa Berlaku</strong></p>
							<p>
								{{ Carbon\Carbon::parse($kendaraan['masa_berlaku_stnk'])->format('d/m/Y') }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Faktur Beli</strong></p>
							<p>
								{{ ($kendaraan['faktur'] ? 'Ada' : 'Tidak Ada' ) }}
							</p>
						</div>
					</div>


					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Kuitansi Jual Beli</strong></p>
							<p>
								{{ ($kendaraan['kuitansi_jual_beli'] ? 'Ada' : 'Tidak Ada' ) }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Kuitansi Kosong BPKB</strong></p>
							<p>
								{{ ($kendaraan['kuitansi_kosong_bpkb'] ? 'Ada' : 'Tidak Ada' ) }}
							</p>
						</div>
					</div>
					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>KTP yang sesuai dengan BPKB</strong></p>
							<p>
								{{ ($kendaraan['ktp_bpkb'] ? 'Ada' : 'Tidak Ada' ) }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Status Kepemilikan</strong></p>
							<p>
								{{ ucwords(str_replace('_', ' ', $kendaraan['status_kepemilikan'])) }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Kondisi Fisik</strong></p>
							<p>
								{{ ucwords(str_replace('_', ' ', $kendaraan['physical_condition'])) }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Status Kepemilikan</strong></p>
							<p>
								{{ ucwords($kendaraan['ownership_status']) }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Asuransi</strong></p>
							<p>
								{{ ($kendaraan['insurance'] ? 'Ada' : 'Tidak Ada' ) }}
							</p>
						</div>
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Harga Pasar</strong></p>
							<p>
								{{ $kendaraan['assessed']->market_value->IDR() }}
							</p>
						</div>
					</div>

					<div class="row m-b-xl">
						<div class="col-sm-6">
							<p class="p-b-sm"><strong>Nilai Taksasi</strong></p>
							<p>
								{{ $kendaraan['assessed']->assess->IDR() }}
							</p>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>

	</div>
</div>
@else
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl m-t-xs-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#data_jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		</div>
	</div>
@endif

@push('show_modals')

		

@endpush