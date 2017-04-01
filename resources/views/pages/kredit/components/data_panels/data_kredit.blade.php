@php 
	if (!isset($edit))
	{
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kredit
			@if (!is_null($page_datas->credit))
				@if ($edit == true)
					<span class="pull-right">
						<small>
						<a href="#" data-toggle="modal" data-target="#data_aset" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
						</small>
					</span>
				@endif
			@endif
		</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Pengajuan Kredit</strong></p>
				<p>{{ $page_datas->credit['pengajuan_kredit'] }}</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jangka Waktu</strong></p>
				<p>{{ $page_datas->credit['jangka_waktu'] }} bulan</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Tanggal Pengajuan</strong></p>
				<p>{{ $page_datas->credit['tanggal_pengajuan'] }}</p>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jenis Kredit</strong></p>
				<p>{{ $page_datas->credit['jenis_kredit'] }}</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Nomor Kredit</strong></p>
				<p>{{ $page_datas->credit['nomor_kredit'] }}</p>
			</div>
		</div>
	</div>
</div>