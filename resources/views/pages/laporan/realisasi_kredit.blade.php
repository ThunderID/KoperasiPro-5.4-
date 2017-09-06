@inject('skservice', '\App\Service\Helpers\Kredit\StatusKreditService')

@extends('template.cms_template')

@section('laporan')
    active in
@stop

@section('realisasi_kredit')
    active
@stop

@push('content')
	<div class="row p-b-md field">
		<div class="col-md-6">
			<h2>Laporan Realisasi Kredit</h2>
			<p class="text-muted">Laporan ini untuk melihat kredit yang direalisasikan 
			@if($page_datas->start==$page_datas->end)
				tanggal {{$page_datas->start}}
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
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'pengajuan']))}}">Pengajuan</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'survei']))}}">Survei</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'menunggu_persetujuan']))}}">Menunggu Persetujuan</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'tolak']))}}">Ditolak</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'menunggu_realisasi']))}}">Disetujui</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'realisasi']))}}">Aktif</a></li>
					<li><a href="{{route('laporan.pengajuan_kredit.index', array_merge(Input::all(), ['status' => 'lunas']))}}">Lunas</a></li>
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
						<th class="text-left">Nama Nasabah</th>
						<th class="text-center">Nomor Kredit</th>
						<th class="text-right">Pinjaman </th>
						<th class="text-center">Status Terakhir</th>
						<th class="text-center">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@php $date_flag = null @endphp
					@forelse ($page_datas->kredit as $key => $data)
						@if($date_flag != $data['tanggal'])
							@php $date_flag = $data['tanggal'] @endphp
							<tr>
								<td class="text-left" colspan="6">
									<strong>{{$date_flag}}</strong>
								</td>
							</tr>
						@endif
						<tr>
							<td class="text-center" style="vertical-align: middle;">{{($key+1)}}</td>
							<td class="text-left" style="border-right:0px;vertical-align: middle;">{{ $data['pengajuan']['debitur']['nama'] }}</td>
							<td class="text-center" style="vertical-align: middle;">{{ $data['pengajuan']['nomor_kredit'] }}</td>
							<td class="text-right" style="vertical-align: middle;">{{ $data['pengajuan']['pengajuan_kredit'] }} </td>
							<td class="text-left">
								@foreach($skservice->get() as $k => $v)
									@if($data['status']==$k)
										<span class="label label-success">{{$v}}</span>
									@else
										<span class="label label-default">{{$v}}</span>
									@endif
									@if($k=='menunggu_persetujuan')
										<div class="p-t-sm"></div>
									@endif
								@endforeach
							</td>
							<td class="text-center" style="vertical-align: middle;">
								<a href="{{route('credit.show', ['id' => $data['pengajuan']['id']])}}">Lihat</a>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="6" class="text-center">Belum ada data</td>
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