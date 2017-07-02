@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset Tanah &amp; Bangunan</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['survei_aset_tanah_bangunan']) && !empty($page_datas->credit['survei_aset_tanah_bangunan']))
	@foreach ($page_datas->credit['survei_aset_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-md text-capitalize">
					aset tanah &amp; bangunan {{ $key+1 }}

					@if(!empty($page_datas->credit['survei_aset_tanah_bangunan']))
						@if($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.aset.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_aset_tanah_bangunan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;

								<a href="#aset-tanah-bangunan" data-toggle="hidden" data-target="aset-tanah-bangunan-{{ $key }}" data-panel="data-aset" no-data-pjax>
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
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }} - 
					{{ (isset($value['luas']) && !is_null($value['luas'])) ? str_replace('_', ' ', $value['luas']) : '0' }} M<sup>2</sup>
				</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
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
		<div class="clearfix">&nbsp;</div>
	@endforeach
@else
	<!-- No data -->
	<div class="row m-b-md">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. </p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>