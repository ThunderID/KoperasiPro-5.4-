@inject('dokcab', '\App\Service\Analis\InspeksiDokumenCabang')

@php
	$dokcab 	= $dokcab->survei([], $acl_logged_user);
	$index 		= 0;
@endphp
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					<h4>Checklists Survei</h4>
					<p>Harap segera melengkapi daftar survei bertanda merah berikut.</p>
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
						@forelse($dokcab as $skey => $svalue)
							<tr>
								<td class="text-center">{{($index=$index+1)}}</td>
								<td class="text-left">{{$svalue['koperasi']['nama']}}</td>
								<td class="text-left">{{$svalue['debitur']['nama']}}</td>
								<td class="text-right">
									<div>
										@if(!$svalue['data_nasabah'])
											<span class="label label-danger">
												Data Nasabah	
											</span>
										@else
											<span class="label label-success">
												Data Nasabah	
											</span>
										@endif
										&nbsp;

										@if(!$svalue['data_kepribadian'])
											<span class="label label-danger">
												Data Kepribadian	
											</span>
										@else
											<span class="label label-success">
												Data Kepribadian	
											</span>
										@endif
										&nbsp;
										
										@if(!$svalue['data_aset'])
											<span class="label label-danger">
												Data Aset	
											</span>
										@else
											<span class="label label-success">
												Data Aset	
											</span>
										@endif
										&nbsp;
									</div>

									<div style="padding-top:10px;">
										@if(!$svalue['data_jaminan'])
											<span class="label label-danger">
												Data Jaminan	
											</span>
										@else
											<span class="label label-success">
												Data Jaminan	
											</span>
										@endif
										&nbsp;

										@if(!$svalue['data_rekening'])
											<span class="label label-danger">
												Data Rekening	
											</span>
										@else
											<span class="label label-success">
												Data Rekening	
											</span>
										@endif
										&nbsp;

										@if(!$svalue['data_keuangan'])
											<span class="label label-danger">
												Data Keuangan	
											</span>
										@else
											<span class="label label-success">
												Data Keuangan	
											</span>
										@endif
										&nbsp;
									</div>
								</td>
								<td class="text-right">
									<a href="{{route('credit.show', $svalue['id'])}}" style="text-decoration: none;">
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
								<td colspan="5" class="text-right"><a href="{{route('credit.index', ['status' => 'survei'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>