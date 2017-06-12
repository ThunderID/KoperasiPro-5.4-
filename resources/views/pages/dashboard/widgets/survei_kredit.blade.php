@inject('dokcab', '\App\Service\Analis\InspeksiDokumenCabang')

@php
	$dokcab 	= $dokcab->survei();
@endphp
<div class="row" style="padding:15px;">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					Survei
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-left">Koperasi</th>
							<th class="text-left">Nama Nasabah</th>
							<th class="text-right">Kelengkapan Dokumen</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-left">{{$value['cabang']['nama']}}</td>
								<td class="text-left">{{$value['nama_kreditur']}}</td>
								<td class="text-right">
									@if(!$value['data_nasabah'])
										Data Nasabah <i class="fa fa-close"></i>
									@endif
									<br>
									@if(!$value['data_kepribadian'])
										Data Kepribadian <i class="fa fa-close"></i>
									@endif
									@if(!$value['data_aset'])
										Data Aset <i class="fa fa-close"></i>
									@endif
									<br>
									@if(!$value['data_jaminan'])
										Data Jaminan <i class="fa fa-close"></i>
									@endif
									<br>
									@if(!$value['data_rekening'])
										Data Rekening <i class="fa fa-close"></i>
									@endif
									@if(!$value['data_keuangan'])
										Data Keuangan <i class="fa fa-close"></i>
									@endif
								</td>
								<td class="text-right">
									<a href="{{route('credit.show', $value['nomor_dokumen_kredit'])}}" style="text-decoration: none;">
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