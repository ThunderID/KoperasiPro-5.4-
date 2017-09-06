@extends('template.cms_template')

@section('laporan')
    active in
@stop

@section('log_survei')
    active
@stop

@push('content')
	<div class="row p-b-md field">
		<div class="col-md-6">
			<h2>Laporan Log Survei </h2>
			<p class="text-muted">Laporan ini untuk melihat log survei karyawan 
			@if($page_datas->start==$page_datas->end)
				pada tanggal {{$page_datas->start}}
			@else
				antara tanggal {{$page_datas->start}} - {{$page_datas->end}}
			@endif 
			</p>
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
			<!-- <div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-filter" aria-hidden="true"></i>&nbsp;
					<span>Filter</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Filter Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu" style="right:0px;left:auto;">
					<li><a href="{{route('laporan.log_survei.index', array_merge(Input::all(), ['mode' => 'in']))}}">Jaminan Masuk</a></li>
					<li><a href="{{route('laporan.log_survei.index', array_merge(Input::all(), ['mode' => 'out']))}}">Jaminan Keluar</a></li>
					<li><a href="{{route('laporan.log_survei.index', array_merge(Input::all(), ['mode' => 'current']))}}">Jaminan Tersimpan</a></li>
				</ul>
			</div> -->
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-left">Nama Karyawan</th>
						<th class="text-center">Aktivitas Survei</th>
						<th class="text-center">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@php $date_flag = null @endphp
					@php $idx = 0 @endphp
					@forelse ($page_datas->log as $key => $data)
						@if($date_flag != Carbon\Carbon::parse($data['created_at'])->format('d/m/Y'))
							@php $date_flag = Carbon\Carbon::parse($data['created_at'])->format('d/m/Y') @endphp
							<tr>
								<td class="text-left " colspan="4" style="vertical-align:middle;">
									<strong>{{$date_flag}}</strong>
								</td>
							</tr>
						@endif

						<tr>
							<td class="text-center" style="vertical-align:middle;">{{($key+1)}}</td>
							<td class="text-left" style="vertical-align:middle;">
								{{ $data['petugas']['nama'] }}
							</td>
							@if(isset($data['jaminan_kendaraan']))
								<td class="text-left" style="vertical-align:middle;">
									Kendaraan {{ str_replace('_',' ',$data['jaminan_kendaraan']['tipe']) }} 
									({{ $data['jaminan_kendaraan']['merk'] }} / {{ $data['jaminan_kendaraan']['tahun'] }})
									<br/>
									Nomor BPKB : {{$data['jaminan_kendaraan']['nomor_bpkb']}}
								</td>
								<td style="vertical-align:middle;">
									<a href="{{route('credit.show', ['id' => $data['jaminan_kendaraan']['pengajuan_id']])}}">Lihat</a>
								</td>
							@else
								<td class="text-left" style="vertical-align:middle;">
									{{ $data['jaminan_tanah_bangunan']['jenis_sertifikat'] }}
									<br/>
									Nomor Sertifikat : {{ $data['jaminan_tanah_bangunan']['nomor_sertifikat'] }}
								</td>
								<td style="vertical-align:middle;">
									<a href="{{route('credit.show', ['id' => $data['jaminan_tanah_bangunan']['pengajuan_id']])}}">Lihat</a>
								</td>
							@endif
						</tr>

					@empty
						<tr>
							<td colspan="4" class="text-center">Belum ada data</td>
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