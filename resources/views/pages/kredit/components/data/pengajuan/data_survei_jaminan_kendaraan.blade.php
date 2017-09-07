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

@forelse((array)$page_datas->credit['jaminan_kendaraan'] as $key => $value)
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
			<p class="m-b-xs text-capitalize text-sm">
				data jaminan kendaraan {{ $key+1 }}
			</p>
		</div>
	</div>
	<p class="text-capitalize text-light m-b-xs">
		{{ (isset($value['merk']) && !is_null($value['merk'])) ? $value['merk'] : '-' }} 
		Th. {{ (isset($value['tahun']) && !is_null($value['tahun'])) ? $value['tahun'] : '-' }}
		({{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }})
	</p>
	
	<p class="text-capitalize text-light m-b-xs">
		No. BPKB {{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? $value['nomor_bpkb'] : '-' }}
	</p>

	<p class="text-capitalize text-light m-b-md">
		{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
	</p>

	@forelse ((array)$value['survei_jaminan_kendaraan'] as $k => $v)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					<span class="text-sm">hasil survei {{ $k+1 }}</span>
					@if (!empty($page_datas->credit['jaminan_kendaraan']))
						@if($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.jaminan.kendaraan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_jaminan_kendaraan_id' => $v['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" class="button-edit" data-toggle="hidden" data-target="survei-jaminan-kendaraan-{{ $key }}-{{$k}}" data-panel="survei-jaminan" data-flag="data-survei-jaminan-kendaraan" data-index="{{ $key }}" data-index-child="{{ $k }}" no-data-pjax>
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
		<div class="row p-t-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info jaminan</strong></p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['merk']) && !is_null($v['merk'])) ? $v['merk'] : '-' }} ( Warna {{ (isset($v['warna']) && !is_null($v['warna'])) ? str_replace('_', ' ', $v['warna']) : '-'  }} )
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Th. {{ (isset($v['tahun']) && !is_null($v['tahun'])) ? $v['tahun'] : '-' }}
					( {{ (isset($v['tipe']) && !is_null($v['tipe'])) ? str_replace('_', ' ', $v['tipe']) : '-' }} )
				</p>
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($v['atas_nama']) && !is_null($v['atas_nama'])) ? $v['atas_nama'] : '-' }}
				</p>
				<p class="text-capitalize text-light m-b-md">
					@foreach ($v['alamat'] as $k2 => $v2)
						@if ($k2 == 0)
							{{ (isset($v2['alamat']) && !is_null($v2['alamat'])) ? $v2['alamat'] : '' }} <br/>
							RT {{ (isset($v2['rt']) ? $v2['rt'] : '-') }} / RW {{ isset($v2['rw']) ? $v2['rw'] : '-' }} <br/>
							<span class="text-uppercase">
								{{ (isset($v2['desa']) && !is_null($v2['desa'])) ? $v2['desa'] : '' }} -
								{{ (isset($v2['distrik']) && !is_null($v2['distrik'])) ? $v2['distrik']  : '' }} <br/>
								{{ (isset($v2['regensi']) && !is_null($v2['regensi'])) ? $v2['regensi'] : '' }} - 
								jawa timur <br/>
								{{ (isset($v2['negara']) && !is_null($v2['negara'])) ? $v2['negara'] : '' }}
							</span>
						@endif
					@endforeach
				</p>
			</div>
		</div>
		<div class="row p-t-md">
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
					{{ (isset($v['fungsi_sehari_hari']) && !is_null($v['fungsi_sehari_hari'])) ? str_replace('_', ' ', $v['fungsi_sehari_hari']) : '-' }} 
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
					{{ (isset($v['nomor_rangka']) && !is_null($v['nomor_rangka'])) ? str_replace('_', ' ', $v['nomor_rangka']) : '-' }} 
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
					{{ (isset($v['nomor_mesin']) && !is_null($v['nomor_mesin'])) ? str_replace('_', ' ', $v['nomor_mesin']) : '-' }}
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
					{{ (isset($v['nomor_bpkb']) && !is_null($v['nomor_bpkb'])) ? str_replace('_', ' ', $v['nomor_bpkb']) : '-' }}
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
					{{ (isset($v['nomor_polisi']) && !is_null($v['nomor_polisi'])) ? str_replace('_', ' ', $v['nomor_polisi']) : '-' }}
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
					{{ (isset($v['status_kepemilikan']) && !is_null($v['status_kepemilikan'])) ? str_replace('_', ' ', $v['status_kepemilikan']) : '-' }} 
				</p>
			</div>
		</div>
		<div class="row p-t-md">
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
					{{ (isset($v['harga_taksasi']) && !is_null($v['harga_taksasi'])) ? str_replace('_', ' ', $v['harga_taksasi']) : '-' }} 
				</p>
			</div>
		</div>
		<!-- No data -->
		<div class="row m-t-md">
			<div class="col-sm-12">
				<p class="text-light">
					<a href="#" data-toggle="hidden" data-target="survei-jaminan-kendaraan-{{ $key }}--1" data-panel="survei-jaminan" onClick="initJaminanKendaraan();" no-data-pjax> 
						<i class="fa fa-plus"></i> Tambahkan Survei 
					</a>
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
		<!-- No data -->
		<div class="row m-b-md">
			<div class="col-sm-12">
				<p class="text-light">Belum ada data survei disimpan. <a href="#" data-toggle="hidden" data-target="survei-jaminan-kendaraan-{{ $key }}--1" data-panel="survei-jaminan" onClick="initJaminanKendaraan();" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endforelse

	@if (count($page_datas->credit['jaminan_kendaraan']) - 1 != $key)
		<hr class="m-b-md">
	@endif
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
				<p class="text-light">Tidak ada jaminan kendaraan</p>
			</div>
		</div>
	@endif
@endforelse

<div class="clearfix m-b-md">&nbsp;</div>