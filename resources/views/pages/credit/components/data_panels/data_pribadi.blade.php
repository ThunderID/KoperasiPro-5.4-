<div class="row">
	<div class="col-sm-12">
		<h4>DATA PRIBADI</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nama</strong></p>
				<p>
					{{$page_datas->credit->creditor->name}}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Jenis Kelamin</strong></p>
				<p>
					{{$page_datas->credit->creditor->gender}}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Tanggal Lahir</strong></p>
				<p>
					{{$page_datas->credit->creditor->date_of_birth->format('d M Y')}}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Tempat Lahir</strong></p>
				<p>
					{{$page_datas->credit->creditor->place_of_birth}}
				</p>
			</div>
		</div>		
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Pendidikan Terakhir</strong></p>
				<p>
					{{$page_datas->credit->creditor->highest_education}}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Status Pernikahan</strong></p>
				<p>
					{{$page_datas->credit->creditor->marital_status}}
				</p>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Agama</strong></p>
				<p>
					{{$page_datas->credit->creditor->religion}}
				</p>
			</div>
		</div>
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nomor Telepon</strong></p>
				<?php
				// @foreach((array)$page_datas->credit->creditor->phones as $phone)
				// 	<p>
				// 		{{$phone->number}}
				// 	</p>
				// @endforeach
				?>
			</div>
		</div>
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Alamat</strong></p>
				<p class="p-b-xs">{{ $page_datas->creditor_address_active->address->address->street }}, {{ $page_datas->creditor_address_active->address->address->city }}</p>
				<p>{{ $page_datas->creditor_address_active->address->address->province }} - {{ $page_datas->creditor_address_active->address->address->country }}</p>
				<div class="clearfix">&nbsp;</div>
				<h5><a href="{{route('person.index', ['id' => $page_datas->credit->creditor->id, 'status' => 'rumah'])}}">Lihat Alamat Lain</a></h5>
			</div>
		</div>
	</div>
</div>


<div class="row">
	@if(isset($page_datas->credit->creditor->works))
		@foreach($page_datas->credit->creditor->works as $key => $value)
			<div class="col-sm-6">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p style="margin-bottom: 7px;"><strong>Jenis Pekerjaan</strong></p>
						<p>
							{{$value->area}}
						</p>
					</div>
				</div>
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p style="margin-bottom: 7px;"><strong>Posisi</strong></p>
						<p>
							{{$value->position}}
						</p>
					</div>
				</div>					
			</div>
			<div class="col-sm-6">
				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p style="margin-bottom: 7px;"><strong>Sejak</strong></p>
						<p>
							{{$value->since->format('d M Y')}}
						</p>
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