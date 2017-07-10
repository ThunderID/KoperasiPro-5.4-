@inject('analis', '\App\Service\Analis\CabangKekuranganOrang')

@php
	$analis 	= $analis->analize([], $acl_logged_user);
	$index 		= 0;
@endphp
<div class="row" style="padding:15px;">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					<h4>Posisi Kosong di Cabang</h4>
					<p>Berikut daftar user untuk menghandle proses (dalam sistem) yang belum terisi.</p>
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-left">No</th>
							<th class="text-left">Nama Koperasi</th>
							<th class="text-center">Jumlah User Saat Ini</th>
							<th class="text-center">Bagian Yang Belum Terisi</th>
							<th class="text-center">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse($analis as $key => $value)
							<tr>
								<td class="text-left">
									{{$index = $index +1}}
								</td>
								<td class="text-left">
									{{$value['nama']}}
									@if($value['baru'])
										<span class="label label-success">Baru</span>
									@endif
								</td>
								<td class="text-center">{{$value['total_user']}}</td>
								<td class="text-center">
									@foreach($value['empty_scopes'] as $key2 => $value2)
										@if($key2%3==0 && $key2!=0)
											<div style="padding-top:10px;"></div>
										@endif
										<span class="label label-danger">
											{{str_replace('_', ' ', $value2)}}
										</span>
										&nbsp;
									@endforeach	
								</td>
								<td>
									<a href="{{route('koperasi.show', $value['id'])}}" style="text-decoration: none;">
										Tambahkan User
									</a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5" class="text-center"><i>Belum Ada</i></td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>