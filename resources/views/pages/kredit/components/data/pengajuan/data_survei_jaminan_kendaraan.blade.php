@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-sm">Data Survei Jaminan Kendaraan</p>
	</div>
</div>

@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
	@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
		@php
			$i = 0;
		@endphp
		@foreach ($value['survei_jaminan_kendaraan'] as $k => $v)
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
					<p class="m-b-xs text-capitalize">
						@if ($i == 0)
							jaminan kendaraan {{ $key+1 }}
						@endif
						@php 
							$i++;
						@endphp
						@if (!empty($page_datas->credit['jaminan_kendaraan']))
							@if($edit == true)
								<span class="pull-right">
									<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.jaminan.kendaraan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_jaminan_kendaraan_id' => $v['id']]) }}" data-toggle="modal" data-target="#modal-delete">
										<i class="fa fa-trash" aria-hidden="true"></i>
										 Hapus
									</a> &nbsp;
									<a href="#" data-toggle="hidden" data-target="survei-jaminan-kendaraan-{{ $key }}-{{$k}}" data-panel="survei-jaminan" no-data-pjax>
										<i class="fa fa-pencil" aria-hidden="true"></i>
										 Edit
									</a>
								</span>
							@endif
						@endif
					</p>
					<hr class="m-t-xs m-b-xs"/>
					@if (isset($v['surveyor']) && !empty($v['surveyor']))
						@php
							$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($v['surveyor']['visas'], $acl_active_office);
						@endphp
						<p class="text-capitalize text-sm">disurvei {!!  $v['tanggal_survei'] . ' oleh ' . $v['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . $role . ' )</span></em>'  !!}
					@endif
				</div>
			</div>
			<div class="row p-t-lg">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info jaminan</strong></p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light m-b-xs">
						{{ (isset($value['merk']) && !is_null($value['merk'])) ? $value['merk'] : '-' }} ( Warna {{ (isset($value['warna']) && !is_null($value['warna'])) ? str_replace('_', ' ', $value['warna']) : '-'  }} )
					</p>
					<p class="text-capitalize text-light m-b-xs">
						Th. {{ (isset($value['tahun']) && !is_null($value['tahun'])) ? $value['tahun'] : '-' }}
						( {{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }} )
					</p>
					<p class="text-capitalize text-light m-b-md">
						{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
					</p>
				</div>
			</div>
			<div class="row p-t-lg">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info kendaraan</strong></p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						Fungsi sehari-hari
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['fungsi_sehari_hari']) && !is_null($value['fungsi_sehari_hari'])) ? str_replace('_', ' ', $value['fungsi_sehari_hari']) : '-' }} 
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						nomor rangka
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['nomor_rangka']) && !is_null($value['nomor_rangka'])) ? str_replace('_', ' ', $value['nomor_rangka']) : '-' }} 
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						nomor mesin
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['nomor_mesin']) && !is_null($value['nomor_mesin'])) ? str_replace('_', ' ', $value['nomor_mesin']) : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						nomor BPKB
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? str_replace('_', ' ', $value['nomor_bpkb']) : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						nomor polisi
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['nomor_polisi']) && !is_null($value['nomor_polisi'])) ? str_replace('_', ' ', $value['nomor_polisi']) : '-' }}
					</p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						status kepemilikan
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['status_kepemilikan']) && !is_null($value['status_kepemilikan'])) ? str_replace('_', ' ', $value['status_kepemilikan']) : '-' }} 
					</p>
				</div>
			</div>
			<div class="row p-t-lg">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>lain-lain</strong></p>
				</div>
			</div>
			<div class="row m-b-sm">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<p class="text-capitalize text-light">
						harga taksasi
					</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						{{ (isset($value['harga_taksasi']) && !is_null($value['harga_taksasi'])) ? str_replace('_', ' ', $value['harga_taksasi']) : '-' }} 
					</p>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
		@endforeach
	@empty
		@if ($page_datas->credit['status'] == 'pengajuan')
			<div class="row">
				<div class="col-sm-12">
					<p class="text-light">Maaf data belum tersedia, data akan tersedia setelah data disurvei</p>
				</div>
			</div>
		@else
			<!-- No data -->
			<div class="row m-b-md">
				<div class="col-sm-12">
					<p class="text-light">Belum ada data disimpan. <a href="#survei-jaminan-kendaraan" data-toggle="hidden" data-target="survei-jaminan-kendaraan" data-panel="survei-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		@endif
	@endforelse
	
	@if ((count($page_datas->credit['jaminan_kendaraan']) < 2) && (count($page_datas->credit['jaminan_kendaraan']) != 0))
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#" data-toggle="hidden" data-target="survei-jaminan-kendaraan" data-panel="survei-jaminan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Kendaraan</a>
			</div>
		</div>
	@endif
@else
	<!-- No data -->
	@if ($page_datas->credit['status'] == 'pengajuan')
		<div class="row">
			<div class="col-sm-12">
				<p class="text-light">Maaf data belum tersedia, data akan tersedia setelah data disurvei</p>
			</div>
		</div>
	@else
		<!-- No data -->
		<div class="row m-b-md">
			<div class="col-sm-12">
				<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="survei-jaminan-kendaraan" data-panel="survei-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endif
@endif

<div class="clearfix m-b-md">&nbsp;</div>