<div class="row">
<div class="col-sm-12">
	<h3>DATA ASET</h3>
	<hr/>
</div>
</div>

<br>
<h5>Rumah</h5>
<table>
	@foreach((array)$page_datas->credit->asset->houses as $value)
		<tr class="row">
			<td class="col-sm-4"><h4><small>Status Kepemilikan</small></h4></td>
			<td class="col-sm-8">
				<h4>{{str_replace('_', ' ', $value->ownership_status)}}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Lama Menempati</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->since->DiffInYears()}} Tahun</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Luas</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->size}}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nilai Rumah</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->worth->IDR()}}</h4>
			</td>
		</tr>
	@endforeach
</table>
<br>
<h5>Kendaraan</h5>
<table>
	@foreach((array)$page_datas->credit->asset->vehicles as $value)
		<tr class="row">
			<td class="col-sm-4"><h4><small>Roda 2</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->two_wheels}}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Roda 4</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->four_wheels}}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nilai Kendaraan</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->worth->IDR()}}</h4>
			</td>
		</tr>
	@endforeach
</table>
<br>
<h5>Perusahaan</h5>
<table>
	@foreach((array)$page_datas->credit->asset->companies as $value)
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nama</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->name}}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Status Usaha</small></h4></td>
			<td class="col-sm-8">
				<h4>{{str_replace('_', ' ', $value->ownership_status)}}</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Lama Usaha</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->since->DiffInYears()}} Tahun</h4>
			</td>
		</tr>
		<tr class="row">
			<td class="col-sm-4"><h4><small>Nilai Kendaraan</small></h4></td>
			<td class="col-sm-8">
				<h4>{{$value->worth->IDR()}}</h4>
			</td>
		</tr>
	@endforeach
</table>

<div class="clearfix">&nbsp;</div>
