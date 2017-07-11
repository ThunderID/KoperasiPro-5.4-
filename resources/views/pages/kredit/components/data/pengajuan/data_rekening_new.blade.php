@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-sm">Data Rekening</p>
	</div>
</div>

@if (isset($page_datas->credit['survei_rekening']) && !empty($page_datas->credit['survei_rekening']))
	@forelse ($page_datas->credit['survei_rekening'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					rekening {{ $key+1 }}

					@if (!empty($page_datas->credit['survei_rekening']))
						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.rekening.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_rekening_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="rekening-{{ $key }}" data-panel="data-keuangan" no-data-pjax>
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
		<div class="row p-t-lg">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="text-uppercase text-light">
					{{ (isset($value['rekening']) && !is_null($value['rekening'])) ? str_replace('_', ' ', $value['rekening']) : '-' }}
				</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<p class="text-capitalize text-light">
					{{ (isset($value['nomor_rekening']) && !is_null($value['nomor_rekening'])) ? $value['nomor_rekening'] : '-' }} 
				</p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="m-b-xs text-capitalize text-light">
					{{ (isset($value['saldo_awal']) && !is_null($value['saldo_awal'])) ? $value['saldo_awal'] : '-' }} 
				</p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 11px;"><em>( saldo awal )</em></p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="m-b-xs text-capitalize text-light">
					{{ (isset($value['saldo_akhir']) && !is_null($value['saldo_akhir'])) ? $value['saldo_akhir'] : '-' }} 
				</p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 11px;"><em>( saldo akhir )</em></p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
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
					<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="rekening" data-panel="data-keuangan" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		@endif
	@endforelse

	@if (count($page_datas->credit['survei_rekening']) > 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#" data-toggle="hidden" data-target="rekening" data-panel="data-keuangan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Rekening</a>
			</div>
		</div>
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
				<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="rekening" data-panel="data-keuangan" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endif
@endif

<div class="clearfix m-b-md">&nbsp;</div>