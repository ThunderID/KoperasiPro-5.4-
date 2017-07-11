@php
	// dd($page_datas->credit);
@endphp
@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<div data-panel="data-kredit">
		<div class="row m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h4>Info Kredit @if (isset($page_datas->credit['hp_i'])) <small class="label label-info">Pengajuan dari HP</small>@endif</h4>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
				@if ($page_datas->credit['status'] == 'pengajuan')
					<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" class="btn p-r-none" no-data-pjax>
						<i class="fa fa-pencil" aria-hidden="true"></i> Edit
					</a>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['nama']) && !is_null($page_datas->credit['debitur']['nama'])) ? $page_datas->credit['debitur']['nama'] : '-' }}
				</p>
				{{-- ALAMAT --}}
				@if (isset($page_datas->credit['debitur']['alamat']) && !empty($page_datas->credit['debitur']['alamat']))
					<p class="text-capitalize text-light m-b-xs">
						{{ (isset($page_datas->credit ['debitur']['alamat']['alamat']) && !is_null($page_datas->credit ['debitur']['alamat']['alamat'])) ? $page_datas->credit ['debitur']['alamat']['alamat'] : '' }}
						RT {{ (isset($page_datas->credit ['debitur']['alamat']['rt']) ? $page_datas->credit ['debitur']['alamat']['rt'] : '-') }} / 
						RW {{ isset($page_datas->credit ['debitur']['alamat']['rw']) ? $page_datas->credit ['debitur']['alamat']['rw'] : '-' }}
						{{ (isset($page_datas->credit ['debitur']['alamat']['desa']) && !is_null($page_datas->credit ['debitur']['alamat']['desa'])) ? $page_datas->credit ['debitur']['alamat']['desa'] : '' }} &nbsp;
						{!! (isset($page_datas->credit ['debitur']['alamat']['distrik']) && !is_null($page_datas->credit ['debitur']['alamat']['distrik'])) ? $page_datas->credit ['debitur']['alamat']['distrik'] : '' !!} &nbsp;
						{!! (isset($page_datas->credit ['debitur']['alamat']['regensi']) && !is_null($page_datas->credit ['debitur']['alamat']['regensi'])) ? $page_datas->credit ['debitur']['alamat']['regensi'] : '' !!} &nbsp;
						{{ (isset($page_datas->credit ['debitur']['alamat']['provinsi']) && !is_null($page_datas->credit ['debitur']['alamat']['provinsi'])) ? $page_datas->credit ['debitur']['alamat']['provinsi'] : '' }} - 
						{{ (isset($page_datas->credit ['debitur']['alamat']['negara']) && !is_null($page_datas->credit ['debitur']['alamat']['negara'])) ? $page_datas->credit ['debitur']['alamat']['negara'] : '' }}
					</p>
				@else
					<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="alamat" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
				@endif

				{{-- telp --}}
				@if (isset($page_datas->credit['debitur']['telepon']) && !is_null($page_datas->credit['debitur']['telepon']))
					<p class="text-capitalize text-light m-b-xs">
						{{ $page_datas->credit['debitur']['telepon'] }}
					</p>
				@else
					<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kontak" data-panel="data-nasabah" no-data-pjax> Tambahkan Sekarang </a></p>
				@endif
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<p class="text-capitalize text-light m-b-xs">
					Pinjaman {{ (isset($page_datas->credit['pengajuan_kredit']) && !is_null($page_datas->credit['pengajuan_kredit'])) ? $page_datas->credit['pengajuan_kredit'] : '-' }}
				</p>
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['jangka_waktu']) && !is_null($page_datas->credit['jangka_waktu'])) ? $page_datas->credit['jangka_waktu'] : '-' }} Bulan &nbsp;
					@if (isset($page_datas->credit['jenis_kredit']) && !is_null($page_datas->credit['jenis_kredit']))
						@if ($page_datas->credit['jenis_kredit'] == 'pa')
							(Angsuran)
						@elseif ($page_datas->credit['jenis_kredit'] == 'pt')
							(Musiman)
						@elseif ($page_datas->credit['jenis_kredit'] == 'rumah_delta')
							(Rumah Delta)
						@else
							({{ str_replace('_', ' ', $page_datas->credit['jenis_kredit']) }})
						@endif
					@endif
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Pengajuan Tgl {{ (isset($page_datas->credit['tanggal_pengajuan']) && !is_null($page_datas->credit['tanggal_pengajuan'])) ? $page_datas->credit['tanggal_pengajuan'] : '-' }}
				</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
				<hr>
			</div>
		</div>

		{{-- SUB MENU --}}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-capitalize m-b-sm text-lg">Informasi Lainnya</p>
			</div>
			{{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
			</div> --}}
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="list-unstyled fa-ul m-l-xl m-b-lg" role="tablist" style="width:30%; display: inline-grid;">
					<p class="text-capitalize text-md m-l-min-lg m-b-xs"><strong>Debitur</strong></p>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#data-pribadi" aria-controls="data-pribadi" data-toggle="tab" role="tab" @if ($page_datas->credit['checklist']['kelengkapan_nasabah'] == false) title="Data Pribadi Belum Lengkap" @endif>
							<i class="fa-li fa fa-file-text-o"></i> Data Pribadi &amp; Keluarga @if ($page_datas->credit['checklist']['kelengkapan_nasabah'] == false) <i class="text-danger fa fa-exclamation"></i> @endif
						</a>
					</li>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#riwayat-kredit" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Riwayat Kredit
						</a>
					</li>
					<p class="text-capitalize text-md m-l-min-lg m-t-sm m-b-xs"><strong>Jaminan</strong></p>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#data-jaminan" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Jaminan @if ($page_datas->credit['checklist']['kelengkapan_jaminan'] == false) <i class="text-danger fa fa-exclamation"></i> @endif
						</a>
					</li>
				</ul>
			
				<ul class="list-unstyled fa-ul m-b-sm" role="tablist" style="width:30%; display: inline-grid;">
					<p class="text-capitalize text-md m-l-min-lg m-t-sm m-b-xs"><strong>Survei</strong></p>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#survei-jaminan" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Survei Jaminan  @if ($page_datas->credit['checklist']['kelengkapan_survei_jaminan'] == false) <i class="text-danger fa fa-exclamation"></i> @endif
						</a>
					</li>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#survei-kepribadian" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Survei Kepribadian @if ($page_datas->credit['checklist']['kelengkapan_kepribadian'] == false) <i class="text-danger fa fa-exclamation"></i> @endif
						</a>
					</li>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#survei-keuangan" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Survei Keuangan &amp; Rekening @if ($page_datas->credit['checklist']['kelengkapan_keuangan'] == false) <i class="text-danger fa fa-exclamation"></i> @endif
						</a>
					</li>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#survei-aset" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Survei Aset @if ($page_datas->credit['checklist']['kelengkapan_aset'] == false) <i class="text-danger fa fa-exclamation"></i> @endif
						</a>
					</li>
				</ul>
				<ul class="list-unstyled fa-ul" style="width: 30%; display: inline-grid;">
					<p class="text-capitalize text-md m-l-min-lg m-b-xs"><strong>Analis</strong></p>
					<li class="m-t-xs m-b-xs">
						<a class="text-capitalize" href="#riwayat-status" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-history"></i> Riwayat Status
						</a>
					</li>
					<!-- <p class="text-capitalize text-md m-l-min-lg m-t-sm m-b-xs"><strong>Pencairan</strong></p>
					<li class="m-t-xs m-b-xs"><a href="#">
						<a class="text-capitalize" href="#print_form_nota_pencairan_kredit" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Nota Pencairan Kredit
						</a>
					</li>
					<li class="m-t-xs m-b-xs" role="presentation">
						<a class="text-capitalize" href="#data-angsuran" aria-controls="data-angsuran" data-toggle="tab" role="tab">
							<i class="fa-li fa fa-file-text-o"></i> Angsuran
						</a>
					</li> -->
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
				<hr>
			</div>
		</div>

		{{-- data content --}}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
				<div class="tab-content">
					{{-- panel pribadi --}}
					<div class="tab-pane fade" id="data-pribadi" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_pribadi')
					</div>
					{{-- panel survei kepribadian --}}
					<div class="tab-pane fade" id="survei-kepribadian" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_kepribadian')
					</div>
					{{-- panel keuangan --}}
					<div class="tab-pane fade" id="survei-keuangan" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_keuangan')
					</div>
					{{-- panel aset --}}
					<div class="tab-pane fade" id="survei-aset" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_aset')
					</div>
					{{-- panel jaminan --}}
					<div class="tab-pane fade" id="data-jaminan" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_jaminan')
					</div>
					{{-- panel riwayat note --}}
					<div class="tab-pane fade" id="riwayat-kredit" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_riwayat_kredit')
					</div>
					{{-- panel survei jaminan --}}
					<div class="tab-pane" id="survei-jaminan" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_survei_jaminan')
					</div>
					{{-- panel data angsuran --}}
					<div class="tab-pane" id="data-angsuran" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_angsuran')
					</div>
					{{-- panel data checklist survei --}}
					<div class="tab-pane" id="data-checklist-survei" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_data_checklist_survei')
					</div>
					{{-- panel riwayat status --}}
					<div class="tab-pane fade" id="riwayat-status" role="tabpanel">
						@include ('pages.kredit.components.panel.pengajuan.panel_riwayat_status')
					</div>
					
				</div>
			</div>
		</div>

		<div class="row button-action">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="text-center" style="width: 50px">
					TTD
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
				<a href="#" data-toggle="modal" data-target="#modal-tolak" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</a> 
				&nbsp;&nbsp;
				<a href="#" data-url="{{route('credit.status', ['id' => $page_datas->id, 'status' => $page_datas->credit['status_berikutnya']])}}" data-toggle="modal" data-target="#modal-change-status" class="btn btn-primary btn-sm">
					<i class="fa fa-check" aria-hidden="true"></i> Survei
				</a>
			</div>	
		</div>
	</div>

	{{----------------  FORM status  --------------}}
	<div class="hidden" data-form="kredit">
		<div class="row">
			<div class="col-sm-12">
				<p class="text-capitalize m-b-sm text-lg">form kredit</p>
				<hr/>
			</div>
		</div>

		{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
			{{-- content form kredit --}}
			@include ('pages.kredit.components.form.pengajuan.kredit', [
				'data'	=> [
					'select_jenis_kredit'	=> $page_datas->select_jenis_kredit,
					'select_jangka_waktu'	=> $page_datas->select_jangka_waktu
				],
				'param'	=> [
					'data'		=> isset($page_datas->credit) ? $page_datas->credit : null,
				]
			])
			
			{{-- button action form kredit --}}
			<div class="clearfix">&nbsp;</div>
			<div class="text-right">
				<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kredit" data-target="kredit">Batal</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		{!! Form::close() !!}
	</div>
	{{----------------  // FORM KREDIT  --------------}}

	{{---------------- FORM JAMINAN TANAH & BANGUNAN --------------}}
{{-- 	@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
		@foreach ($page_datas->credit['jaminan_tanah_bangunan'] as $k => $v)
			<div class="hidden" data-form="jaminan-tanah-bangunan-{{ $k }}">
				<div class="row">
					<div class="col-sm-12">
						<p class="text-capitalize m-b-sm text-lg">form jaminan tanah &amp; bangunan</p>
						<hr/>
					</div>
				</div>
				{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
					@include ('pages.kredit.components.form.pengajuan.jaminan_tanah_bangunan', [
						'param' 	=> [
							'data'		=> isset($v) ? $v : null,
							'prefix'	=> 'pengajuan',
						]
					])

					<div class="clearfix">&nbsp;</div>
					<div class="text-right">
						<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kredit" data-target="jaminan-tanah-bangunan-{{ $k }}">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				{!! Form::close() !!}
			</div>
		@endforeach
	@endif --}}

	{{-- <div class="hidden" data-form="jaminan-tanah-bangunan">
		<div class="row">
			<div class="col-sm-12">
				<p class="text-capitalize m-b-sm text-lg">form jaminan tanah &amp; bangunan</p>
				<hr/>
			</div>
		</div>
		{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
			@include ('pages.kredit.components.form.pengajuan.jaminan_tanah_bangunan', [
				'param'		=> [
					'prefix'	=> 'pengajuan',
					'data'		=> null,
				]
			])

			<div class="clearfix">&nbsp;</div>
			<div class="text-right">
				<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kredit" data-target="jaminan-tanah-bangunan">Batal</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		{!! Form::close() !!}
	</div> --}}
	{{---------------- // FORM JAMINAN TANAH & BANGUNAN --------------}}
@stop

@section('page_modals')
	@stack('show_modals')
@append