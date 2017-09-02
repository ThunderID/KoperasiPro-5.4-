@inject('dokcab', '\App\Service\Analis\InspeksiDokumenCabang')

@php
	$dokcab 	= $dokcab->pengajuan_online([], $acl_logged_user);
@endphp
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					<h4>Pengajuan Online</h4>
					<p>Harap menghubungi nomor berikut untuk follow up pengajuan kredit.</p>
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-left">Sudah Dihubungi ? </th>
							<th class="text-left">Koperasi</th>
							<th class="text-left">Nama Nasabah</th>
							<th class="text-left">Nomor Telepon</th>
							<th class="text-center">Kelengkapan Dokumen</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-center">{{$key+1}}</td>
								<td class="text-left">{{$value['followup']['is_called']}}</td>
								<td class="text-left">{{$value['koperasi']['nama']}}</td>
								<td class="text-left">{{$value['debitur']['nama']}}</td>
								<td class="text-left">{{$value['debitur']['telepon']}}</td>
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
									<a href="{{route('credit.show', ['id' => $value['id'], 'status' => 'pengajuan', 'q' => $value['debitur']['nama']])}}" style="text-decoration: none;">
										Kerjakan
									</a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5" class="text-center"><i>Belum Ada</i></td>
							</tr>
						@endforelse
						@if(count($dokcab))
							<tr>
								<td colspan="5" class="text-right"><a href="{{route('credit.index', ['status' => 'pengajuan'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>