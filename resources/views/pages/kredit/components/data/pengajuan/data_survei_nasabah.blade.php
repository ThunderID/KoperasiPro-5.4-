@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-xs">Data Survei Nasabah
			@if (!empty($page_datas->credit['survei_nasabah']))
				@if ($edit == true)
					<span class="pull-right text-capitalize">
						<small>
						<a href="#" data-toggle="hidden" data-target="survei-nasabah" data-panel="data-survei-nasabah" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
						</small>
					</span>
				@endif
			@endif
		</p>
		@if (isset($page_datas->credit['survei_nasabah']) && !empty($page_datas->credit['survei_nasabah']))
			<hr class="m-t-xs m-b-xs"/>
			@php
				$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($page_datas->credit['survei_nasabah']['surveyor']['visas'], $acl_active_office);
			@endphp
			<p class="text-capitalize text-muted text-sm">disurvei {!! (isset($page_datas->credit['survei_nasabah']['surveyor']) && !empty($page_datas->credit['survei_nasabah']['surveyor'])) ? $page_datas->credit['survei_nasabah']['tanggal_survei'] . ' oleh ' . $page_datas->credit['survei_nasabah']['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . 
			$role . ' )</span></em>'  : '-'  !!}</p>
		@endif
	</div>
</div>

@if (isset($page_datas->credit['survei_nasabah']) && !empty($page_datas->credit['survei_nasabah']))
	<div class="row p-t-lg m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				Nama
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['debitur']['nama']) && !is_null($page_datas->credit['debitur']['nama'])) ? $page_datas->credit['debitur']['nama'] : '-' }}
			</p>
		</div>
	</div>
	<div class="row m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				status
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['survei_nasabah']['status']) && !is_null($page_datas->credit['survei_nasabah']['status'])) ? str_replace('_', ' ', $page_datas->credit['survei_nasabah']['status']) : '-' }}
			</p>
		</div>
	</div>
	<div class="row m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				kredit sebelumnya
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['survei_nasabah']['kredit_terdahulu']) && !is_null($page_datas->credit['survei_nasabah']['kredit_terdahulu'])) ? str_replace('_', ' ', $page_datas->credit['survei_nasabah']['kredit_terdahulu']) : '-' }}
			</p>
		</div>
	</div>
	<div class="row m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				jaminan sebelumnya
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['survei_nasabah']['jaminan_terdahulu']) && !is_null($page_datas->credit['survei_nasabah']['jaminan_terdahulu'])) ? str_replace('_', ' ', $page_datas->credit['survei_nasabah']['jaminan_terdahulu']) : '-' }}
			</p>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="nasabah" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>

@push('show_modals')
	@component('components.modal', [
		'id' 		=> 'data_aset',
		'title'		=> 'Data Aset',
		'settings'	=> [
			'hide_buttons'	=> true
		]	
	])
		{{-- @include('pages.kredit.components.form.survei.data_aset') --}}
	@endcomponent
@endpush	
