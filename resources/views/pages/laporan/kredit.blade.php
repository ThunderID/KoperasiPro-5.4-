@inject('skservice', '\App\Service\Helpers\Kredit\StatusKreditService')

@extends('template.cms_template')

@section('laporan')
    active in
@stop

@section('pengajuan_kredit')
    active
@stop

@push('content')
	<div class="row p-b-md field">
		<div class="col-md-6">
			<h2>Laporan Pengajuan Kredit</h2>
			<p class="text-muted">Laporan ini untuk melihat kredit yang diajukan 
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
						<th class="text-left" colspan="2">Nama Nasabah</th>
						<th class="text-center">Nomor Pengajuan</th>
						<th class="text-right">Pengajuan Kredit</th>
						<th class="text-center">Status Terakhir</th>
						<th class="text-center">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@php $date_flag = null @endphp
					@forelse ($page_datas->pengajuan as $key => $data)
						@if($date_flag != $data['tanggal_pengajuan'])
							@php $date_flag = $data['tanggal_pengajuan'] @endphp
							<tr>
								<td class="text-left" colspan="7">
									<strong>{{$date_flag}}</strong>
								</td>
							</tr>
						@endif
						<tr>
							<td class="text-center" style="vertical-align: middle;">{{($key+1)}}</td>
							<td class="text-left" style="border-right:0px;vertical-align: middle;">{{ $data['debitur']['nama'] }}</td>
							<td class="text-right" style="border-left:0px;vertical-align: middle;">@if(is_array($data['hp'])) <span class="label label-info">Mobile</span> @endif</td>
							<td class="text-center" style="vertical-align: middle;">{{ $data['id'] }}</td>
							<td class="text-right" style="vertical-align: middle;">{{ $data['pengajuan_kredit'] }} </td>
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
								<a href="{{route('credit.show', ['id' => $data['id']])}}">Lihat</a>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="7" class="text-center">Belum ada data</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			<!-- pagination -->	
		</div>
	</div>
@endpush