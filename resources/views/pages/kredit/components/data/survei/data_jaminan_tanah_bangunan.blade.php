@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Jaminan Tanah &amp; Bangunan</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
	@foreach ($page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-sm text-capitalize">
					jaminan tanah &amp; bangunan {{ $key+1 }}

					@if (!empty($page_datas->credit['jaminan_tanah_bangunan']))
						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="{{ route('survei.jaminan.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_jaminan_tanah_bangunan_id' => $value['id']]) }}" no-data-pjax>
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan-{{ $key }}" data-panel="data-jaminan" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-sm m-b-sm"/>
				<p class="text-capitalize text-sm">disurvei {!! (isset($value['survei']) && !empty($value['survei'])) ? $value['survei']['tanggal_survei'] . ' oleh ' . $value['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $value['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
			</div>
		</div>
		<div class="row p-t-lg">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info jaminan</strong></p>
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
					{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}  
					( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-'  }} )
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
					{{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? $value['nomor_sertifikat'] : '-'  }}
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
					{{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? $value['masa_berlaku_sertifikat'] : '-'  }}
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
					{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-'  }}
				</p>
			</div>
		</div>
	
		<div class="row p-t-lg">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info {{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }} </strong></p>
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
					{{ (isset($value['fungsi_bangunan']) && !is_null($value['fungsi_bangunan'])) ? str_replace('_', ' ', $value['fungsi_bangunan']) : '-'  }}
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
					{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
					{{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup> 
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
					{{ (isset($value['bentuk_bangunan']) && !is_null($value['bentuk_bangunan'])) ? str_replace('_', ' ', $value['bentuk_bangunan']) : '-'  }}
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
					{{ (isset($value['konstruksi_bangunan']) && !is_null($value['konstruksi_bangunan'])) ? str_replace('_', ' ', $value['konstruksi_bangunan']) : '-'  }}
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
					{{ (isset($value['lantai_bangunan']) && !is_null($value['lantai_bangunan'])) ? str_replace('_', ' ', $value['lantai_bangunan']) : '-'  }}
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
					{{ (isset($value['dinding_bangunan']) && !is_null($value['dinding_bangunan'])) ? str_replace('_', ' ', $value['dinding_bangunan']) : '-'  }}
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
					{{ (isset($value['alamat']['alamat']) && !is_null($value['alamat']['alamat'])) ? $value['alamat']['alamat'] : '' }}
					RT {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }} / RW {{ isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-' }} <br/>
					{{ (isset($value['alamat']['desa']) && !is_null($value['alamat']['desa'])) ? $value['alamat']['desa'] : '' }} 
					{{ (isset($value['alamat']['distrik']) && !is_null($value['alamat']['distrik'])) ? $value['alamat']['distrik'] .'<br/>' : '' }}
					{{ (isset($value['alamat']['regensi']) && !is_null($value['alamat']['regensi'])) ? $value['alamat']['regensi'] : '' }} - 
					{{ (isset($value['alamat']['provinsi']) && !is_null($value['alamat']['provinsi'])) ? $value['alamat']['provinsi'] : '' }} - 
					{{ (isset($value['alamat']['negara']) && !is_null($value['alamat']['negara'])) ? $value['alamat']['negara'] : '' }}
				</p>
			</div>
		</div>
		<div class="row p-t-lg">
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
					{{ (isset($value['listrik']) && !is_null($value['listrik'])) ? str_replace('_', ' ', $value['listrik']) : '-'  }}
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
					{{ (isset($value['air']) && !is_null($value['air'])) ? str_replace('_', ' ', $value['air']) : '-'  }}
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
					{{ (isset($value['jalan']) && !is_null($value['jalan'])) ? str_replace('_', ' ', $value['jalan']) : '-'  }}
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
					{{ (isset($value['lebar_jalan']) && !is_null($value['lebar_jalan'])) ? str_replace('_', ' ', $value['lebar_jalan']) : '-'  }}
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
					{{ (isset($value['letak_lokasi_terhadap_jalan']) && !is_null($value['letak_lokasi_terhadap_jalan'])) ? str_replace('_', ' ', $value['letak_lokasi_terhadap_jalan']) : '-'  }}
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
					{{ (isset($value['lingkungan']) && !is_null($value['lingkungan'])) ? str_replace('_', ' ', $value['lingkungan']) : '-'  }}
				</p>
			</div>
		</div>

		<div class="row p-t-lg">
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
					{{ (isset($value['nilai_jaminan']) && !is_null($value['nilai_jaminan'])) ? str_replace('_', ' ', $value['nilai_jaminan']) : '-'  }}
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
					{{ (isset($value['taksasi_tanah']) && !is_null($value['taksasi_tanah'])) ? str_replace('_', ' ', $value['taksasi_tanah']) : '-'  }}
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
					{{ (isset($value['taksasi_bangunan']) && !is_null($value['taksasi_bangunan'])) ? str_replace('_', ' ', $value['taksasi_bangunan']) : '-'  }}
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
					{{ (isset($value['njop']) && !is_null($value['njop'])) ? str_replace('_', ' ', $value['njop']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					uraian
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? str_replace('_', ' ', $value['uraian']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@endforeach

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-jaminan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Tanah &amp; Bangunan</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-jaminan" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>