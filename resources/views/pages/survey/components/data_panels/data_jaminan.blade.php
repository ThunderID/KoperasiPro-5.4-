<div class="row">
	<div class="col-sm-12">
		<h4>Data Jaminan</h4>
		<hr/>
	</div>
</div>

<!-- no data -->
<!-- <div class="row">
	<div class="col-sm-12">
		<p>Belum ada data disimpan. <a href="#ekonomi-makro" data-toggle="modal" data-target="#data_aset" no-data-pjax> Tambahkan Sekarang </a></p>
	</div>
</div>

<div class="row clearfix">&nbsp;</div>
<div class="row clearfix">&nbsp;</div>
<div class="row clearfix">&nbsp;</div>
 -->

<!-- with data -->
<div class="row">
	<div class="col-sm-12">
		@if(!empty($page_datas->credit->survey->collateral->vehicles))
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Kendaraan</h4>
				</hr>
			</div>
		</div>
		@else
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Kendaraan</h4>
				</hr>
				<p>Belum ada jaminan</p>
			</div>
		</div>
		@endif
	</div>

	@foreach($page_datas->credit->survey->collateral->vehicles as $vehicle)
		<div class="col-sm-12">

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Merk</strong></p>
					<p>
						{{$vehicle->merk}}
					</p>
				</div>

				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Tipe</strong></p>
					<p>
						{{$vehicle->type}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nomor Polisi</strong></p>
					<p>
						{{$vehicle->police_number}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Warna</strong></p>
					<p>
						{{$vehicle->color}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Tahun</strong></p>
					<p>
						{{$vehicle->year}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nama Pemilik</strong></p>
					<p>
						{{$vehicle->name}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Alamat Pemilik</strong></p>
					<p>
						{{$vehicle->address}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nomor BPKB</strong></p>
					<p>
						{{$vehicle->bpkb_number}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nomor Mesin</strong></p>
					<p>
						{{$vehicle->machine_number}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nomor Rangka</strong></p>
					<p>
						{{$vehicle->frame_number}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Masa Berlaku</strong></p>
					<p>
						{{$vehicle->valid_until->format('d M Y')}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Fungsi</strong></p>
					<p>
						{{$vehicle->functions}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Faktur Beli</strong></p>
					<p>
						{{($vehicle->invoice ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nota Beli</strong></p>
					<p>
						{{($vehicle->purchase_memo ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Kwitansi Beli</strong></p>
					<p>
						{{($vehicle->memo ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>KTP yang sesuai dengan BPKB</strong></p>
					<p>
						{{($vehicle->valid_ktp ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Kondisi Fisik</strong></p>
					<p>
						{{$vehicle->physical_condition}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Status Kepemilikan</strong></p>
					<p>
						{{$vehicle->ownership_status}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Asuransi</strong></p>
					<p>
						{{($vehicle->insurance ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Harga Pasar</strong></p>
					<p>
					{{$vehicle->assessed->market_value->IDR()}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Taksasi</strong></p>
					<p>
					{{$vehicle->assessed->assess->IDR()}}
					</p>
				</div>
			</div>
		</div>
	@endforeach

	<div class="col-sm-12">
		@if(!empty($page_datas->credit->survey->collateral->lands))
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Tanah</h4>
				</hr>
			</div>
		</div>
		@else
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Tanah</h4>
				</hr>
				<p>Belum ada jaminan</p>
			</div>
		</div>
		@endif
	</div>
	@foreach($page_datas->credit->survey->collateral->lands as $land)
		<div class="col-sm-12">

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nama Pemilik</strong></p>
					<p>
						{{$land->name}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Alamat Pemilik</strong></p>
					<p>
						{{$land->address}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Sertifikat</strong></p>
					<p>
						{{($land->certification ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Luas Tanah</strong></p>
					<p>
						{{$land->surface_area}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Tinggi Jalan</strong></p>
					<p>
						{{$land->road}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Lebar Jalan</strong></p>
					<p>
						{{$land->road_wide}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Letak Tanah</strong></p>
					<p>
						{{$land->location_by_street}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Lingkungan</strong></p>
					<p>
						{{$land->environment}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Akta</strong></p>
					<p>
						{{($land->deed ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>PBB Terakhir</strong></p>
					<p>
						{{($land->lastest_pbb ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Asuransi</strong></p>
					<p>
						{{($land->insurance ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai PBB</strong></p>
					<p>
					{{$land->assessed->market_value->IDR()}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Likuidasi</strong></p>
					<p>
					{{$land->liquidation_value->IDR()}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Taksasi</strong></p>
					<p>
					{{$land->assessed->assess->IDR()}}
					</p>
				</div>
			</div>
		</div>
	@endforeach

	<div class="col-sm-12">
		@if(!empty($page_datas->credit->survey->collateral->buildings))
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Tanah & Bangunan</h4>
				</hr>
			</div>
		</div>
		@else
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Tanah & Bangunan</h4>
				</hr>
				<p>Belum ada jaminan</p>
			</div>
		</div>
		@endif
	</div>
	@foreach($page_datas->credit->survey->collateral->buildings as $building)
		<div class="col-sm-12">

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nama Pemilik</strong></p>
					<p>
						{{$building->name}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Alamat Pemilik</strong></p>
					<p>
						{{$building->address}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Sertifikat</strong></p>
					<p>
						{{($building->certification ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Luas Tanah</strong></p>
					<p>
						{{$building->surface_area}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Luas Bangunan</strong></p>
					<p>
						{{$building->building_area}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Fungsi Bangunan</strong></p>
					<p>
						{{$building->building_function}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Bentuk Bangunan</strong></p>
					<p>
						{{$building->building_shape}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Konstruksi Bangunan</strong></p>
					<p>
						{{$building->building_construction}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Lantai</strong></p>
					<p>
						{{$building->floor}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Tembok</strong></p>
					<p>
						{{$building->wall}}
					</p>
				</div>
			</div>


			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Listrik</strong></p>
					<p>
						{{$building->electricity}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Air</strong></p>
					<p>
						{{$building->water}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Telepon</strong></p>
					<p>
						{{($building->telephone ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>AC</strong></p>
					<p>
						{{($building->air_conditioner ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Tinggi Jalan</strong></p>
					<p>
						{{$building->road}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Lebar Jalan</strong></p>
					<p>
						{{$building->road_wide}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Letak Tanah</strong></p>
					<p>
						{{$building->location_by_street}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Lingkungan</strong></p>
					<p>
						{{$building->environment}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Akta</strong></p>
					<p>
						{{($building->deed ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>PBB Terakhir</strong></p>
					<p>
						{{($building->lastest_pbb ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Asuransi</strong></p>
					<p>
						{{($building->insurance ? 'Ada' : 'Tidak Ada' )}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai PBB</strong></p>
					<p>
					{{$building->assessed->market_value->IDR()}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Tanah</strong></p>
					<p>
					{{$building->land_value->IDR()}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Bangunan</strong></p>
					<p>
					{{$building->building_value->IDR()}}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Likuidasi</strong></p>
					<p>
					{{$building->liquidation_value->IDR()}}
					</p>
				</div>
				<div class="col-sm-6">
					<p style="margin-bottom: 7px;"><strong>Nilai Taksasi</strong></p>
					<p>
					{{$building->assessed->assess->IDR()}}
					</p>
				</div>
			</div>
		</div>
	@endforeach
	<div class="clearfix">&nbsp;</div>
</div>