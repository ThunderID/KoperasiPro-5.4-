@inject('dokcab', '\App\Service\Analis\RealisasiKredit')

@php
	$dokcab 	= $dokcab->analize([], $acl_logged_user);
@endphp
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					<h4>Kredit Menunggu Realisasi</h4>
					<p>Kredit - kredit dalam proses menunggu realisasi.</p>
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-left">No</th>
							<th class="text-left">Nasabah</th>
							<th class="text-center">Pinjaman</th>
							<th class="text-center">Jaminan</th>
							<th class="text-center">Tanggal Terakhir Pencairan</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-left">{{$key+1}}</td>
								<td class="text-left">
									{{$value['orang']['nama']}}  <br/>
									Telp. {{$value['orang']['telepon']}}
								</td>
								<td class="text-right">{{ucwords(str_replace('_', ' ', $value['pengajuan']['jenis_kredit']))}}<br/>{{$value['pengajuan']['pengajuan_kredit']}}</td>
								<td class="text-right">
									@foreach((array)$value['pengajuan']['jaminan_kendaraan'] as $jkkey => $jkvalue)
										{{ucwords($jkvalue['merk'])}} {{ucwords(str_replace('_', ' ', $jkvalue['tipe']))}}  / {{$jkvalue['tahun']}}
										<br/><br/>
									@endforeach
									@foreach((array)$value['pengajuan']['jaminan_tanah_bangunan'] as $jtbkey => $jtbvalue)
										{{ucwords(str_replace('_', ' ', $jtbvalue['jenis_sertifikat']))}} Luas 
										{{$jtbvalue['luas_tanah']}} / {{$jtbvalue['luas_bangunan']}}
										<br/><br/>
									@endforeach
								</td>
								<td class="text-center">{{$value['tanggal_jatuh_tempo']}}</td>
								<td class="text-right">
									<a href="{{route('credit.show', ['id' => $value['pengajuan_id'], 'status' => 'menunggu_realisasi', 'q' => $value['orang']['nama']])}}" style="text-decoration: none;">
										Kerjakan
									</a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="6" class="text-center"><i>Belum Ada</i></td>
							</tr>
						@endforelse
						@if(count($dokcab))
							<tr>
								<td colspan="6" class="text-right"><a href="{{route('credit.index', ['status' => 'menunggu_realisasi'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>