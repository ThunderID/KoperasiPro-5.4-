@php
	if (!isset($edit)){
		$edit = true;
	}
	// dd($page_datas->credit);
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-md m-b-sm"><u>Informasi Keluarga</u></p>
	</div>
</div>

@if (isset($page_datas->credit['debitur']['relasi']) && !empty($page_datas->credit['debitur']['relasi']))
	@forelse ($page_datas->credit['debitur']['relasi'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					@if (!empty($page_datas->credit['debitur']['relasi']))
						<span class="text-sm">{{ (isset($value['pivot']['hubungan']) && !is_null($value['pivot']['hubungan'])) ? str_replace('_', ' ', $value['pivot']['hubungan']) : '-'  }}</span>

						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('debitur.relasi.destroy', ['kredit_id' => $page_datas->credit['id'], 'relasi_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a>&nbsp;
								<a href="#" class="button-edit" data-toggle="hidden" data-target="keluarga-{{ $key }}" data-panel="data-pribadi" data-index="{{ $key }}" data-flag="data-keluarga" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				{{-- <hr class="m-t-xs m-b-xs"/> --}}
			</div>
		</div>
		<div class="row p-t-xs m-b-sm">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['nama']) && !is_null($value['nama'])) ? $value['nama'] : '-' }}
				</p>
				<p class="text-capitalize text-light m-b-xs">
					@foreach ($value['alamat'] as $k => $v)
						@if ($k == 0)
							{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }}
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
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['telepon']) && !is_null($value['telepon'])) ? $value['telepon'] : '-' }}
				</p>
				@if (count($page_datas->credit['debitur']['relasi']) - 1 != $key)
					<hr class="m-b-md">
				@endif
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