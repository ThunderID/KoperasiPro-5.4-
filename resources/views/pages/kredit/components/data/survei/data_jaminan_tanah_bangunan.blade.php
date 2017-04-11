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
				<p class="m-b-sm text-uppercase">
					jaminan tanah &amp; bangunan {{ $key+1 }}

					@if (!empty($page_datas->credit['jaminan_tanah_bangunan']))
						@if ($edit == true)
							<span class="pull-right text-capitalize">
								<a class="text-danger" href="{{ route('survei.jaminan.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_jaminan_tanah_bangunan_id' => $value['id']]) }}" no-data-pjax>
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
				<p class="text-capitalize text-right text-sm">disurvei {!! (isset($value['survei']) && !empty($value['survei'])) ? $value['survei']['tanggal_survei'] . ' oleh ' . $value['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $value['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light">
					{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? $value['tipe'] : '-' }} - 
					( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-'  }} )
				</p>
				<p class="text-capitalize text-light">
					{{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? str_replace('_', ' ', $value['nomor_sertifikat']) : '-'  }}
				</p>
				<p class="text-capitalize text-light">
					Berlaku sampai {{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? str_replace('_', ' ', $value['masa_berlaku_sertifikat']) : '-'  }}
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? str_replace('_', ' ', $value['atas_nama']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light">
					{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / {{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup>
				</p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 10px;"><em>( luas bangunan / luas tanah )</em></p>
			</div>
		</div>
		<div class="row">
			@php $i=0; @endphp
			
			{{-- foreach data --}}
			@foreach ($value as $k => $v)
				{{-- remove field agar tidak ditampilkan --}}
				@if (!in_array($k, ['id', 'survei_id', 'alamat_id']))
					{{-- check ketika data 2 kasih row baru --}}
					@if ($i % 2 == 0)
						</div>
						<div class="row">
					@endif
					
					<div class="col-sm-6">
						<div class="row m-b-lg">
							<div class="col-sm-12">
								<p class="m-b-xs"><strong>{{ ucwords(str_replace('_', ' ', $k)) }}</strong></p>
								<p class="text-capitalize">
									@if ($k == 'survei')
										{{ $v['tanggal_survei'] }} oleh {{ $v['petugas']['nama'] }} (<span class="text-muted"> {{ $v['petugas']['role'] }} </span>)
									@elseif ($k == 'alamat')
										{{ $v['alamat'] }} <br/>
										RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} {{ $v['desa'] }} {{ $v['distrik'] }} <br/>
										{{ $v['regensi'] }} - {{ $v['provinsi'] }} - {{ $v['negara'] }}
									@else
										{{ str_replace('_', ' ', $v) }}
									@endif
								</p>
							</div>
						</div>
					</div>

					@php $i++; @endphp
				@endif
			@endforeach
		</div>
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