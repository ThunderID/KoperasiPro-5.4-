<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">DATA PENJAMIN</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nama</strong></p>
				<p>
					{{$page_datas->credit->credit->warrantor->name}}
				</p>
			</div>
		</div>

	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<h5><a href="{{route('person.index', ['id' => $page_datas->credit->credit->warrantor->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5>
	</div>
</div>
