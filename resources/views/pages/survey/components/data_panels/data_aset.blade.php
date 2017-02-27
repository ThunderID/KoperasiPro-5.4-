<div class="row">
	<div class="col-sm-12">
		<h4>Data Aset
			@if(!empty($page_datas->credit->survey->asset))
			<span class="pull-right">
				<small>
				<a href="#data-aset" data-toggle="modal" data-target="#data_aset" no-data-pjax>
					<i class="fa fa-pencil" aria-hidden="true"></i>
					 Edit
				</a>
				</small>
			</span>
			@endif
		</h4>
		<hr/>
	</div>
</div>

@if(empty($page_datas->credit->survey->asset))
<!-- no data -->
<div class="row">
	<div class="col-sm-12">
		<p>Belum ada data disimpan. <a href="#data-aset" data-toggle="modal" data-target="#data_aset" no-data-pjax> Tambahkan Sekarang </a></p>
	</div>
</div>

<div class="row clearfix">&nbsp;</div>
<div class="row clearfix">&nbsp;</div>
@else
<!-- with data -->
<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Rumah/Tanah</h4>
				</hr>
			</div>
		</div>
	</div>

	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Status Rumah</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nilai Rumah/Tanah</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Luas Rumah/Tanah</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>

	</div>
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Sejak</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>	

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Angsuran/KPR</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>			

	</div>

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Kendaraan</h4>
				</hr>
			</div>
		</div>
	</div>	

	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Jumlah Kendaraan</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>

	</div>
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nilai Kendaraan</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>		

	</div>

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<h4 style="margin-top:0px;font-weight: 100px; font-size: 16px;">Usaha/Perusahaan</h4>
				</hr>
			</div>
		</div>
	</div>	

	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nama Perusahaan/Usaha</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Bidang Usaha</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Status Usaha</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>			

	</div>
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Kerjasama Bagi Hasil</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Nilai Asset Perusahaan</strong></p>
				<p>
					Dummy
				</p>
			</div>
		</div>				

	</div>	

</div>
@endif