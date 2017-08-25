@php
	// dd($page_datas->credit);
@endphp
@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<div data-panel="data-kredit">
			<div class="row m-b-md">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h4>Info Kredit @if (isset($page_datas->credit['hp_id'])) <small class="label label-info">Pengajuan dari HP</small>@endif</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p class="text-capitalize text-light text-sm m-b-xs"><strong>Nasabah</strong></p>
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
									{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} 
									{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] : '' }} <br/>
									{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
									{{ (isset($v['provinsi']) && !is_null($v['provinsi'])) ? $v['provinsi'] : '' }} - 
									{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
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
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<p class="text-capitalize text-light text-sm m-b-xs">
						<span class="pull-right">
							@if ($page_datas->credit['status'] == 'pengajuan')
								<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" class="btn p-r-none text-sm m-b-none p-t-none" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i> Edit
								</a>
							@endif
						</span>
						<strong>Kredit</strong>
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
					<p class="text-capitalize text-light m-b-xs">
						@if ($page_datas->credit['status']=='survei')
							{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter form-inline m-t-md', 'method' => 'PUT']) !!}
								<div class="input-group">
									{!! Form::text('suku_bunga', (isset($page_datas->credit['suku_bunga']) ? $page_datas->credit['suku_bunga'] : null), ['class' => 'form-control input-md auto-tabindex', 'placeholder' => 'Suku Bunga', 'data-field' => 'suku_bunga', 'style' => 'width: 60%; height: 36px; border-right-color: #46BE8A;']) !!}
									<button type="submit" class="input-group-addon btn-success">Simpan</button>
								</div>
							{!! Form::close() !!}
						@elseif ($page_datas->credit['status'] != 'pengajuan')
							<p class="text-capitalize text-light m-b-xs">
								Suku Bunga {{ $page_datas->credit['suku_bunga'] }} % / bulan
							</p>
						@endif
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab-with-scroll">
					<div class="row" role="tablist">

						<div class="col-xs-12 col-sm-4">
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">
									<p class="text-capitalize text-sm"><strong>Debitur</strong></p>
								</div>
							</div>
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
							<div class="row m-t-xs m-b-xs" role="presentation">
								<div class="col-md-12">
									<a class="text-capitalize" href="#riwayat-kredit" data-toggle="tab" role="tab">
										<i class="fa fa-file-text-o"></i> Riwayat Kredit
									</a>
								</div>
							</div>
							<p class="text-capitalize text-sm m-t-sm"><strong>Jaminan</strong></p>
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
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">
									<p class="text-capitalize text-sm"><strong>Survei</strong></p>
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
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">
									<p class="text-capitalize text-sm"><strong>Ceklist</strong></p>
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
							<div class="row m-t-xs m-b-xs">
								<div class="col-md-12">							
									<p class="text-capitalize text-sm m-t-sm"><strong>Analis</strong></p>
								</div>
							</div>
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

			<div class="row button-action">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="text-center" style="width: 200px;">
						@if (isset($page_datas->credit['spesimen_ttd']) && !is_null($page_datas->credit['spesimen_ttd']))
							<img src="{{ $page_datas->credit['spesimen_ttd'] }}" class="img img-responsive img-panels text-center" />
						@else
							<img src="http://via.placeholder.com/350x200?text=TTD+tidak+ada" class="img img-responsive img-panels text-center"/>
						@endif
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
					<a href="#" data-toggle="modal" data-target="#modal-tolak" class="btn btn-danger"><i class="fa fa-times"></i> Tolak</a> 
					&nbsp;&nbsp;
					<a href="#" data-url="{{route('credit.status', ['id' => $page_datas->id, 'status' => $page_datas->credit['status_berikutnya']])}}" data-toggle="modal" data-target="#modal-change-status" class="btn btn-primary">
						<i class="fa fa-check" aria-hidden="true"></i> Lanjutkan
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
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append