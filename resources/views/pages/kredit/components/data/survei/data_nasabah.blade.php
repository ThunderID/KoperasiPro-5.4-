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
					<span class="pull-right">
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
		<p class="text-capitalize text-right text-muted text-sm">disurvei {!! (isset($page_datas->credit['nasabah']['survei']) && !empty($page_datas->credit['nasabah']['survei'])) ? $page_datas->credit['nasabah']['survei']['tanggal_survei'] . ' oleh ' . $page_datas->credit['nasabah']['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $page_datas->credit['nasabah']['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
	</div>
</div>

@if (isset($page_datas->credit['nasabah']) && !empty($page_datas->credit['nasabah']))
	<div class="row p-t-md m-b-xl">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-sm"><strong>Nama</strong></p>
			<p class="text-capitalize text-light">{{ $page_datas->credit['nasabah']['nama'] }}</p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-sm"><strong>Status</strong></p>
			<p class="text-capitalize text-light">Nasabah {{ $page_datas->credit['nasabah']['status'] }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-sm"><strong>Kredit Sebelumnya</strong></p>
			<p class="text-capitalize text-light">{{ $page_datas->credit['nasabah']['kredit_terdahulu'] }}</p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-sm"><strong>Jaminan Sebelumnya</strong></p>
			<p class="text-capitalize text-light">{{ $page_datas->credit['nasabah']['jaminan_terdahulu'] }}</p>
		</div>
	</div>
	{{-- <div class="row p-t-md">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<h4>{{ $page_datas->credit['nasabah']['nama'] }} <sup><small class="text-sm badge text-light">{{ $page_datas->credit['nasabah']['status'] }}</small></sup></h4>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<p class="m-t-sm">kredit sebelumnya - {{ $page_datas->credit['nasabah']['kredit_terdahulu'] }}</p>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<p class="m-t-sm">jaminan sebelumnya - {{ $page_datas->credit['nasabah']['jaminan_terdahulu'] }}</p>
		</div>
		@php $i=0; @endphp
	</div> --}}
	{{-- <div class="row p-t-md"> --}}
			{{-- foreach data --}}
			{{-- @foreach ($page_datas->credit['nasabah'] as $k => $v)
				<!-- remove field id, survei_id, alamat_id agar tidak ditampilkan -->
				@if (!in_array($k, ['id', 'survei_id', 'alamat_id']))
					<!-- check ketika data 2 kasih row baru -->
					@if ($i % 2 == 0)
						</div>
						<div class="row">
					@endif
					<div class="col-sm-6">
						<div class="row m-b-xl">
							<div class="col-sm-12">
								<p class="m-b-xs text-sm"><strong>{{ ucwords(str_replace('_', ' ', $k)) }}</strong></p>
								<p class="text-capitalize text-lg">
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
	</div> --}}
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
