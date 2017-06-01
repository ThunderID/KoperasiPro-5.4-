@php
	if (!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kredit
			@if (!empty($page_datas->credit['id']))
				@if ($edit == true)
					<span class="pull-right text-capitalize">
						<small>
						<a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" no-data-pjax>
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

@if (isset($page_datas->credit['id']) && !empty($page_datas->credit['id']))
	<div class="row p-t-sm m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				Tanggal pengajuan
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['tanggal_pengajuan']) && !is_null($page_datas->credit['tanggal_pengajuan'])) ? $page_datas->credit['tanggal_pengajuan'] : '-' }}
			</p>
		</div>
	</div>
	<div class="row p-t-sm m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				jenis kredit
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				@if (isset($page_datas->credit['jenis_kredit']) && !is_null($page_datas->credit['jenis_kredit']))
					@if ($page_datas->credit['jenis_kredit'] == 'pa')
						Angsuran
					@elseif ($page_datas->credit['jenis_kredit'] == 'pt')
						Musiman
					@elseif ($page_datas->credit['jenis_kredit'] == 'rumah_delta')
						Rumah Delta
					@else
						{{ str_replace('_', ' ', $page_datas->credit['jenis_kredit']) }}
					@endif
				@endif
			</p>
		</div>
	</div>
	<div class="row p-t-sm m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				jangka waktu
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['jangka_waktu']) && !is_null($page_datas->credit['jangka_waktu'])) ? $page_datas->credit['jangka_waktu'] : '-' }} Bulan
			</p>
		</div>
	</div>
	<div class="row p-t-sm m-b-sm">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<p class="text-capitalize text-light">
				pengajuan kredit
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light">
				{{ (isset($page_datas->credit['pengajuan_kredit']) && !is_null($page_datas->credit['pengajuan_kredit'])) ? $page_datas->credit['pengajuan_kredit'] : '-' }}
			</p>
		</div>
	</div>

	<div class="row p-t-lg m-b-sm">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p class="text-capitalize text-light m-b-sm">Tanda Tangan</p>
			<div class="img-thumbnail" style="width: 50%; min-height: 120px;">
				@if (isset($page_datas->credit['spesimen_ttd']))
					<img src="{{ $page_datas->credit['spesimen_ttd'] }}" class="img img-rounded" style="height: 120px;"/>
				@endif
			</div>
		</div>
	</div>

@else
	<!-- No data -->
	<div class="row m-b-xl">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="kredit" data-panel="data-kredit" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>