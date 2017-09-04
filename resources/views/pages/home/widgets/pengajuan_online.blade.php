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
							<th class="text-left">Koperasi</th>
							<th class="text-left">Nasabah</th>
							<!-- <th class="text-left">Nomor Telepon</th> -->
							<th class="text-center">Pengajuan</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($dokcab as $key => $value)
							<tr>
								<td class="text-center">{{$key+1}}</td>
								<td class="text-left">
									{{$value['koperasi']['nama']}}
<!-- 									{{$value['tanggal_pengajuan']}}
									<br> ke <strong>{{$value['koperasi']['nama']}}</strong> -->
								</td>
								<td class="text-left">
									{{$value['debitur']['nama']}}
									<br> ({{$value['debitur']['telepon']}})
									<br> Nomor Pengajuan : 
									<br> <small>{{$value['id']}}</small>
								</td>
								<td class="text-left">
									<p>
										{{$value['tanggal_pengajuan']}}
										<br/>
										{{$value['pengajuan_kredit'].'/'.$value['jangka_waktu']}} bulan
										<br/>
										Suku Bunga : 0-5% / bulan
										<br/>
										Jaminan : 
										@foreach((array)$value['jaminan_kendaraan'] as $key2 => $value2)
											<span class="label label-primary">{{$value2['merk']}} {{str_replace('_',' ',$value2['tipe'])}} ({{$value2['tahun']}}) &nbsp; &nbsp; </span>
										@endforeach
										@foreach((array)$value['jaminan_tanah_bangunan'] as $key2 => $value2)
											<span class="label label-primary">{{$value2['jenis_sertifikat']}} {{$value2['tipe']}} ({{$value2['masa_berlaku_sertifikat']}}) &nbsp; &nbsp; </span>
										@endforeach
										<br/>
										Data Yang Kurang :
										@if(!$value['data_nasabah'])
											<span class="label label-danger">
												Data Debitur	
											</span>
										@endif
										&nbsp;&nbsp;
										@if(!$value['data_relasi'])
											<span class="label label-danger">
												Data Relasi	
											</span>
										@endif
										&nbsp;&nbsp;
										@if(!$value['data_jaminan'])
											<span class="label label-danger">
												Data Jaminan	
											</span>
										@endif


										<!-- @foreach($value['dokumen_ceklist'] as $kdc => $vdc)
											@if(!$vdc['is_added'])
												<span class="label label-danger">
													{{$vdc['judul']}}	
												</span>
												<div style="padding:5px;"></div>
											@endif
										@endforeach -->
									</p>
								</td>
								<td class="text-left">
									@if($value['followup']['is_called'])
										<i class="fa fa-check-square-o"></i> Sudah dihubungi 
										<br/>
										({{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value['followup']['updated_at'])->format('d/m/Y')}})
									@else
										<a href="{{route('credit.followup.store', ['akta_id' => $value['id']]) }}" style="text-decoration: none;">
											<i class="fa fa-square-o"></i> Hubungi
										</a>
									@endif
									<br>
									<br>
									<a href="{{$value['foto_ktp']}}" target="__blank" style="text-decoration: none;">
										 Lihat Foto KTP
									</a> &nbsp; |
									<a href="{{route('credit.show', ['id' => $value['id']]) }}" target="__blank" style="text-decoration: none;">
										 Lihat Kredit
									</a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5" class="text-center"><i>Belum Ada</i></td>
							</tr>
						@endforelse
						<!-- @if(count($dokcab))
							<tr>
								<td colspan="5" class="text-right"><a href="{{route('credit.index', ['status' => 'pengajuan'])}}">Lihat Lainnya</a></td>
							</tr>
						@endif -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>