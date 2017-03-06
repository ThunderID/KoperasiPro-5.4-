<div class="row m-t-md-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA PRIBADI</h4>
		<hr class="print"/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Nama</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->name }}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Jenis Kelamin</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->gender }}</strong></p>
			</div>
		</div>		
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Tanggal Lahir</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->date_of_birth->format('d/m/Y') }}</strong></p>
			</div>
		</div>	
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Tempat Lahir</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->place_of_birth }}</strong></p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Pendidikan Terakhir</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->highest_education }}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Status Pernikahan</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->marital_status }}</strong></p>
			</div>
		</div>			
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Agama</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $page_datas->credit->creditor->religion }}</strong></p>
			</div>
		</div>		
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

@if (!is_null($page_datas->credit->creditor->phones))
<div class="row m-t-xs-print">
	<div class="col-sm-12">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Nomor Telepon</p>
			</div>
			<div class="col-sm-8">
				@foreach((array)$page_datas->credit->creditor->phones as $phone)
				<p>
					<strong>
						{{ $phone->number }}
					</strong>>
				</p>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endif

<div class="clearfix hidden-print">&nbsp;</div>

@if(!is_null($page_datas->credit->creditor->works))
<div class="row">
	@forelse($page_datas->credit->creditor->works as $key => $value)
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Jenis Pekerjaan</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $value->area }}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Posisi</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $value->position }}</strong></p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Sejak</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{ $value->since->format('d/m/Y') }}</strong></p>
			</div>
		</div>
	</div>
	@empty
	<div class="col-sm-6"></div>
	@endforelse
</div>
@endif