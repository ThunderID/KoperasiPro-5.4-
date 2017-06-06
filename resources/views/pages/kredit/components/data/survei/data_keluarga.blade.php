@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data keluarga</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['kreditur']['relasi']) && !empty($page_datas->credit['kreditur']['relasi']))
	@foreach ($page_datas->credit['kreditur']['relasi'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-md text-capitalize">
					keluarga {{ $key+1 }}

					@if (!empty($page_datas->credit['kreditur']['relasi']))
						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('kreditur.relasi.destroy', ['kredit_id' => $page_datas->credit['id'], 'relasi_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a>&nbsp;
								<a href="#" data-toggle="hidden" data-target="keluarga-{{ $key }}" data-panel="data-keluarga" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-sm m-b-sm"/>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					Nama
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light">
					{{ (isset($value['nama']) && !is_null($value['nama'])) ? $value['nama'] : '-' }}
					( {{ (isset($value['hubungan']) && !is_null($value['hubungan'])) ? str_replace('_', ' ', $value['hubungan']) : '-'  }} )
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					No. Telepon
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light">
					{{ (isset($value['telepon']) && !is_null($value['telepon'])) ? $value['telepon'] : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					alamat
				</p>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<p class="text-capitalize text-light">
					{{ (isset($value['alamat']['alamat']) && !is_null($value['alamat']['alamat'])) ? $value['alamat']['alamat'] : '' }}
					RT {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }} / RW {{ isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-' }}
					{{ (isset($value['alamat']['desa']) && !is_null($value['alamat']['desa'])) ? $value['alamat']['desa'] : '' }} 
					{!! (isset($value['alamat']['distrik']) && !is_null($value['alamat']['distrik'])) ? $value['alamat']['distrik'] : '' !!}
					{!! (isset($value['alamat']['regensi']) && !is_null($value['alamat']['regensi'])) ? $value['alamat']['regensi'] . ' <br/> ': '' !!}
					{{ (isset($value['alamat']['provinsi']) && !is_null($value['alamat']['provinsi'])) ? $value['alamat']['provinsi'] : '' }} - 
					{{ (isset($value['alamat']['negara']) && !is_null($value['alamat']['negara'])) ? $value['alamat']['negara'] : '' }}
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@endforeach

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#" data-toggle="hidden" data-target="keluarga" data-panel="data-keluarga" no-data-pjax><i class="fa fa-plus"></i> Tambahkan keluarga</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. <a href="#keluarga" data-toggle="hidden" data-target="keluarga" data-panel="data-keluarga" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>