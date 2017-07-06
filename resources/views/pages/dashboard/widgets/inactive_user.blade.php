@inject('pengguna', '\TImmigration\Models\Visa_A')

@php
	$pengguna 	= $pengguna->where('immigration_ro_koperasi_id', $acl_active_office['koperasi']['id'])->wherenull('last_logged')->orwhere('last_logged', '<', Carbon\Carbon::parse('- 7 days')->format('Y-m-d H:i:s'))->with(['pengguna'])->skip(0)->take(10)->get();
@endphp
<div class="row" style="padding:15px;">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-title p-b-md text-left" style="border-bottom: 1px solid #E9E9E9">
					Inactive User
				</div>							
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="text-left">Nama</th>
							<th class="text-right">Terakhir Login</th>
						</tr>
					</thead>
					<tbody>
						@forelse($pengguna as $key => $value)
							<tr>
								<td class="text-left">{{$value['pengguna']['nama']}}</td>
								<td class="text-right">{{$value['pengajuan_kredit']}}</td>
								<td class="text-center">
									
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="2" class="text-center"><i>Belum Ada</i></td>
							</tr>
						@endforelse
						@if(count($pengguna))
							<tr>
								<td colspan="2" class="text-right"><a href="{{route('pengguna.index')}}">Lihat Lainnya</a></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>