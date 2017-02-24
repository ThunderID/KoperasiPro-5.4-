<div class="row">
	<div class="col-sm-12">
		<h4>DATA PRIBADI</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Nama</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->name}}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Jenis Kelamin</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->gender}}</strong></p>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Tanggal Lahir</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->date_of_birth->format('d M Y')}}</strong></p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Tempat Lahir</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->place_of_birth}}</strong></p>
			</div>
		</div>				
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Pendidikan Terakhir</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->highest_education}}</strong></p>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Status Pernikahan</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->marital_status}}</strong></p>
			</div>
		</div>			
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Agama</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->creditor->religion}}</strong></p>
			</div>
		</div>		
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Nomor Telepon</p>
			</div>
			<div class="col-sm-6">
				@foreach((array)$page_datas->credit->creditor->phones as $phone)
					<p>
						<strong>
							{{$phone->number}}
						</strong>>
					</p>
				@endforeach
			</div>
		</div>		
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h5><a href="#">Lihat Alamat</a></h5>
			</div>
		</div>
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	@if(isset($page_datas->credit->creditor->works))
		@foreach($page_datas->credit->creditor->works as $key => $value)
			<div class="col-sm-6">
				<div class="row m-b-xl">
					<div class="col-sm-6">
						<p>Jenis Pekerjaan</p>
					</div>
					<div class="col-sm-6">
						<p><strong>{{$value->area}}</strong></p>
					</div>
				</div>
				<div class="row m-b-xl">
					<div class="col-sm-6">
						<p>Posisi</p>
					</div>
					<div class="col-sm-6">
						<p><strong>{{$value->position}}</strong></p>
					</div>
				</div>									
			</div>
			<div class="col-sm-6">
				<div class="row m-b-xl">
					<div class="col-sm-6">
						<p>Sejak</p>
					</div>
					<div class="col-sm-6">
						<p><strong>{{$value->since->format('d M Y')}}</strong></p>
					</div>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="col-sm-12">
				<h5><a href="#">Lihat Alamat</a></h5>
			</div>
		@endforeach
	@endif
</div>