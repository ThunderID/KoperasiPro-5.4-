<div class="row">
	<div class="col-sm-12">
		<h3>DATA PENJAMIN</h3>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Nama</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->credit->warrantor->name}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 text-right">
		<h5><a href="{{route('address.index', ['id' => $page_datas->credit->credit->warrantor->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5>
	</div>
</div>
