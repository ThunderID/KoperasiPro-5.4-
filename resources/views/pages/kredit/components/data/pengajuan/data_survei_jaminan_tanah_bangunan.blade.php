@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-sm">Data Survei Jaminan Tanah &amp; Bangunan</p>
	</div>
</div>

@forelse((array)$page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
			<p class="m-b-xs text-capitalize text-sm">
				data jaminan tanah &amp; bangunan {{ $key+1 }}
			</p>
		</div>
	</div>

	<p class="text-capitalize text-light m-b-xs">
		{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
		<span> ( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-' }} )</span>
	</p>
	<p class="text-capitalize text-light m-b-xs">
		No. Sertifikat {{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? $value['nomor_sertifikat'] : '-' }}
	</p>
	<p class="text-capitalize text-light m-b-xs">
		{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
		{{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup> 
		<span class="text-capitalize text-muted" style="font-size: 11px;"><em>( bangunan / tanah )</em></span>
	</p>
	<p class="text-capitalize text-light m-b-xs">
		{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
	</p>
	<p class="text-capitalize text-light m-b-xs">
		@foreach ($value['alamat'] as $k => $v)
			@if ($k == 0)
				{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }} <br/>
				RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
				<span class="text-uppercase">
					{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} -
					{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik']  : '' }} <br/>
					{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
					jawa timur <br/>
					{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
				</span>
			@endif
		@endforeach
	</p>
	<p class="text-capitalize text-light m-b-lg">
		Sertifikat berlaku sampai th. {{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? $value['masa_berlaku_sertifikat'] : '-' }}
	</p>

	@forelse($value['survei_jaminan_tanah_bangunan'] as $k => $v)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize text-sm">
					Hasil survei {{ $k+1 }}

					@if ($edit == true)
						<span class="pull-right">
							<a class="text-danger text-sm m-r-md" href="#" data-url="{{ route('survei.jaminan.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_jaminan_tanah_bangunan_id' => $v['id']]) }}" data-toggle="modal" data-target="#modal-delete">
								<i class="fa fa-trash" aria-hidden="true"></i>
								 Hapus
							</a> &nbsp;
							<a href="#" class="button-edit text-sm" data-toggle="hidden" data-target="survei-jaminan-tanah-bangunan-{{ $key }}-{{$k}}" data-panel="survei-jaminan" data-flag="data-survei-jaminan-tanah-bangunan" data-index="{{ $key }}" data-index-child="{{ $k }}" no-data-pjax>
								<i class="fa fa-pencil" aria-hidden="true"></i>
								 Edit
							</a>
						</span>
					@endif
				</p>
				<hr class="m-t-xs m-b-xs"/>
				@if(isset($v['surveyor']) && !empty($v['surveyor']))
					@php
						$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($v['surveyor']['visas'], $acl_active_office);
					@endphp
					<p class="text-capitalize text-sm">disurvei {!!  $v['tanggal_survei'] . ' oleh ' . $v['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . $role . ' )</span></em>'  !!}
				@endif
			</div>
		</div>
		<div class="row p-t-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-xs m-b-xs text-capitalize text-sm"><strong>info jaminan</strong></p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					tipe
				</p>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light">
					{{ (isset($v['tipe']) && !is_null($v['tipe'])) ? str_replace('_', ' ', $v['tipe']) : '-' }}  
					( {{ (isset($v['jenis_sertifikat']) && !is_null($v['jenis_sertifikat'])) ? str_replace('_', ' ', $v['jenis_sertifikat']) : '-'  }} )
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					no. sertifikat
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['nomor_sertifikat']) && !is_null($v['nomor_sertifikat'])) ? $v['nomor_sertifikat'] : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					Masa Berlaku sampai
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['masa_berlaku_sertifikat']) && !is_null($v['masa_berlaku_sertifikat'])) ? $v['masa_berlaku_sertifikat'] : '-'  }}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					atas nama
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['atas_nama']) && !is_null($v['atas_nama'])) ? $v['atas_nama'] : '-'  }}
				</p>
			</div>
		</div>
	
		<div class="row p-t-sm">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info {{ (isset($v['tipe']) && !is_null($v['tipe'])) ? str_replace('_', ' ', $v['tipe']) : '-' }} </strong></p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					fungsi bangunan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['fungsi_bangunan']) && !is_null($v['fungsi_bangunan'])) ? str_replace('_', ' ', $v['fungsi_bangunan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					luas
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['luas_bangunan']) && !is_null($v['luas_bangunan'])) ? str_replace('_', ' ', $v['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
					{{ (isset($v['luas_tanah']) && !is_null($v['luas_tanah'])) ? str_replace('_', ' ', $v['luas_tanah']) : '-'  }} M<sup>2</sup> 
					<span class="text-capitalize text-muted" style="font-size: 11px;"><em>( bangunan / tanah )</em></span>
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					bentuk bangunan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['bentuk_bangunan']) && !is_null($v['bentuk_bangunan'])) ? str_replace('_', ' ', $v['bentuk_bangunan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					konstruksi bangunan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['konstruksi_bangunan']) && !is_null($v['konstruksi_bangunan'])) ? str_replace('_', ' ', $v['konstruksi_bangunan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					lantai bangunan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['lantai_bangunan']) && !is_null($v['lantai_bangunan'])) ? str_replace('_', ' ', $v['lantai_bangunan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					dinding bangunan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['dinding']) && !is_null($v['dinding'])) ? str_replace('_', ' ', $v['dinding']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					alamat
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
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
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info umum</strong></p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					listrik
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['listrik']) && !is_null($v['listrik'])) ? str_replace('_', ' ', $v['listrik']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					air
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-uppercase text-light">
					{{ (isset($v['air']) && !is_null($v['air'])) ? str_replace('_', ' ', $v['air']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					jalan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['jalan']) && !is_null($v['jalan'])) ? str_replace('_', ' ', $v['jalan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					lebar jalan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['lebar_jalan']) && !is_null($v['lebar_jalan'])) ? str_replace('_', ' ', $v['lebar_jalan']) : '-'  }} M
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					letak lokasi terhadap jalan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['letak_lokasi_terhadap_jalan']) && !is_null($v['letak_lokasi_terhadap_jalan'])) ? str_replace('_', ' ', $v['letak_lokasi_terhadap_jalan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					lingkungan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['lingkungan']) && !is_null($v['lingkungan'])) ? str_replace('_', ' ', $v['lingkungan']) : '-'  }}
				</p>
			</div>
		</div>

		<div class="row p-t-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>lain-lain</strong></p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					nilai jaminan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['nilai_jaminan']) && !is_null($v['nilai_jaminan'])) ? str_replace('_', ' ', $v['nilai_jaminan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					taksasi tanah
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['taksasi_tanah']) && !is_null($v['taksasi_tanah'])) ? str_replace('_', ' ', $v['taksasi_tanah']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					taksasi bangunan
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['taksasi_bangunan']) && !is_null($v['taksasi_bangunan'])) ? str_replace('_', ' ', $v['taksasi_bangunan']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					njop
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['njop']) && !is_null($v['njop'])) ? str_replace('_', ' ', $v['njop']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					PBB Terakhir
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['pbb_terakhir']) && !is_null($v['pbb_terakhir'])) ? str_replace('_', ' ', $v['pbb_terakhir']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					harga taksasi
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['harga_taksasi']) && !is_null($v['harga_taksasi'])) ? str_replace('_', ' ', $v['harga_taksasi']) : '-'  }}
				</p>
			</div>
		</div>
		{{-- <div class="row m-b-sm">
			<div class="col-xs-12 col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					Gambar Pendukung
				</p>
				<div class="img-responsive">
					{{ (isset($v['njop']) && !is_null($v['njop'])) ? str_replace('_', ' ', $v['njop']) : '-'  }}
				</div>
			</div>
		</div> --}}
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					uraian
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($v['uraian']) && !is_null($v['uraian'])) ? str_replace('_', ' ', $v['uraian']) : '-'  }}
				</p>
			</div>
		</div>
		<!-- No data -->
		<div class="row m-t-md">
			<div class="col-sm-12">
				<p class="text-light text-sm">
					<a href="#" data-toggle="hidden" data-target="survei-jaminan-tanah-bangunan-{{ $key }}--1" data-panel="survei-jaminan" onClick="initJaminanTanahBangunan();" no-data-pjax>
						<i class="fa fa-plus"></i> Tambahkan Survei 
					</a>
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
		<div class="row m-b-md">
			<div class="col-sm-12">
				<p class="text-light">Belum ada data survei disimpan. <a href="#" data-toggle="hidden" data-target="survei-jaminan-tanah-bangunan-{{$key}}--1" data-panel="survei-jaminan" no-data-pjax onClick="initJaminanTanahBangunan();"> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endforelse

	@if (count($page_datas->credit['jaminan_tanah_bangunan']) - 1 != $key)
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
				<p class="text-light">Tidak ada jaminan tanah dan bangunan</p>
			</div>
		</div>
	@endif

@endforelse

<div class="clearfix m-b-md">&nbsp;</div>