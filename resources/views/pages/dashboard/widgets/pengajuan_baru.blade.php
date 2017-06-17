@inject('daftar', '\TQueries\Kredit\DaftarKredit')

@php
	$daftar 	= $daftar->get(['per_page' => 10, 'status' => 'pengajuan']);
@endphp
<div class="row" style="padding:15px;">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					Pengajuan Baru
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-left">Nama</th>
							<th class="text-right">Nominal</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($daftar as $key => $value)
							<tr>
								<td class="text-left">{{$value['kreditur']['nama']}}</td>
								<td class="text-right">{{$value['pengajuan_kredit']}}</td>
								<td class="text-right">
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
						@if(count($daftar))
							<tr>
								<td colspan="3" class="text-right"><a href="{{route('credit.index', ['status' => 'pengajuan'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>