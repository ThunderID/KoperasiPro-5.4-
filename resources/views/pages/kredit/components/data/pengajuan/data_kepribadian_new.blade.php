@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-sm">Data Kepribadian</p>
	</div>
</div>

@if (isset($page_datas->credit['survei_kepribadian']) && !empty($page_datas->credit['survei_kepribadian']))
	@foreach ($page_datas->credit['survei_kepribadian'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					kepribadian {{ $key+1 }}

					@if (!empty($page_datas->credit['survei_kepribadian']))
						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md delete" href="#" data-url="{{ route('survei.kepribadian.destroy', ['kredit_id' => $page_datas->credit['id'], 'kepribadian_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="kepribadian-{{ $key }}" data-panel="data-kepribadian" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-xs m-b-xs"/>
				@if(isset($value['surveyor']) && !empty($value['surveyor']))
					@php
						$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($value['surveyor']['visas'], $acl_active_office);
					@endphp
					<p class="text-capitalize text-sm">disurvei {!!  $value['tanggal_survei'] . ' oleh ' . $value['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . $role . ' )</span></em>'  !!}</p>
				@endif
			</div>
		</div>
		<div class="row p-t-lg m-b-xl">
			<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
				<p class="m-b-xs text-sm"><strong>Referensi</strong></p>
				<p class="text-capitalize text-light">{{ (isset($value['nama_referens']) && !is_null($value['nama_referens'])) ? $value['nama_referens'] : '-' }} - {{ (isset($value['hubungan']) && !is_null($value['hubungan'])) ? str_replace('_', ' ', $value['hubungan']) : '-'  }}</p>
				<p class="text-capitalize text-light">{{ (isset($value['telepon_referens']) && !is_null($value['telepon_referens'])) ? $value['telepon_referens'] : '-' }}</p>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
				<p class="m-b-xs text-sm">&nbsp;</p>
				<p class="text-capitalize text-light">{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? $value['uraian'] : '-' }}</p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 11px;"><em>( uraian )</em></p>
			</div>
		</div>
		<div class="row hidden-sm hidden-md hidden-lg">
			<div class="col-xs-12">
				<p class="m-b-xs text-sm"><strong>Uraian</strong></p>
				<p class="text-capitalize text-light">{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? $value['uraian'] : '-' }}</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@endforeach

	@if (count($page_datas->credit['survei_aset_usaha']) > 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#" data-toggle="hidden" data-target="kepribadian" data-panel="data-kepribadian" no-data-pjax><i class="fa fa-plus"></i> Tambahkan kepribadian</a>
			</div>
		</div>
	@else
		@if ($page_datas->credit['status'] == 'pengajuan')
			<div class="row">
				<div class="col-sm-12">
					<p class="text-light">Maaf data belum tersedia, data akan tersedia setelah data disurvei</p>
				</div>
			</div>
		@else
			<!-- No data -->
			<div class="row">
				<div class="col-sm-12">
					<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kepribadian" data-panel="data-kepribadian" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		@endif
	@endif
@else
	@if ($page_datas->credit['status'] == 'pengajuan')
		<div class="row">
			<div class="col-sm-12">
				<p class="text-light">Maaf data belum tersedia, data akan tersedia setelah data disurvei</p>
			</div>
		</div>
	@else
		<!-- No data -->
		<div class="row">
			<div class="col-sm-12">
				<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kepribadian" data-panel="data-kepribadian" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endif
@endif

<div class="clearfix m-b-md">&nbsp;</div>