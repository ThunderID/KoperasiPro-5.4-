<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>keuangan</strong></p>
	</div>
</div>

@if (isset($page_datas->credit['keuangan']) && !empty($page_datas->credit['keuangan']))
	<div class="row">
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			{{-- pendapatan --}}
			<div class="row m-b-none">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-b-xs text-muted text-capitalize text-sm"><u>pendapatan</u></p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">penghasilan rutin</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['penghasilan_rutin']) && !is_null($page_datas->credit['keuangan']['penghasilan_rutin'])) ? $page_datas->credit['keuangan']['penghasilan_rutin'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">penghasilan pasangan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['penghasilan_pasangan']) && !is_null($page_datas->credit['keuangan']['penghasilan_pasangan'])) ? $page_datas->credit['keuangan']['penghasilan_pasangan'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">penghasilan usaha</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['penghasilan_usaha']) && !is_null($page_datas->credit['keuangan']['penghasilan_usaha'])) ? $page_datas->credit['keuangan']['penghasilan_usaha'] : '-' }}</p>
				</div>
			</div>
			<hr class="m-t-none m-b-xs"/>
			<div class="row m-b-sm">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">total Pendapatan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['total_pendapatan']) && !is_null($page_datas->credit['keuangan']['total_pendapatan'])) ? $page_datas->credit['keuangan']['total_pendapatan'] : '-' }}</p>
				</div>
			</div> 
			{{-- biaya --}}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-b-xs text-capitalize text-sm text-muted"><u>biaya</u></p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">biaya rumah tangga</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['biaya_rumah_tangga']) && !is_null($page_datas->credit['keuangan']['biaya_rumah_tangga'])) ? $page_datas->credit['keuangan']['biaya_rumah_tangga'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">biaya pendidikan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['biaya_pendidikan']) && !is_null($page_datas->credit['keuangan']['biaya_pendidikan'])) ? $page_datas->credit['keuangan']['biaya_pendidikan'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">biaya rutin</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['biaya_rutin']) && !is_null($page_datas->credit['keuangan']['biaya_rutin'])) ? $page_datas->credit['keuangan']['biaya_rutin'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">biaya angsuran</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['biaya_angsuran']) && !is_null($page_datas->credit['keuangan']['biaya_angsuran'])) ? $page_datas->credit['keuangan']['biaya_angsuran'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">biaya lain-lain</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['biaya_lain']) && !is_null($page_datas->credit['keuangan']['biaya_lain'])) ? $page_datas->credit['keuangan']['biaya_lain'] : '-' }}</p>
				</div>
			</div>
			<hr class="m-t-none m-b-xs"/>
			<div class="row m-b-sm">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">total biaya</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['total_biaya']) && !is_null($page_datas->credit['keuangan']['total_biaya'])) ? $page_datas->credit['keuangan']['total_biaya'] : '-' }}</p>
				</div>
			</div>
			
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">total pendapatan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['total_pendapatan']) && !is_null($page_datas->credit['keuangan']['total_pendapatan'])) ? $page_datas->credit['keuangan']['total_pendapatan'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">total biaya</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['total_biaya']) && !is_null($page_datas->credit['keuangan']['total_biaya'])) ? $page_datas->credit['keuangan']['total_biaya'] : '-' }}</p>
				</div>
			</div>
			<hr class="m-t-none m-b-xs"/>
			<div class="row m-b-sm">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">penghasilan bersih</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['penghasilan_bersih']) && !is_null($page_datas->credit['keuangan']['penghasilan_bersih'])) ? $page_datas->credit['keuangan']['penghasilan_bersih'] : '-' }}</p>
				</div>
			</div>
			
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">sumber penghasilan utama</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['sumber_penghasilan_utama']) && !is_null($page_datas->credit['keuangan']['sumber_penghasilan_utama'])) ? $page_datas->credit['keuangan']['sumber_penghasilan_utama'] : '-' }}</p>
				</div>
			</div>
			<div class="row m-b-none">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-b-xs text-light text-capitalize">jumlah tanggungan keluarga</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs text-light">{{ (isset($page_datas->credit['keuangan']['jumlah_tanggungan_keluarga']) && !is_null($page_datas->credit['keuangan']['jumlah_tanggungan_keluarga'])) ? $page_datas->credit['keuangan']['jumlah_tanggungan_keluarga'] : '-' }}</p>
				</div>
			</div>
		</div>
	</div>
@else
@endif

<div class="clearfix m-b-md">&nbsp;</div>