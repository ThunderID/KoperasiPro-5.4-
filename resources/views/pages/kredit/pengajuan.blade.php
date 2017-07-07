@php
	// dd($page_datas->credit);
@endphp
@extends('pages.kredit.templates.index_show_template')

@section('page_content')
	<div data-panel="data-kredit">
		<div class="row m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h4>Info Kredit</h4>
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

		{{-- ANGGUNAN --}}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-capitalize m-b-sm text-lg">Jaminan</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				{{-- ANGGUNAN TANAH & BANGUNAN --}}
				@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
					@forelse ($page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
						<p class="m-t-sm m-b-xs text-capitalize text-sm">
							<strong>tanah &amp; bangunan {{ $key+1 }}</strong>
							@if (!empty($page_datas->credit['jaminan_tanah_bangunan']))
								@if ($page_datas->credit['status'] == 'pengajuan')
									<span class="pull-right">
										<a class="text-danger m-r-md" href="#" data-url="{{ route('jaminan.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'jaminan_tanah_bangunan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
											<i class="fa fa-trash" aria-hidden="true"></i>
											 Hapus
										</a> &nbsp;
										<a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan-{{ $key }}" data-panel="data-kredit" no-data-pjax>
											<i class="fa fa-pencil" aria-hidden="true"></i>
											 Edit
										</a>
									</span>
								@endif
							@endif
						</p>
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
							<span> ( {{ (isset($value['jenis_sertifikat']) && !is_null($value['jenis_sertifikat'])) ? str_replace('_', ' ', $value['jenis_sertifikat']) : '-' }} )</span>
						</p>
						<p class="text-capitalize text-light m-b-xs">
							No. Sertifikat {{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? $value['nomor_sertifikat'] : '-' }}
						</p>
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['luas_bangunan']) && !is_null($value['luas_bangunan'])) ? str_replace('_', ' ', $value['luas_bangunan']) : '-'  }} M<sup>2</sup> / 
							{{ (isset($value['luas_tanah']) && !is_null($value['luas_tanah'])) ? str_replace('_', ' ', $value['luas_tanah']) : '-'  }} M<sup>2</sup> 
							<span class="text-capitalize text-muted" style="font-size: 11px;"><em>( bangunan / tanah )</em></span>
						</p>
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
						</p>
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['alamat']['alamat']) && !is_null($value['alamat']['alamat'])) ? $value['alamat']['alamat'] : '' }}
							RT {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }} / RW {{ isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-' }}
							{{ (isset($value['alamat']['desa']) && !is_null($value['alamat']['desa'])) ? $value['alamat']['desa'] : '' }} 
							{!! (isset($value['alamat']['distrik']) && !is_null($value['alamat']['distrik'])) ? $value['alamat']['distrik'] .' <br/>' : '' !!}
							{{ (isset($value['alamat']['regensi']) && !is_null($value['alamat']['regensi'])) ? $value['alamat']['regensi'] : '' }} - 
							{{ (isset($value['alamat']['provinsi']) && !is_null($value['alamat']['provinsi'])) ? $value['alamat']['provinsi'] : '' }} - 
							{{ (isset($value['alamat']['negara']) && !is_null($value['alamat']['negara'])) ? $value['alamat']['negara'] : '' }}
						</p>
						<p class="text-capitalize text-light m-b-xs">
							Sertifikat berlaku sampai th. {{ (isset($value['masa_berlaku_sertifikat']) && !is_null($value['masa_berlaku_sertifikat'])) ? $value['masa_berlaku_sertifikat'] : '-' }}
						</p>
					@empty
						<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>Tanah &amp; Bangunan</strong></p>
						@if ($page_datas->credit['status'] != 'pengajuan')
							<p class="text-light">Belum ada data disimpan.</p>
						@else
							<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-kredit" no-data-pjax> Tambahkan Sekarang </a></p>
						@endif
					@endforelse

					@if ((count($page_datas->credit['jaminan_tanah_bangunan']) < 3) && count($page_datas->credit['jaminan_tanah_bangunan']) != 0)
						<div class="row m-t-md m-b-md">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								@if ($page_datas->credit['status'] == 'pengajuan')
									<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-jaminan-tanah-bangunan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Tanah &amp; Bangunan</a>
								@endif
							</div>
						</div>
					@endif
				@else
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>Tanah &amp; Bangunan</strong></p>
					@if ($page_datas->credit['status'] != 'pengajuan')
						<p class="text-light">Belum ada data disimpan.</p>
					@else
						<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-tanah-bangunan" data-panel="data-kredit" no-data-pjax> Tambahkan Sekarang </a></p>
					@endif
				@endif
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				{{-- ANGGUNAN KENDARAAN --}}
				@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
					@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
						<p class="m-t-sm m-b-xs text-capitalize text-sm">
							<strong>kendaraan {{ $key+1 }}</strong>
							@if (!empty($page_datas->credit['jaminan_kendaraan']))
								@if ($page_datas->credit['status'] == 'pengajuan')
									<span class="pull-right">
										<a class="text-danger m-r-md" href="#" data-url="{{ route('jaminan.kendaraan.destroy', ['kredit_id' => $page_datas->credit['id'], 'jaminan_kendaraan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
											<i class="fa fa-trash" aria-hidden="true"></i>
											 Hapus
										</a> &nbsp;
										<a href="#" data-toggle="hidden" data-target="jaminan-kendaraan-{{ $key }}" data-panel="data-kredit" no-data-pjax>
											<i class="fa fa-pencil" aria-hidden="true"></i>
											 Edit
										</a>
									</span>
								@endif
							@endif
						</p>
						
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['merk']) && !is_null($value['merk'])) ? $value['merk'] : '-' }} 
							Th. {{ (isset($value['tahun']) && !is_null($value['tahun'])) ? $value['tahun'] : '-' }}
							({{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }})
						</p>
						
						<p class="text-capitalize text-light m-b-xs">
							No. BPKB {{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? $value['nomor_bpkb'] : '-' }}
						</p>

						<p class="text-capitalize text-light m-b-md">
							{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
						</p>
					@empty
						<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>Kendaraan</strong></p>
						<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-kredit" no-data-pjax> Tambahkan Sekarang </a></p>	
					@endforelse

					@if ((count($page_datas->credit['jaminan_kendaraan']) < 2) && (count($page_datas->credit['jaminan_kendaraan']) != 0))
						<div class="row m-t-md m-b-md">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-jaminan-kendaraan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Jaminan Kendaraan</a>
							</div>
						</div>
					@endif
				@else
					<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>Kendaraan</strong></p>
					<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="jaminan-kendaraan" data-panel="data-kredit" no-data-pjax> Tambahkan Sekarang </a></p>	
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
				<hr>
			</div>
		</div>

		{{-- SUB MENU --}}
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-capitalize m-b-sm text-md ">Informasi Lainnya</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<ul class="list-unstyled fa-ul m-l-xl">
					<li class="m-t-sm m-b-sm">
						<a href="#data-pribadi" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_nasabah']) && ($page_datas->credit['kelengkapan_nasabah'] == false)) title="Kelengkapan Data Pribadi Belum Lengkap" @endif>
							<i class="fa-li fa fa-file-text-o"></i> Data Pribadi 
							@if ($page_datas->credit['status'] == 'pengajuan')
								@if (isset($page_datas->credit['debitur']['relasi']) && empty($page_datas->credit['debitur']['relasi']))
									&nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i>
								@endif
							@else
								@if ((isset($page_datas->credit['debitur']['relasi']) && empty($page_datas->credit['debitur']['relasi'])) && (isset($page_datas->credit['survei_kepribadian']) && empty($page_datas->credit['survei_kepribadian'])))
									&nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i>
								@endif
							@endif
						</a>
					</li>
					<li class="m-t-sm m-b-sm">
						<a href="#data-aset" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_aset']) && ($page_datas->credit['kelengkapan_aset'] == false)) title="Kelengkapan Data Aset Belum Lengkap" @endif>
							<i class="fa-li fa fa-file-text-o"></i> Data Aset
							@if ((isset($page_datas->credit['survei_aset_tanah_bangunan']) && empty($page_datas->credit['survei_aset_tanah_bangunan'])) && (isset($page_datas->credit['survei_aset_usaha']) && empty($page_datas->credit['survei_aset_usaha'])) && (isset($page_datas->credit['survei_aset_kendaraan']) && empty($page_datas->credit['survei_aset_kendaraan'])))
								&nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> 
							@endif
						</a>
					</li>
					<li class="m-t-sm m-b-sm">
						<a href="#data-keuangan" data-toggle="tab" role="tab" @if (isset($page_datas->credit['kelengkapan_keuangan']) && ($page_datas->credit['kelengkapan_keuangan'] == false)) title="Kelengkapan Data Keuangan Belum Lengkap" @endif>
							<i class="fa-li fa fa-file-text-o"></i> Data Keuangan 
							@if (isset($page_datas->credit['survei_keuangan']) && empty($page_datas->credit['survei_keuangan'])) 
								&nbsp;&nbsp;<i class="fa fa-exclamation-circle text-danger"></i> 
							@endif
						</a>
					</li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<ul class="list-unstyled fa-ul">
					<li class="m-t-sm m-b-sm"><a href="#"><i class="fa-li fa fa-file-text-o"></i> Daftar Survei</a></li>
					<li class="m-t-sm m-b-sm"><a href="#"><i class="fa-li fa fa-file-text-o"></i> Lihat Angsuran</a></li>
					<li class="m-t-sm m-b-sm"><a href="#"><i class="fa-li fa fa-history"></i> Riwayat Kredit</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<ul class="list-unstyled fa-ul">
					<li class="m-t-sm m-b-sm"><a href="#"><i class="fa-li fa fa-history"></i> Riwayat Note</a></li>
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
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none tab-content">
				{{-- panel pribadi --}}
				<div class="tab-pane fade" id="data-pribadi" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_pribadi')
				</div>
				{{-- panel aset --}}
				<div class="tab-pane fade" id="data-aset" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_aset')
				</div>
				{{-- panel keuangan --}}
				<div class="tab-pane fade" id="data-keuangan" role="tabpanel">
					@include ('pages.kredit.components.panel.pengajuan.panel_keuangan')
				</div>
				{{-- panel survei --}}
				<div class="tab-pane fade" id="data-survei" role="tabpanel">

				</div>
				{{-- panel riwayat kredit --}}
				<div class="tab-pane fade" id="data-riwayat-kredit" role="tabpanel">

				</div>
				{{-- panel riwayat note --}}
				<div class="tab-pane fade" id="data-aset" role="tabpanel">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="text-center" style="width: 50px">
					TTD
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
				<a href="#" data-toggle="modal" data-target="#modal-tolak" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</a> 
				&nbsp;&nbsp;
				<a href="#" data-url="{{route('credit.status', ['id' => $page_datas->id, 'status' => 'survei'])}}" data-toggle="modal" data-target="#modal-change-status" class="btn btn-primary btn-sm">
					<i class="fa fa-check" aria-hidden="true"></i> Setujui
				</a>
			</div>	
		</div>
	</div>

	{{----------------  FORM KREDIT  --------------}}
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

	{{----------------  FORM JAMINAN KENDARAAN  --------------}}
	@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
		@foreach ($page_datas->credit['jaminan_kendaraan'] as $k => $v)
			<div class="hidden" data-form="jaminan-kendaraan-{{ $k }}">
				<div class="row">
					<div class="col-sm-12">
						<p class="text-capitalize m-b-sm text-lg">form jaminan kendaraan</p>
						<hr/>
					</div>
				</div>
				{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				
					@include ('pages.kredit.components.form.pengajuan.jaminan_kendaraan', [
						'param'		=> [
							'data'		=> isset($v) ? $v : null,
							'prefix'	=> 'pengajuan',
						],
						'data'		=> [
							'select_jenis_kendaraan'	=> $page_datas->select_jenis_kendaraan,
							'select_merk_kendaraan'		=> $page_datas->select_merk_kendaraan,
						]
					])

					<div class="clearfix">&nbsp;</div>
					<div class="text-right">
						<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kredit" data-target="jaminan-kendaraan-{{ $k }}">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				{!! Form::close() !!}
			</div>
		@endforeach
	@endif
	
	<div class="hidden" data-form="jaminan-kendaraan">
		<div class="row">
			<div class="col-sm-12">
				<p class="text-capitalize m-b-sm text-lg">form jaminan kendaraan</p>
				<hr/>
			</div>
		</div>
		{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
		
			@include ('pages.kredit.components.form.pengajuan.jaminan_kendaraan', [
				'param'		=> [
					'prefix'	=> 'pengajuan',
					'data'		=> null,
				],
				'data'		=> [
					'select_jenis_kendaraan'	=> $page_datas->select_jenis_kendaraan,
					'select_merk_kendaraan'		=> $page_datas->select_merk_kendaraan,
				]
			])

			<div class="clearfix">&nbsp;</div>
			<div class="text-right">
				<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kredit" data-target="jaminan-kendaraan">Batal</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		{!! Form::close() !!}
	</div>
	{{---------------- // FORM JAMINAN KENDARAAN --------------}}

	{{---------------- FORM JAMINAN TANAH & BANGUNAN --------------}}
	@if (isset($page_datas->credit['jaminan_tanah_bangunan']) && !empty($page_datas->credit['jaminan_tanah_bangunan']))
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
	@endif

	<div class="hidden" data-form="jaminan-tanah-bangunan">
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
	</div>
	{{---------------- // FORM JAMINAN TANAH & BANGUNAN --------------}}
@stop

@section('page_modals')
	@stack('show_modals')
@append