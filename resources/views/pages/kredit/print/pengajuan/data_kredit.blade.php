@if (isset($page_datas->credit['id']) && !empty($page_datas->credit['id']))
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>kredit</strong></p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					Tanggal pengajuan
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['tanggal_pengajuan']) && !is_null($page_datas->credit['tanggal_pengajuan'])) ? $page_datas->credit['tanggal_pengajuan'] : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					jenis kredit
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['jenis_kredit']) && !is_null($page_datas->credit['jenis_kredit'])) ? str_replace('_', ' ', $page_datas->credit['jenis_kredit']) : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					jangka waktu
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['jangka_waktu']) && !is_null($page_datas->credit['jangka_waktu'])) ? $page_datas->credit['jangka_waktu'] : '-' }} Bulan
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					pengajuan kredit
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['pengajuan_kredit']) && !is_null($page_datas->credit['pengajuan_kredit'])) ? $page_datas->credit['pengajuan_kredit'] : '-' }}
				</p>
			</div>
		</div>
	</div>
@else
@endif