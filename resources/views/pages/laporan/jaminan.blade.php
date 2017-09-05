@extends('template.cms_template')

@section('laporan')
    active in
@stop

@section('pergerakan_jaminan')
    active
@stop

@push('content')
	<div class="row p-b-md field">
		<div class="col-md-6">
			<h2>Laporan Masuk/Keluar Jaminan</h2>
			<p class="text-muted">Laporan ini untuk melihat jaminan yang masuk/keluar pada tanggal periode tertentu, berdasarkan data kredit.</p>
		</div>
		<div class="col-md-6 p-t-md">
			<div id="daterange" class="btn btn-default btn-sm pull-right selectbox daterange">
				<i class="fa fa-calendar"></i>&nbsp;
				<?php
					$filter_date = json_decode(Input::get('date'), true);
				?>
				<span>{{ $filter_date['start'] ? $filter_date['start'] : 'DD/MM/YYY' }} - {{ $filter_date['end'] ? $filter_date['end'] : 'DD/MM/YYY' }}</span>&nbsp;<b class="caret"></b>
			</div>
		</div>
	</div>
	<div class="row p-t-none p-b-lg field">
		<div class="col-md-12 text-right">
			<!-- filter & tools	 -->
			<div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-filter" aria-hidden="true"></i>&nbsp;
					<span>Filter</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Filter Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu" style="right:0px;left:auto;">
					<li><a href="{{route('laporan.movement_jaminan.index', array_merge(Input::all(), ['mode' => 'in']))}}">Jaminan Masuk</a></li>
					<li><a href="{{route('laporan.movement_jaminan.index', array_merge(Input::all(), ['mode' => 'out']))}}">Jaminan Keluar</a></li>
				</ul>
			</div>
			<!-- <div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>&nbsp;
					<span>Sort</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Sort Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu" style="right:0px;left:auto;">
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'pengajuan']))}}">Pengajuan</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'survei']))}}">Survei</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'menunggu_persetujuan']))}}">Survei</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'tolak']))}}">Ditolak</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'menunggu_realisasi']))}}">Disetujui</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'realisasi']))}}">Aktif</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'lunas']))}}">Lunas</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="row p-b-md field">
		<div class="col-md-12">
			<!-- table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="text-center" style="width: 50%;">Jaminan</th>
						<th class="text-center" style="width: 25%;">Tanggal Jaminan Masuk</th>
						<th class="text-center" style="width: 25%;">Tanggal Jaminan Keluar</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->pengajuan as $key => $data)
						<tr><td colspan="3">Kredit a.n. {{$data['debitur']['nama']}}</td></tr>
						@php $tanggal_in 	= date('d/m/Y') @endphp
						@php $tanggal_out 	= date('d/m/Y') @endphp
						@forelse($data['riwayat_status'] as $k => $v)
							@if($v['status']=='realisasi')
								@php $tanggal_in = $v['tanggal'] @endphp
							@elseif($v['status']=='lunas')
								@php $tanggal_out = $v['tanggal'] @endphp
							@endif
						@empty
						@endforelse

						@forelse($data['jaminan_kendaraan'] as $k => $v)
							<tr>
								<td class="text-left" style="border-right:0px;padding-left:50px;">
									Kendaraan {{ str_replace('_',' ',$v['tipe']) }}
									<br/>
									Merk {{ $v['merk'] }}/{{ $v['tahun'] }}
								</td>
								<td class="text-center">{{ $tanggal_in }} </td>
								<td class="text-center">{{ $tanggal_out }} </td>
							</tr>
						@empty
						@endforelse

						@forelse($data['jaminan_tanah_bangunan'] as $k => $v)
							<tr>
								<td class="text-left" style="border-right:0px;padding-left:50px;">
									{{ $v['jenis_sertifikat'] }}
									<br/>
									Nomor {{ $v['nomor_sertifikat'] }}
								</td>
								<td class="text-center">{{ $tanggal_in }} </td>
								<td class="text-center">{{ $tanggal_out }} </td>
							</tr>
						@empty
						@endforelse

					@empty
						<tr>
							<td colspan="3" class="text-center">Belum ada data</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			<!-- pagination -->	
		</div>
	</div>
@endpush

@push('scripts')
	var url = window.location.href;
	url = url.substring(0, url.indexOf('?') > 0 ? url.indexOf('?') : url.length);
	
	$(document).on('click', '.cancelBtn', function(){
		window.location.href = url;
	});
	$(document).on('click', '.applyBtn', function(){
		let start = $(this).closest('.daterangepicker').find('input[name=daterangepicker_start]').val();
		let end = $(this).closest('.daterangepicker').find('input[name=daterangepicker_start]').val();
		qs = {'start': start, 'end': end};
		window.location.href= url + '?date=' + JSON.stringify(qs);
	});
@endPush