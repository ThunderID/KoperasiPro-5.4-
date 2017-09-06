@inject('skservice', '\App\Service\Helpers\Kredit\StatusKreditService')

@extends('template.cms_template')

@section('laporan')
    active in
@stop

@section('riwayat_jaminan')
    active
@stop

@push('content')
	<div class="row p-b-md field">
		<div class="col-md-6">
			<h2>Laporan Riwayat Jaminan</h2>
			<p class="text-muted">Laporan ini untuk melihat {{str_replace('_',' / ',$page_datas->mode)}} yang pernah dijaminkan 
			</p>
		</div>
		{!! Form::open(['url' => route('laporan.riwayat_jaminan.index', Input::all()), 'class' => 'form form-inline', 'method' => 'GET']) !!}	
		<div class="col-md-4 col-md-offset-2 p-t-md text-right">
			<input type="hidden" name="mode" value="{{$page_datas->mode}}">
			<input type="text" name="nomor" value="{{$page_datas->nomor}}" class="form-control" placeholder="{{$page_datas->placeholder}}">
			<button class="btn btn-success">Cari</button>
		</div>
		{!!Form::close()!!}
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
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['mode' => 'kendaraan']))}}">Kendaraan</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['mode' => 'tanah_bangunan']))}}">Tanah & Bangunan</a></li>
				</ul>
			</div>
			<!-- <div class="btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>&nbsp;
					<span>Sort</span>&nbsp;<b class="caret"></b>
				</button>
				{{-- List Sort Here, please set empty the url --}}
				<ul class="dropdown-menu" role="menu" style="right:0px;left:auto;">
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'pengajuan']))}}">Pengajuan</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'survei']))}}">Survei</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'menunggu_persetujuan']))}}">Survei</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'tolak']))}}">Ditolak</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'menunggu_realisasi']))}}">Disetujui</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'realisasi']))}}">Aktif</a></li>
					<li><a href="{{route('laporan.riwayat_jaminan.index', array_merge(Input::all(), ['status' => 'lunas']))}}">Lunas</a></li>
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
						<th class="text-left">Jaminan</th>
						<th class="text-right">Pengajuan Kredit</th>
						<th class="text-left">Status Terakhir</th>
						<th class="text-center">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@php $date_flag = null @endphp
					@forelse ($page_datas->jaminan as $key => $data)
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
							<td class="text-left" style="vertical-align: middle;">
								@if($page_datas->mode == 'tanah_bangunan')
									@foreach($data['jaminan_tanah_bangunan'] as $k => $v)
										{{ $v['jenis_sertifikat'] }}
										<br/>
										Nomor Sertifikat : {{ $v['nomor_sertifikat'] }}
									@endforeach
								@else
									@foreach($data['jaminan_kendaraan'] as $k => $v)
										Kendaraan {{ str_replace('_',' ',$v['tipe']) }} 
										({{ $v['merk'] }} / {{ $v['tahun'] }})
										<br/>
										Nomor BPKB : {{$v['nomor_bpkb']}}
									@endforeach
								@endif
							</td>
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