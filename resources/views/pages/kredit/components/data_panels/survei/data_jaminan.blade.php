<?php
	if(!isset($edit)){
		$edit = true;
	}
?>


@if(isset($page_datas->credit['jaminan']['kendaraan']))

	{{-- 
	--}}
	@foreach($page_datas->credit['jaminan']['tanah_bangunan'] as $key => $tanah_bangunan) 
	<?php
		// $kendaraan = $page_datas->credit['jaminan']['kendaraan'][0];
	?>

	<div class="row">
		<div class="col-sm-12">
			<h4 class="text-uppercase">Data Jaminan Kendaraan {{ $key+1 }}
				@if($edit == true)
					<span class="pull-right">
						<small>
							<a href="#data-jaminan-kendaraan" data-toggle="modal" data-target="#data_jaminan_kendaraan_{{ $key }}" no-data-pjax>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								Edit
							</a>
						</small>
					</span>
				@endif
			</h4>
			<hr/>
		</div>
	</div>

	<div class="row">

		{{-- 
			<div class="col-sm-12">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<h4 class="m-t-none title-section light">
							Kendaraan {{ $key + 1 }}  
						</h4>
					</div>
				</div>
			</div>		
		--}}


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
						{{ $kendaraan['legal']['atas_nama'] }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Alamat</strong></p>
					<p>
						{{ $kendaraan['legal']['alamat'] }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Nomor Polisi</strong></p>
					<p>
						{{ $kendaraan['legal']['nomor_polisi'] }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Nomor BPKB</strong></p>
					<p>
						{{ $kendaraan['legal']['no_bpkb'] }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Nomor Mesin</strong></p>
					<p>
						{{ $kendaraan['legal']['no_mesin'] }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Nomor Rangka</strong></p>
					<p>
						{{ $kendaraan['legal']['no_rangka'] }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Masa Berlaku</strong></p>
					<p>
						{{ Carbon\Carbon::parse($kendaraan['legal']['masa_berlaku_stnk'])->format('d/m/Y') }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Faktur Beli</strong></p>
					<p>
						{{ ($kendaraan['legal']['faktur'] ? 'Ada' : 'Tidak Ada' ) }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Kuitansi Jual Beli</strong></p>
					<p>
						{{ ($kendaraan['legal']['kuitansi_jual_beli'] ? 'Ada' : 'Tidak Ada' ) }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Kuitansi Kosong BPKB</strong></p>
					<p>
						{{ ($kendaraan['legal']['kuitansi_kosong_bpkb'] ? 'Ada' : 'Tidak Ada' ) }}
					</p>
				</div>
			</div>
				
			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>KTP yang sesuai dengan BPKB</strong></p>
					<p>
						{{ ($kendaraan['legal']['ktp_bpkb'] ? 'Ada' : 'Tidak Ada' ) }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Status Kepemilikan</strong></p>
					<p>
						{{ ucwords(str_replace('_', ' ', $kendaraan['legal']['status_kepemilikan'])) }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Fungsi</strong></p>
					<p>
						{{ ucwords(str_replace('_', ' ', $kendaraan['nilai']['fungsi'])) }}
					</p>
				</div>
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Kondisi Fisik</strong></p>
					<p>
						{{ ucwords($kendaraan['nilai']['kondisi']) }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Asuransi</strong></p>
					<p>
						{{ ($kendaraan['nilai']['asuransi'] ? 'Ada' : 'Tidak Ada' ) }}
					</p>
				</div>
			</div>

			<div class="row m-b-xl">
				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Nilai Taksasi</strong></p>
					<p>
						{{ $kendaraan['nilai']['harga_taksasi'] }}
					</p>
				</div>

				<div class="col-sm-6">
					<p class="p-b-sm"><strong>Nilai Bank</strong></p>
					<p>
						{{ $kendaraan['nilai']['harga_bank'] }}
					</p>
				</div>
			</div>

		</div>
	{{-- 
	--}}
	@endforeach 

</div>
@elseif(isset($page_datas->credit['jaminan']['tanah_bangunan']))

	{{-- 
	--}}
	@foreach($page_datas->credit['jaminan']['tanah_bangunan'] as $key => $tanah_bangunan) 
	<?php
		// $tanah_bangunan = $page_datas->credit['jaminan']['tanah_bangunan'][0];
	?>

		<div class="row">
			<div class="col-sm-12">
				<h4 class="text-uppercase">Data Jaminan Tanah Bangunan {{ $key+1 }}
					@if($edit == true)
						<span class="pull-right">
							<small>
								<a href="#data-jaminan-tnb" data-toggle="modal" data-target="#data_jaminan_tnb_{{$key}}" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									Edit
								</a>
							</small>
						</span>
					@endif
				</h4>
				<hr/>
			</div>
		</div>

		<div class="row">

			{{-- 
			<div class="col-sm-12">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<h4 class="m-t-none title-section light">
							Tanah/Bangunan {{ $key + 1 }}  
						</h4>
					</div>
				</div>
			</div>
			--}}

			<div class="col-sm-12">
				<div class="row m-b-xl">
					<div class="col-sm-6">
						<p class="p-b-sm"><strong>Tipe Jaminan</strong></p>
						<p>
							{{ strtoupper(str_replace('_', ' ', $tanah_bangunan['tipe_jaminan'])) }}
						</p>
					</div>

					<div class="col-sm-6">
						<p class="p-b-sm"><strong>Panjang</strong></p>
						<p>
							{{ $tanah_bangunan['tanah']['panjang'] }} M
						</p>
					</div>
				</div>

				<div class="row m-b-xl">
					<div class="col-sm-6">
						<p class="p-b-sm"><strong>Lebar</strong></p>
						<p>
							{{ $tanah_bangunan['tanah']['lebar'] }} M
						</p>
					</div>
					<div class="col-sm-6">
						<p class="p-b-sm"><strong>Luas</strong></p>
						<p>
							{{ $tanah_bangunan['tanah']['luas'] }} M<sup>2</sup>
						</p>
					</div>
				</div>			

			</div>
		</div>
	{{-- 
	--}}
	@endforeach 

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
	@if($edit == true)
		@if(isset($page_datas->credit['jaminan']['kendaraan']))
			@foreach($page_datas->credit['jaminan']['kendaraan'] as $key => $kendaraan) 

				<!-- Data jaminan kendaraan // -->
				@component('components.modal', [
					'id' 		=> 'data_jaminan_kendaraan_' . $key,
					'title'		=> 'Data Jaminan Kredit '. ($key + 1),
					'settings'	=> [
						'hide_buttons'	=> true
					]	
				])
					@include('pages.kredit.components.form.survei.data_jaminan_kendaraan', [
						'id' 			=> $key,
						'id_kredit'	 	=> $page_datas->credit['id'],
						'kendaraan' 	=> $kendaraan
					])
				@endcomponent

			@endforeach
		@elseif(isset($page_datas->credit['jaminan']['tanah_bangunan']))
			@foreach($page_datas->credit['jaminan']['tanah_bangunan'] as $key => $tanah_bangunan) 

				<!-- Data jaminan Tanah Bangunan // -->
				@component('components.modal', [
					'id' 		=> 'data_jaminan_tnb_' . $key,
					'title'		=> 'Data Jaminan Tanah & Bangunan '. ($key + 1) ,
					'settings'	=> [
						'hide_buttons'	=> true
					]	
				])
					@include('pages.kredit.components.form.survei.data_jaminan_tnb', [
						'id' 			 => $key,
						'id_kredit'		 => $page_datas->credit['id'],
						'tanah_bangunan' => $tanah_bangunan
					])
				@endcomponent

			@endforeach
		@endif
	@endif
@endpush