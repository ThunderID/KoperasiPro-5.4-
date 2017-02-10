<div class="row">
	<div class="col-sm-12">
		<h3>DATA PRIBADI</h3>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Nama</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->name}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Tempat Lahir</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->place_of_birth}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Tanggal Lahir</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->date_of_birth->format('d M Y')}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Jenis Kelamin</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->gender}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Agama</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->religion}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Pendidikan Terakhir</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->highest_education}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Status Pernikahan</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->marital_status}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<h4><small>Nomor Telepon</small></h4>
	</div>
	<div class="col-sm-6">
		<h4>{{$page_datas->credit->creditor->phone_number}}</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 text-right">
		<h5><a href="{{route('address.show', ['id' => $page_datas->credit->creditor->id, 'mode' => 'house'])}}">Lihat Alamat</a></h5>
	</div>
</div>

@foreach($page_datas->credit->creditor->works as $key => $value)
	<div class="row">
		<div class="col-sm-6">
			<h4><small>Jenis Pekerjaan</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->area}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h4><small>Posisi</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->position}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<h4><small>Sejak</small></h4>
		</div>
		<div class="col-sm-6">
			<h4>{{$value->since->format('d M Y')}}</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 text-right">
			<h5><a href="{{route('address.show', ['id' => $value->office->id, 'mode' => 'office'])}}">Lihat Alamat</a></h5>
		</div>
	</div>
@endforeach
