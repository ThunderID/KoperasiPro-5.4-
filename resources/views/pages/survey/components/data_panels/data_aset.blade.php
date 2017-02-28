<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset
			@if(!is_null($page_datas->credit->survey->asset))
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

@if(is_null($page_datas->credit->survey->asset))
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
		@if (is_null($page_datas->credit->survey->asset->houses))
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<h4 class="title-section light m-t-none">Rumah/Tanah</h4>
					<p>Belum ada asset</p>
				</div>
			</div>
		@else
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<h4 class="title-section light m-t-none">Rumah/Tanah</h4>
				</div>
			</div>
		@endif
	</div>

	@foreach ((array)$page_datas->credit->survey->asset->houses as $value)
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Status Rumah</strong></p>
				<p>
					{{ str_replace('_', ' ', $value->ownership_status) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Nilai Rumah/Tanah</strong></p>
				<p>
					{{ $value->worth->IDR() }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Luas Rumah/Tanah</strong></p>
				<p>
					{{ $value->size }}
				</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Sejak</strong></p>
				<p>
					{{ $value->since->format('d/m/Y') }}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Angsuran/KPR</strong></p>
				<p>
					{{ $value->installment_period }}
				</p>
			</div>
		</div>
	</div>
	@endforeach

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		@if (is_null($page_datas->credit->survey->asset->vehicles))
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<h4 class="title-section light m-t-none">Kendaraan</h4>
				</div>
			</div>
		@else
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<h4 class="title-section light m-t-none">Kendaraan</h4>
					<p>Belum ada asset</p>
				</div>
			</div>
		@endif
	</div>	

	@foreach ((array)$page_datas->credit->survey->asset->vehicles as $value)
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jumlah Kendaraan</strong></p>
				<p>
					{{ ( $value->four_wheels + $value->two_wheels) }}
				</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Nilai Kendaraan</strong></p>
				<p>
					{{ $value->worth->IDR() }}
				</p>
			</div>
		</div>
	</div>
	@endforeach

	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	<div class="col-sm-12">
		@if ($page_datas->credit->survey->asset->companies)
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<h4 class="title-section light m-t-none">Usaha/Perusahaan</h4>
				</div>
			</div>
		@else
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<h4 class="title-section light m-t-none">Usaha/Perusahaan</h4>
					<p>Belum ada asset</p>
				</div>
			</div>
		@endif
	</div>	

	@foreach ((array)$page_datas->credit->survey->asset->companies as $value)
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Nama Perusahaan/Usaha</strong></p>
				<p>
					{{ $value->name }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Bidang Usaha</strong></p>
				<p>
					{{ $value->area }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Status Usaha</strong></p>
				<p>
					{{ str_replace('_', ' ', $value->ownership_status) }}
				</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Kerjasama Bagi Hasil</strong></p>
				<p>
					{{ $value->share }}
				</p>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Nilai Asset Perusahaan</strong></p>
				<p>
					{{ $value->worth->IDR() }}
				</p>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endif