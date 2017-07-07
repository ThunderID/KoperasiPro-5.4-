@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-sm">Data Keluarga</p>
	</div>
</div>

@if (isset($page_datas->credit['debitur']['relasi']) && !empty($page_datas->credit['debitur']['relasi']))
	@forelse ($page_datas->credit['debitur']['relasi'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-md text-capitalize">
					@if (!empty($page_datas->credit['debitur']['relasi']))
						{{ (isset($value['pivot']['hubungan']) && !is_null($value['pivot']['hubungan'])) ? str_replace('_', ' ', $value['pivot']['hubungan']) : '-'  }}

						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('debitur.relasi.destroy', ['kredit_id' => $page_datas->credit['id'], 'relasi_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['nama']) && !is_null($value['nama'])) ? $value['nama'] : '-' }}
				</p>
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['alamat']['alamat']) && !is_null($page_datas->credit['debitur']['alamat']['alamat'])) ? $page_datas->credit['debitur']['alamat']['alamat'] : '' }}
					RT {{ (isset($page_datas->credit['debitur']['alamat']['rt']) ? $page_datas->credit['debitur']['alamat']['rt'] : '-') }} / RW {{ isset($page_datas->credit['debitur']['alamat']['rw']) ? $page_datas->credit['debitur']['alamat']['rw'] : '-' }}
					{{ (isset($page_datas->credit['debitur']['alamat']['desa']) && !is_null($page_datas->credit['debitur']['alamat']['desa'])) ? $page_datas->credit['debitur']['alamat']['desa'] : '' }} 
					{!! (isset($page_datas->credit['debitur']['alamat']['distrik']) && !is_null($page_datas->credit['debitur']['alamat']['distrik'])) ? $page_datas->credit['debitur']['alamat']['distrik']  .' <br/>' : '' !!}
					{!! (isset($page_datas->credit['debitur']['alamat']['regensi']) && !is_null($page_datas->credit['debitur']['alamat']['regensi'])) ? $page_datas->credit['debitur']['alamat']['regensi'] . ', ': '' !!}
					{{ (isset($page_datas->credit['debitur']['alamat']['provinsi']) && !is_null($page_datas->credit['debitur']['alamat']['provinsi'])) ? $page_datas->credit['debitur']['alamat']['provinsi'] : '' }} - 
					{{ (isset($page_datas->credit['debitur']['alamat']['negara']) && !is_null($page_datas->credit['debitur']['alamat']['negara'])) ? $page_datas->credit['debitur']['alamat']['negara'] : '' }}
				</p>
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['telepon']) && !is_null($value['telepon'])) ? $value['telepon'] : '-' }}
				</p>
			</div>
		</div>
	@empty
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="keluarga" data-panel="data-pribadi" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endforelse

	@if (count($page_datas->credit['debitur']['relasi']) > 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#" data-toggle="hidden" data-target="keluarga" data-panel="data-pribadi" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Keluarga</a>
			</div>
		</div>
	@endif
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. <a href="#keluarga" data-toggle="hidden" data-target="keluarga" data-panel="data-pribadi" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif