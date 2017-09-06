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
			<h2>Laporan Jaminan {{ucwords($page_datas->mode)}}</h2>
			<p class="text-muted">Laporan ini untuk melihat jaminan {{$page_datas->mode}} 
			@if($page_datas->start==$page_datas->end)
				pada tanggal {{$page_datas->start}}
			@else
				antara tanggal {{$page_datas->start}} - {{$page_datas->end}}
			@endif 
			diurut berdasarkan tanggal {{$page_datas->mode}}
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
			<div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-filter" aria-hidden="true"></i>&nbsp;
					<span>Filter</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Filter Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu" style="right:0px;left:auto;">
					<li><a href="{{route('laporan.movement_jaminan.index', array_merge(Input::all(), ['mode' => 'in']))}}">Jaminan Masuk</a></li>
					<li><a href="{{route('laporan.movement_jaminan.index', array_merge(Input::all(), ['mode' => 'out']))}}">Jaminan Keluar</a></li>
					<li><a href="{{route('laporan.movement_jaminan.index', array_merge(Input::all(), ['mode' => 'current']))}}">Jaminan Tersimpan</a></li>
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
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Jaminan</th>
						<th class="text-center">Kredit</th>
						<th class="text-center">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@php $date_flag = null @endphp
					@php $idx = 0 @endphp
					@forelse ($page_datas->pengajuan as $key => $data)
						@if($date_flag != $data['tanggal'])
							@php $date_flag = $data['tanggal'] @endphp
							<tr>
								<td class="text-left " colspan="4" style="vertical-align:middle;">
									<strong>{{$date_flag}}</strong>
								</td>
							</tr>
						@endif

						@forelse($data['pengajuan']['jaminan_kendaraan'] as $k => $v)
							@php $idx = $idx+1 @endphp
							<tr>
								<td class="text-center" style="vertical-align:middle;">{{$idx}}</td>
								<td class="text-left" style="border-right:0px;padding-left:50px;vertical-align:middle;">
									Kendaraan {{ str_replace('_',' ',$v['tipe']) }} 
									({{ $v['merk'] }} / {{ $v['tahun'] }})
									<br/>
									Nomor BPKB : {{$v['nomor_bpkb']}}
								</td>
								<td style="vertical-align:middle;">
									Nomor Pengajuan : {{$data['pengajuan']['id']}} <br/>
									Nasabah : {{$data['pengajuan']['debitur']['nama']}}
								</td>
								<td style="vertical-align:middle;">
									<a href="{{route('credit.show', ['id' => $data['pengajuan_id']])}}">Lihat</a>
								</td>
							</tr>
						@empty
						@endforelse

						@forelse($data['pengajuan']['jaminan_tanah_bangunan'] as $k => $v)
							@php $idx = $idx+1 @endphp
							<tr>
								<td class="text-center" style="vertical-align:middle;">{{$idx}}</td>
								<td class="text-left" style="border-right:0px;padding-left:50px;vertical-align:middle;">
									{{ $v['jenis_sertifikat'] }}
									<br/>
									Nomor Sertifikat : {{ $v['nomor_sertifikat'] }}
								</td>
								<td style="vertical-align:middle;">
									Nomor Pengajuan : {{$data['pengajuan']['id']}} <br/>
									Nasabah : {{$data['pengajuan']['debitur']['nama']}}
								</td>
								<td style="vertical-align:middle;">
									<a href="{{route('credit.show', ['id' => $data['pengajuan_id']])}}">Lihat</a>
								</td>
							</tr>
						@empty
						@endforelse

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