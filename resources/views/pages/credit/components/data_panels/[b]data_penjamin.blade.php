<div class="row">
	<div class="col-sm-12">
		<h4>DATA PENJAMIN</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">

		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Nama</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->credit->warrantor->name}}</strong></p>
			</div>
		</div>

	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<h5><a href="{{route('address.index', ['id' => $page_datas->credit->credit->warrantor->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5>
	</div>
</div>
