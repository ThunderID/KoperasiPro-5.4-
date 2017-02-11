<div class="row">
	<div class="col-sm-12">
		<h3>DATA KELUARGA</h3>
		<hr/>
	</div>
</div>

@foreach($page_datas->credit->creditor->relatives as $key => $value)
	<div class="row">
		<div class="col-sm-6">
			<h4><small>Hubungan</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->relation}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h4><small>Nama</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->name}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 text-right">
			<h5><a href="{{route('address.index', ['id' => $value->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5>
		</div>
	</div>
@endforeach