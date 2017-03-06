<?php
	if(!isset($edit)){
		$edit = true;
	}
?>

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Jaminan</h4>
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
		@if (!is_null($page_datas->credit->survey->collateral->vehicles))
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section m-t-none light">Kendaraan</h4>
			</div>
		</div>
		@else
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section m-t-none light">Kendaraan</h4>
				<p>Belum ada jaminan</p>
			</div>
		</div>
		@endif
	</div>

	@foreach($page_datas->credit->survey->collateral->vehicles as $vehicle)
	<div class="col-sm-12">

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Merk</strong></p>
				<p>
					{{ $vehicle->merk }}
				</p>
			</div>

			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Tipe</strong></p>
				<p>
					{{ $vehicle->type }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nomor Polisi</strong></p>
				<p>
					{{ $vehicle->police_number }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Warna</strong></p>
				<p>
					{{ $vehicle->color }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Tahun</strong></p>
				<p>
					{{ $vehicle->year }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nama Pemilik</strong></p>
				<p>
					{{ $vehicle->name }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Alamat Pemilik</strong></p>
				<p>
					{{ $vehicle->address }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nomor BPKB</strong></p>
				<p>
					{{ $vehicle->bpkb_number }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nomor Mesin</strong></p>
				<p>
					{{ $vehicle->machine_number }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nomor Rangka</strong></p>
				<p>
					{{ $vehicle->frame_number }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Masa Berlaku</strong></p>
				<p>
					{{ $vehicle->valid_until->format('d/m/Y') }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Fungsi</strong></p>
				<p>
					{{ $vehicle->functions }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Faktur Beli</strong></p>
				<p>
					{{ ($vehicle->invoice ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nota Beli</strong></p>
				<p>
					{{ ($vehicle->purchase_memo ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Kwitansi Beli</strong></p>
				<p>
					{{ ($vehicle->memo ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>KTP yang sesuai dengan BPKB</strong></p>
				<p>
					{{ ($vehicle->valid_ktp ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Kondisi Fisik</strong></p>
				<p>
					{{ ucwords(str_replace('_', ' ', $vehicle->physical_condition)) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Status Kepemilikan</strong></p>
				<p>
					{{ ucwords($vehicle->ownership_status) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Asuransi</strong></p>
				<p>
					{{ ($vehicle->insurance ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Harga Pasar</strong></p>
				<p>
					{{ $vehicle->assessed->market_value->IDR() }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Taksasi</strong></p>
				<p>
					{{ $vehicle->assessed->assess->IDR() }}
				</p>
			</div>
		</div>
	</div>
	@endforeach

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		@if(!is_null($page_datas->credit->survey->collateral->lands))
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section m-t-none light">Tanah</h4>
			</div>
		</div>
		@else
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section m-t-none light">Tanah</h4>
				<p>Belum ada jaminan</p>
			</div>
		</div>
		@endif
	</div>
	@foreach($page_datas->credit->survey->collateral->lands as $land)
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nama Pemilik</strong></p>
				<p>
					{{ $land->name }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Alamat Pemilik</strong></p>
				<p>
					{{ $land->address }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Sertifikat</strong></p>
				<p>
					{{($land->certification ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Luas Tanah</strong></p>
				<p>
					{{ $land->surface_area }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Tinggi Jalan</strong></p>
				<p>
					{{ ucwords($land->road) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Lebar Jalan</strong></p>
				<p>
					{{ $land->road_wide }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Letak Tanah</strong></p>
				<p>
					{{ ucwords($land->location_by_street) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Lingkungan</strong></p>
				<p>
					{{ ucwords($land->environment) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Akta</strong></p>
				<p>
					{{ ($land->deed ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>PBB Terakhir</strong></p>
				<p>
					{{ ($land->lastest_pbb ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Asuransi</strong></p>
				<p>
					{{ ($land->insurance ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai PBB</strong></p>
				<p>
					{{ $land->assessed->market_value->IDR() }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Likuidasi</strong></p>
				<p>
					{{ $land->liquidation_value->IDR() }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Taksasi</strong></p>
				<p>
					{{ $land->assessed->assess->IDR() }}
				</p>
			</div>
		</div>
	</div>
	@endforeach

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		@if(!is_null($page_datas->credit->survey->collateral->buildings))
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section m-t-none light">Tanah & Bangunan</h4>
			</div>
		</div>
		@else
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 class="title-section m-t-none light">Tanah & Bangunan</h4>
				<p>Belum ada jaminan</p>
			</div>
		</div>
		@endif
	</div>
	@foreach($page_datas->credit->survey->collateral->buildings as $building)
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nama Pemilik</strong></p>
				<p>
					{{ $building->name }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Alamat Pemilik</strong></p>
				<p>
					{{ $building->address }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Sertifikat</strong></p>
				<p>
					{{ ($building->certification ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Luas Tanah</strong></p>
				<p>
					{{ $building->surface_area }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Luas Bangunan</strong></p>
				<p>
					{{ $building->building_area }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Fungsi Bangunan</strong></p>
				<p>
					{{ $building->building_function }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Bentuk Bangunan</strong></p>
				<p>
					{{ $building->building_shape }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Konstruksi Bangunan</strong></p>
				<p>
					{{ $building->building_construction }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Lantai</strong></p>
				<p>
					{{ $building->floor }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Tembok</strong></p>
				<p>
					{{ $building->wall }}
				</p>
			</div>
		</div>


		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Listrik</strong></p>
				<p>
					{{ $building->electricity }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Air</strong></p>
				<p>
					{{ $building->water }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Telepon</strong></p>
				<p>
					{{ ($building->telephone ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>AC</strong></p>
				<p>
					{{ ($building->air_conditioner ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Tinggi Jalan</strong></p>
				<p>
					{{ $building->road }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Lebar Jalan</strong></p>
				<p>
					{{ $building->road_wide }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Letak Tanah</strong></p>
				<p>
					{{ $building->location_by_street }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Lingkungan</strong></p>
				<p>
					{{ $building->environment }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Akta</strong></p>
				<p>
					{{ ($building->deed ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>PBB Terakhir</strong></p>
				<p>
					{{ ($building->lastest_pbb ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Asuransi</strong></p>
				<p>
					{{ ($building->insurance ? 'Ada' : 'Tidak Ada' ) }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai PBB</strong></p>
				<p>
					{{ $building->assessed->market_value->IDR() }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Tanah</strong></p>
				<p>
					{{ $building->land_value->IDR() }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Bangunan</strong></p>
				<p>
					{{ $building->building_value->IDR() }}
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Likuidasi</strong></p>
				<p>
					{{ $building->liquidation_value->IDR() }}
				</p>
			</div>
			<div class="col-sm-6">
				<p class="p-b-sm"><strong>Nilai Taksasi</strong></p>
				<p>
					{{ $building->assessed->assess->IDR() }}
				</p>
			</div>
		</div>
	</div>
	@endforeach
	<div class="clearfix">&nbsp;</div>
</div>


@push('show_modals')
	@if($edit == true)

		<!-- Data jaminan // -->
		@component('components.modal', [
			'id' 		=> 'data_jaminan',
			'title'		=> 'Data Jaminan',
			'settings'	=> [
				'hide_buttons'	=> true
			]	
		])
			@include('pages.survey.components.form.data_jaminan')
		@endcomponent	

	@endif
@endpush