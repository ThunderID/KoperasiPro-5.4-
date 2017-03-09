<div class="row">
<div class="col-sm-12">
	<h4 class="text-uppercase">DATA ASET</h4>
	<hr/>
</div>
</div>

<br>
<h5>Rumah</h5>
<table>
	@if(!empty($page_datas->credit['kreditur']['aset']['rumah']))
	{{-- @foreach((array)$page_datas->credit['kreditur']['aset'] as $value) --}}
		<tr class="row">
			<td class="col-sm-4"><h4><small>Status Kepemilikan</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ str_replace('_', ' ', $page_datas->credit['kreditur']['aset']['rumah']['status']) }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Sejak</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['rumah']['sejak'] }} Tahun</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Luas</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['rumah']['luas'] }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nilai Rumah</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['rumah']['nilai_rumah'] }}</h4>
			</td>
		</tr>
	{{-- @endforeach --}}
	@endif
</table>
<br>
<h5>Kendaraan</h5>
<table>
	@if(!empty($page_datas->credit['kreditur']['aset']['kendaraan']))
	{{-- @foreach((array)$page_datas->credit->asset->vehicles as $value) --}}
		<tr class="row">
			<td class="col-sm-4"><h4><small>Roda 2</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['kendaraan']['jumlah_kendaraan_r2'] }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Roda 4</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['kendaraan']['jumlah_kendaraan_r4'] }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nilai Kendaraan</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['kendaraan']['nilai_kendaraan'] }}</h4>
			</td>
		</tr>
	{{-- @endforeach --}}
	@endif
</table>
<br>
<h5>Perusahaan</h5>
<table>
	@if(!empty($page_datas->credit['kreditur']['aset']['usaha']))
	{{-- @foreach((array)$page_datas->credit->asset->companies as $value) --}}
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nama</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['usaha']['nama'] }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Status Usaha</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ str_replace('_', ' ', $page_datas->credit['kreditur']['aset']['usaha']['status_usaha']) }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Berdirinya Usaha</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['usaha']['sejak'] }}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Saham Usaha</small></h4></td>
			<td class="col-sm-8">
				<h4>{{ $page_datas->credit['kreditur']['aset']['usaha']['saham_usaha'] }}</h4>
			</td>
		</tr>
	{{-- @endforeach --}}
	@endif
</table>

<div class="clearfix">&nbsp;</div>
