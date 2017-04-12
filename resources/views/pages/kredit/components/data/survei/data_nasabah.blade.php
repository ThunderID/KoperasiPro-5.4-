@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Nasabah
			@if (!empty($page_datas->credit['nasabah']))
				@if ($edit == true)
					<span class="pull-right text-capitalize">
						<small>
						<a href="#" data-toggle="hidden" data-target="nasabah" data-panel="data-nasabah" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
						</small>
					</span>
				@endif
			@endif
		</h4>
		<hr/>
		<p class="text-capitalize text-muted text-sm">disurvei {!! (isset($page_datas->credit['nasabah']['survei']) && !empty($page_datas->credit['nasabah']['survei'])) ? $page_datas->credit['nasabah']['survei']['tanggal_survei'] . ' oleh ' . $page_datas->credit['nasabah']['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $page_datas->credit['nasabah']['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
	</div>
</div>

@if (isset($page_datas->credit['nasabah']) && !empty($page_datas->credit['nasabah']))
	<div class="row p-t-lg m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				Nama
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['nasabah']['nama']) && !is_null($page_datas->credit['nasabah']['nama'])) ? $page_datas->credit['nasabah']['nama'] : '-' }}
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
				{{ (isset($page_datas->credit['nasabah']['status']) && !is_null($page_datas->credit['nasabah']['status'])) ? $page_datas->credit['nasabah']['status'] : '-' }}
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
				{{ (isset($page_datas->credit['nasabah']['kredit_terdahulu']) && !is_null($page_datas->credit['nasabah']['kredit_terdahulu'])) ? $page_datas->credit['nasabah']['kredit_terdahulu'] : '-' }}
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
				{{ (isset($page_datas->credit['nasabah']['jaminan_terdahulu']) && !is_null($page_datas->credit['nasabah']['jaminan_terdahulu'])) ? $page_datas->credit['nasabah']['jaminan_terdahulu'] : '-' }}
			</p>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="nasabah" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
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
