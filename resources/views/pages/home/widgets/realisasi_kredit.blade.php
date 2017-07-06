@inject('dokcab', '\App\Service\Analis\RealisasiKredit')

@php
	$dokcab 	= $dokcab->analize([], $acl_logged_user);
@endphp
<div class="row" style="padding:15px;">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					Menunggu Realisasi
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-left">Nama</th>
							<th class="text-right">Nominal</th>
							<th class="text-center">Tanggal Terakhir Pencairan</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-left">{{$value['orang']['nama']}}</td>
								<td class="text-right">{{$value['referensi']['pengajuan_kredit']}}</td>
								<td class="text-center">{{$value['tanggal_jatuh_tempo']}}</td>
								<td class="text-right">
									<a href="{{route('kasir.kas.show', ['section' => 'realisasi','id' => $value['id']])}}" style="text-decoration: none;">
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
								<td colspan="4" class="text-right"><a href="{{route('kasir.kas.index', ['menunggu_realisasi'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>