@extends('template.cms_template')

@section('dashboard')
	active in
@stop

@push('content')
	<div class="row field">
		<div class="col-sm-12 text-center">
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			<!-- Here is stat Area -->
			<div class="row">
				<div class="col-sm-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-title m-b-xs">
								Kredit Menunggu Persetujuan
							</div>
							<div class="row">
								<div class="col-sm-12 text-right">
									<h4>{{$page_datas->stat_kredit_menunggu_persetujuan}}</h4>
									<p><small><small>Pekerjaan Belum Terselesaikan</small></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-title m-b-xs">
								Kredit Ditolak
							</div>
							<div class="row">
								<div class="col-sm-12 text-right">
									<h4>{{$page_datas->stat_kredit_ditolak}}</h4>
									<p><small><small>Total Kredit Ditolak</small></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-title m-b-xs">
								Kredit Terealisasi
							</div>
							<div class="row">
								<div class="col-sm-12 text-right">
									<h4>{{$page_datas->stat_kredit_terealisasi}}</h4>
									<p><small><small>Total Kredit Terealisasi</small></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-title m-b-xs">
								Pengajuan Kredit
							</div>
							<div class="row">
								<div class="col-sm-12 text-right">
									<h4>{{$page_datas->stat_pengajuan_kredit}}</h4>
									<p><small><small>Total Pengajuan Kredit</small></small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of stat Area -->

			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #DDDDDD">
								Kredit Menunggu Persetujuan
							</div>							
							<table class="table table-hover">
								<thead>
									<tr>
										<th class="text-left">Kreditur</th>
										<th class="text-right">Jumlah Kredit</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									@forelse($page_datas->kredit_menunggu_persetujuan as $key => $value)
										<tr>
											<td class="text-left">{{$value['nama_kreditur']}}</td>
											<td class="text-right">{{$value['pengajuan_kredit']}}</td>
											<td>
												<a href="{{route('credit.show', $value['id'])}}" style="text-decoration: none;">
													Kerjakan
												</a>
											</td>	
										</tr>
									@empty
										<tr>
											<td colspan="3" class="text-center"><i>Belum Ada</i></td>
										</tr>
									@endforelse
									@if($page_datas->stat_kredit_menunggu_persetujuan > 10)
										<tr>
											<td colspan="3" class="text-right"><a href="{{route('credit.index', ['status' => 'menunggu_persetujuan'])}}">Lihat Lainnya</a></td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-body">

								Kredit Terealisasi
							</div>							
							<table class="table table-hover">
								<thead>
									<tr>
										<th class="text-left">Koperasi</th>
										<th class="text-right">Jumlah Kredit</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									@forelse($page_datas->kredit_terealisasi as $key => $value)
										<tr>
											<td class="text-left">{{$value['cabang']['nama']}}</td>
											<td class="text-right">{{$value['pengajuan_kredit']}}</td>
											<td>
												<a href="{{route('credit.show', $value['id'])}}" style="text-decoration: none;">
													Lihat
												</a>
											</td>	
										</tr>
									@empty
										<tr>
											<td colspan="3" class="text-center"><i>Belum Ada</i></td>
										</tr>
									@endforelse
									@if($page_datas->stat_kredit_terealisasi > 10)
										<tr>
											<td colspan="3" class="text-right"><a href="{{route('credit.index', ['status' => 'menunggu_realisasi'])}}">Lihat Lainnya</a></td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>	
@endpush

@push('scripts')
@endpush
