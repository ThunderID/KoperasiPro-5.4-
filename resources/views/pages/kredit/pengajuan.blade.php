@extends('pages.kredit.templates.index_show_template')

@push('styles')
	.label-info-device {
		padding: 5px;
		padding-top: 1px;
		padding-bottom: 1px;
	}
	.label-web {
		background-color: #777;
	}
	.label-mobile {
		background-color: #337ab7;
	}
@endpush

@section('page_content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<div data-panel="data-kredit">
			<div class="row m-b-md">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h4>
						Info Kredit 
						@if (isset($page_datas->credit['hp_id'])) 
							<small class="label label-info-device label-info text-sm text-light">
								Pengajuan dari Mobile
							</small>
						@else
							<small class="label label-info-device label-default text-sm text-light">Pengajuan dari Kantor</small>
						@endif
					</h4>
				</div>
			</div>
			<div class="row">
				{{-- section nasabah --}}
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p class="text-capitalize text-bold text-sm m-b-xs">Nasabah</p>
					<p class="text-capitalize text-light m-b-xs">
						{{ (isset($page_datas->credit['debitur']['nama']) && !is_null($page_datas->credit['debitur']['nama'])) ? $page_datas->credit['debitur']['nama'] : '-' }}
					</p>
					
					{{-- ALAMAT --}}
					@if (isset($page_datas->credit['debitur']['alamat']) && !empty($page_datas->credit['debitur']['alamat']))
						<p class="text-capitalize text-light m-b-xs">
							@foreach ((array)$page_datas->credit['debitur']['alamat'] as $k => $v)
								@if ($k == 0)
									{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }} <br/>
									RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
									<span class="text-uppercase">
										{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} -
										{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] : '' }} <br/>
										{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
										Jawa Timur <br/>
										{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
									</span>
								@endif
							@endforeach
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
				{{-- section kredit --}}
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p class="text-capitalize text-bold text-sm m-b-xs">
						<span class="pull-right">
							@if ($page_datas->credit['status'] == 'pengajuan')
								<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" class="btn p-r-none m-b-none p-t-none" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i> Edit
								</a>
							@endif
						</span>
						Kredit
					</p>
					<p class="text-capitalize text-light m-b-xs">
						Pinjaman {{ (isset($page_datas->credit['pengajuan_kredit']) && !is_null($page_datas->credit['pengajuan_kredit'])) ? $page_datas->credit['pengajuan_kredit'] : '-' }}
					</p>
					<p class="text-capitalize text-light m-b-xs">
						{{ (isset($page_datas->credit['jangka_waktu']) && !is_null($page_datas->credit['jangka_waktu'])) ? $page_datas->credit['jangka_waktu'] : '-' }} Bulan 
						@if (isset($page_datas->credit['jenis_kredit']) && !is_null($page_datas->credit['jenis_kredit']))
							@if ($page_datas->credit['jenis_kredit'] == 'pa')
								( Angsuran )
							@elseif ($page_datas->credit['jenis_kredit'] == 'pt')
								( Musiman )
							@elseif ($page_datas->credit['jenis_kredit'] == 'rumah_delta')
								( Rumah Delta )
							@else
								( {{ str_replace('_', ' ', $page_datas->credit['jenis_kredit']) }} )
							@endif
						@endif
					</p>
					<p class="text-capitalize text-light m-b-xs">
						Pengajuan Tgl {{ (isset($page_datas->credit['tanggal_pengajuan']) && !is_null($page_datas->credit['tanggal_pengajuan'])) ? $page_datas->credit['tanggal_pengajuan'] : '-' }}
					</p>

					@if ($page_datas->credit['status']=='survei')
						{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter form-inline m-t-md', 'method' => 'PUT']) !!}
							<div class="form-group form-group-sm">
								<div class="input-group input-group-sm">
									{!! Form::text('suku_bunga', (isset($page_datas->credit['suku_bunga']) ? $page_datas->credit['suku_bunga'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Suku Bunga', 'data-field' => 'suku_bunga', 'style' => '']) !!}
									<div class="input-group-addon text-sm">&#37; / tahun</div>
								</div>
							</div>
							<button type="submit" class="btn btn-success btn-sm">Simpan</button>
						{!! Form::close() !!}
					@elseif ($page_datas->credit['status'] != 'pengajuan')
						<p class="text-capitalize text-light m-b-xs">
							Suku Bunga {{ $page_datas->credit['suku_bunga'] }} &#37; / tahun
						</p>
					@endif
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			{{-- section button action --}}
			<div class="row button-action">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="text-center" style="width: 200px;">
						@if (isset($page_datas->credit['spesimen_ttd']) && !is_null($page_datas->credit['spesimen_ttd']))
							<img src="{{ $page_datas->credit['spesimen_ttd'] }}" class="img img-responsive img-panels text-center" />
						@endif
					</div>
				</div>
				@if ($page_datas->credit['status'] != 'lunas')
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right" style="height: 100px;">
						<div style="position: absolute; bottom: 0; right: 15px;">
							<a href="#" data-toggle="modal" data-target="#modal-tolak" class="btn btn-danger">
								<i class="fa fa-times"></i> Tolak
							</a> 
							&nbsp;&nbsp;
							<a href="#" data-url="{{route('credit.status', ['id' => $page_datas->id, 'status' => $page_datas->credit['status_berikutnya']])}}" data-toggle="modal" data-target="#modal-change-status" class="btn btn-primary">
								<i class="fa fa-check" aria-hidden="true"></i> Lanjutkan
							</a>
						</div>
					</div>	
				@endif
			</div>
			<div class="clearfix">&nbsp;</div>
			{{-- section line --}}
			<div class="row">
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab-with-scroll">
					<div class="row" role="tablist">

						<div class="col-xs-12 col-sm-4">
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">
									<p class="text-capitalize text-sm text-bold">Debitur</p>
								</div>
							</div>
							{{-- menu pribadi & keluarga --}}
							<div class="row m-t-xs m-b-xs" role="presentation" >
								<div class="col-md-12">
									<a class="text-capitalize" href="#data-pribadi" aria-controls="data-pribadi" data-toggle="tab" role="tab" @if ($page_datas->credit['checklist']['kelengkapan_nasabah'] == false) title="Data Pribadi Belum Lengkap" @endif>
										<i class="fa fa-file-text-o"></i>&nbsp;Data Pribadi &amp; Keluarga 
										@if (($page_datas->credit['checklist']['kelengkapan_nasabah'] == false) && (($page_datas->credit['status'] == 'pengajuan') && ($page_datas->credit['status'] == 'pengajuan')))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
							{{-- menu riwayat kredit --}}
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#riwayat-kredit" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Riwayat Kredit
									</a>
								</div>
							</div>
							{{-- menu jaminan --}}
							<p class="text-capitaliz text-sm m-t-sm text-bold">Jaminan</p>
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#data-jaminan" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Jaminan 
										@if (($page_datas->credit['checklist']['kelengkapan_jaminan'] == false) && ($page_datas->credit['status'] == 'pengajuan'))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-4">
							{{-- menu survei jaminan --}}
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">
									<p class="text-capitalize text-sm text-bold">Survei</p>
								</div>
							</div>
							<div class="row m-t-xs m-b-xs" role="presentation" >
								<div class="col-md-12">
									<a class="text-capitalize" href="#survei-jaminan" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Survei Jaminan  
										@if (($page_datas->credit['checklist']['kelengkapan_survei_jaminan'] == false) && ($page_datas->credit['status'] == 'survei'))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
							{{-- menu survei kepribadian --}}
							<div class="row m-t-xs m-b-xs" role="presentation" >
								<div class="col-md-12">
									<a class="text-capitalize" href="#survei-kepribadian" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Survei Kepribadian 
										@if (($page_datas->credit['checklist']['kelengkapan_kepribadian'] == false) && ($page_datas->credit['status'] == 'survei'))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>	
							</div>
							{{-- menu survei keuangan & rekening --}}
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">							
									<a class="text-capitalize" href="#survei-keuangan" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Survei Keuangan &amp; Rekening 
										@if (($page_datas->credit['checklist']['kelengkapan_keuangan'] == false) && ($page_datas->credit['status'] == 'survei'))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
							{{-- menu survei aset --}}
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#survei-aset" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Survei Aset 
										@if (($page_datas->credit['checklist']['kelengkapan_aset'] == false) && ($page_datas->credit['status'] == 'survei'))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
							{{-- menu survei nasabah --}}
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#survei-nasabah" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Survei Nasabah 
										@if (($page_datas->credit['checklist']['kelengkapan_nasabah'] == false) && ($page_datas->credit['status'] == 'survei'))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-4">
							{{-- menu checklist  --}}
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">
									<p class="text-capitalize text-sm text-bold">Ceklist</p>
								</div>
							</div>	
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#dokumen-ceklist" data-toggle="tab" role="tab">
										<i class="fa fa-check-square-o"></i> Ceklist Dokumen
										@if (($page_datas->credit['checklist']['kelengkapan_dokumen_fisik'] == false))
											<i class="text-danger fa fa-exclamation-circle"></i> 
										@endif
									</a>
								</div>
							</div>
							{{-- menu analis --}}
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">							
									<p class="text-capitalize text-sm m-t-sm text-bold">Analis</p>
								</div>
							</div>
							{{-- menu riwayat status --}}
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#riwayat-status" data-toggle="tab" role="tab">
										<i class="fa fa-history"></i> Riwayat Status
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
					<hr>
				</div>
			</div>

			{{-- data content --}}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
						{{-- panel suku bunga --}}
						<!-- <div class="tab-pane fade" id="suku-bunga" role="tabpanel">
							@include ('pages.kredit.components.panel.pengajuan.panel_suku_bunga')
						</div> -->
						{{-- panel riwayat status --}}
						<div class="tab-pane fade" id="riwayat-status" role="tabpanel">
							@include ('pages.kredit.components.panel.pengajuan.panel_riwayat_status')
						</div>
						
						{{-- panel dokumen ceklist --}}
						<div class="tab-pane fade" id="dokumen-ceklist" role="tabpanel">
							@include ('pages.kredit.components.panel.pengajuan.panel_dokumen_ceklist')
						</div>

						{{-- panel nasabah --}}
						<div class="tab-pane fade" id="survei-nasabah" role="tabpanel">
							@include ('pages.kredit.components.panel.pengajuan.panel_survei_nasabah')
						</div>
					</div>
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
					<a href="#" class="btn btn-default btn-sm" data-dismiss="panel" data-panel="data-kredit" data-target="kredit">Batal</a>
					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
		{{----------------  // FORM KREDIT  --------------}}
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append

@push('scripts')
	data = {!! (isset($page_datas->credit) ? json_encode($page_datas->credit) : 'null') !!}
@endpush