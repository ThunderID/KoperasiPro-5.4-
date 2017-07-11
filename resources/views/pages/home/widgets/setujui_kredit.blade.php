@inject('dokcab', '\App\Service\Analis\SetujuiKredit')

@php
	$dokcab 	= $dokcab->analize([], $acl_logged_user);
@endphp
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" style="border-top: none;border-top-left-radius: 0; border-top-right-radius: 0;">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					<h4>Kredit Untuk Disetujui</h4>
					<p>Kredit - kredit berikut menunggu persetujuan.</p>
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-left">Nasabah</th>
							<th class="text-right">Pinjaman</th>
							<th class="text-right">Jaminan</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-center">{{$key+1}}</td>
								<td class="text-left">
									{{$value['debitur']['nama']}}  <br/>
									{{ucwords(str_replace('_', ' ', $value['debitur']['pekerjaan']))}} / {{$value['survei_keuangan'][count($value['survei_keuangan']) - 1]['penghasilan_bersih']}}
								</td>
								<td class="text-right">{{ucwords(str_replace('_', ' ', $value['jenis_kredit']))}}<br/>{{$value['pengajuan_kredit']}}</td>
								<td class="text-right">
									@foreach((array)$value['jaminan_kendaraan'] as $jkkey => $jkvalue)
										{{ucwords($jkvalue['merk'])}} {{ucwords(str_replace('_', ' ', $jkvalue['tipe']))}}  / {{$jkvalue['tahun']}}<br/>
										{{$jkvalue['survei_jaminan_kendaraan'][count($jkvalue['survei_jaminan_kendaraan']) - 1]['harga_taksasi']}}
										<br/><br/>
									@endforeach
									@foreach((array)$value['jaminan_tanah_bangunan'] as $jtbkey => $jtbvalue)
										{{ucwords(str_replace('_', ' ', $jtbvalue['jenis_sertifikat']))}} Luas 
										{{$jtbvalue['luas_tanah']}} / {{$jtbvalue['luas_bangunan']}}<br/>
										{{$jkvalue['survei_jaminan_tanah_bangunan'][count($jkvalue['survei_jaminan_tanah_bangunan']) - 1]['harga_taksasi']}}
										<br/><br/>
									@endforeach
								</td>
								<td class="text-right">
									<a href="{{route('credit.show', ['id' => $value['id'], 'status' => 'menunggu_persetujuan', 'q' => $value['debitur']['nama']])}}" style="text-decoration: none;">
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