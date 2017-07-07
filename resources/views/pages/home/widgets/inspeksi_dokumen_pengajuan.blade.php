@inject('dokcab', '\App\Service\Analis\InspeksiDokumenCabang')

@php
	$dokcab 	= $dokcab->pengajuan([], $acl_logged_user);
@endphp
<div class="row" style="padding:15px;">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					Dokumen Pengajuan yang Belum Lengkap
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-left">Koperasi</th>
							<th class="text-left">Nama Nasabah</th>
							<th class="text-center">Kelengkapan Dokumen</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-center">{{$key+1}}</td>
								<td class="text-left">{{$value['koperasi']['nama']}}</td>
								<td class="text-left">{{$value['debitur']['nama']}}</td>
								<td class="text-right">
									<p>
									@if(!$value['data_nasabah'])
										<span class="label label-danger">
											Data Debitur	
										</span>
									@else
										<span class="label label-success">
											Data Debitur	
										</span>
									@endif
									&nbsp;&nbsp;
									@if(!$value['data_relasi'])
										<span class="label label-danger">
											Data Relasi	
										</span>
									@else
										<span class="label label-success">
											Data Relasi	
										</span>
									@endif
									&nbsp;&nbsp;
									@if(!$value['data_jaminan'])
										<span class="label label-danger">
											Data Jaminan	
										</span>
									@else
										<span class="label label-success">
											Data Jaminan	
										</span>
									@endif
									</p>
								</td>
								<td class="text-right">
									<a href="{{route('credit.show', $value['id'])}}" style="text-decoration: none;">
										Kerjakan
									</a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4" class="text-center"><i>Belum Ada</i></td>
							</tr>
						@endforelse
						@if(count($dokcab))
							<tr>
								<td colspan="4" class="text-right"><a href="{{route('credit.index', ['status' => 'pengajuan'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>