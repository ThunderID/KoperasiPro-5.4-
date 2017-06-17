@if (isset($page_datas->credit['nasabah']) && !empty($page_datas->credit['nasabah']))
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>nasabah</strong></p>
		</div>
	</div>
	<div class="row m-b-none">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<p class="text-capitalize text-light m-b-xs">
				Nama
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light m-b-xs">
				{{ (isset($page_datas->credit['nasabah']['nama']) && !is_null($page_datas->credit['nasabah']['nama'])) ? $page_datas->credit['nasabah']['nama'] : '-' }}
			</p>
		</div>
	</div>
	<div class="row m-b-none">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<p class="text-capitalize text-light m-b-xs">
				status
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light m-b-xs">
				{{ (isset($page_datas->credit['nasabah']['status']) && !is_null($page_datas->credit['nasabah']['status'])) ? str_replace('_', ' ', $page_datas->credit['nasabah']['status']) : '-' }}
			</p>
		</div>
	</div>
	<div class="row m-b-none">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<p class="text-capitalize text-light m-b-xs">
				kredit sebelumnya
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light m-b-xs">
				{{ (isset($page_datas->credit['nasabah']['kredit_terdahulu']) && !is_null($page_datas->credit['nasabah']['kredit_terdahulu'])) ? str_replace('_', ' ', $page_datas->credit['nasabah']['kredit_terdahulu']) : '-' }}
			</p>
		</div>
	</div>
	<div class="row m-b-xs">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<p class="text-capitalize text-light m-b-xs">
				jaminan sebelumnya
			</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<p class="text-capitalize text-light m-b-xs">
				{{ (isset($page_datas->credit['nasabah']['jaminan_terdahulu']) && !is_null($page_datas->credit['nasabah']['jaminan_terdahulu'])) ? $page_datas->credit['nasabah']['jaminan_terdahulu'] : '-' }}
			</p>
		</div>
	</div>
@else
@endif