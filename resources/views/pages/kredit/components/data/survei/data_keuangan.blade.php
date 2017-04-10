@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Keuangan
			@if(!empty($page_datas->credit['keuangan']))
				@if($edit == true)
					<span class="pull-right">
						<small>
						<a href="#" data-toggle="hidden" data-target="keuangan" data-panel="data-keuangan" no-data-pjax>
							<i class="fa fa-pencil" aria-hidden="true"></i>
							 Edit
						</a>
						</small>
					</span>
				@endif
			@endif
		</h4>
		<hr/>
		<p class="text-capitalize text-right text-muted text-sm">disurvei {!! (isset($page_datas->credit['keuangan']['survei']) && !empty($page_datas->credit['keuangan']['survei'])) ? $page_datas->credit['keuangan']['survei']['tanggal_survei'] . ' oleh ' . $page_datas->credit['keuangan']['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $page_datas->credit['keuangan']['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
	</div>
</div>

@if (isset($page_datas->credit['keuangan']) && !empty($page_datas->credit['keuangan']))
	<div class="row p-t-lg p-b-md">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<p class="m-b-xs text-lg">{{ (isset($page_datas->credit['keuangan']['total_pendapatan']) && !is_null($page_datas->credit['keuangan']['total_pendapatan'])) ? $page_datas->credit['keuangan']['total_pendapatan'] : '-' }}</p>
			<small class="text-muted text-sm"><em>( total pendapatan )</em></small>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<p>&#8722;</p>	
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<p class="m-b-xs text-lg">{{ (isset($page_datas->credit['keuangan']['total_biaya']) && !is_null($page_datas->credit['keuangan']['total_biaya'])) ? $page_datas->credit['keuangan']['total_biaya'] : '-' }}</p>
			<small class="text-muted text-sm"><em>( total biaya )</em></small>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<p>&#61;</p>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
			<p class="m-b-xs text-lg">{{ (isset($page_datas->credit['keuangan']['penghasilan_bersih']) && !is_null($page_datas->credit['keuangan']['penghasilan_bersih'])) ? $page_datas->credit['keuangan']['penghasilan_bersih'] : '-' }}</p>
			<small class="text-muted text-sm"><em>( penghasilan bersih )</em></small>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<hr/>
			{{-- a --}}
			{{-- pendapatan --}}
			{{-- <div class="row p-t-md">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize"><strong>pendapatan</strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">penghasilan rutin</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['penghasilan_rutin']) && !is_null($page_datas->credit['keuangan']['penghasilan_rutin'])) ? $page_datas->credit['keuangan']['penghasilan_rutin'] : '-' }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">penghasilan pasangan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['penghasilan_pasangan']) && !is_null($page_datas->credit['keuangan']['penghasilan_pasangan'])) ? $page_datas->credit['keuangan']['penghasilan_pasangan'] : '-' }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">penghasilan usaha</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['penghasilan_usaha']) && !is_null($page_datas->credit['keuangan']['penghasilan_usaha'])) ? $page_datas->credit['keuangan']['penghasilan_usaha'] : '-' }}</p>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">total Pendapatan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['total_pendapatan']) && !is_null($page_datas->credit['keuangan']['total_pendapatan'])) ? $page_datas->credit['keuangan']['total_pendapatan'] : '-' }}</p>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div> --}}

			{{-- biaya --}}
			{{-- <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-t-sm m-b-xs text-capitalize"><strong>biaya</strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">biaya rumah tangga</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['biaya_rumah_tangga']) && !is_null($page_datas->credit['keuangan']['biaya_rumah_tangga'])) ? $page_datas->credit['keuangan']['biaya_rumah_tangga'] : '-' }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">biaya pendidikan</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['biaya_pendidikan']) && !is_null($page_datas->credit['keuangan']['biaya_pendidikan'])) ? $page_datas->credit['keuangan']['biaya_pendidikan'] : '-' }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">biaya rutin</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['biaya_rutin']) && !is_null($page_datas->credit['keuangan']['biaya_rutin'])) ? $page_datas->credit['keuangan']['biaya_rutin'] : '-' }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">biaya angsuran</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['biaya_angsuran']) && !is_null($page_datas->credit['keuangan']['biaya_angsuran'])) ? $page_datas->credit['keuangan']['biaya_angsuran'] : '-' }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">biaya lain-lain</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['biaya_lain']) && !is_null($page_datas->credit['keuangan']['biaya_lain'])) ? $page_datas->credit['keuangan']['biaya_lain'] : '-' }}</p>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<p class="m-t-sm m-b-xs text-capitalize">total biaya</p>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
					<p class="m-b-xs">{{ (isset($page_datas->credit['keuangan']['total_biaya']) && !is_null($page_datas->credit['keuangan']['total_biaya'])) ? $page_datas->credit['keuangan']['total_biaya'] : '-' }}</p>
				</div>
			</div> --}}


			{{-- b --}}
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-b-xs">Pendapatan</p>
					<hr class="m-t-xs" />
				</div>
			</div>
			<div class="row m-b-md">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Penghasilan Rutin</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['penghasilan_rutin'] }}</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Penghasilan Pasangan</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['penghasilan_pasangan'] }}</p>
				</div>
			</div>
			<div class="row m-b-lg">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Penghasilan Usaha</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['penghasilan_usaha'] }}</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Total Pendapatan</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['total_pendapatan'] }}</p>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			{{-- <div class="clearfix">&nbsp;</div> --}}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="m-b-xs">Biaya</p>
					<hr class="m-t-xs" />
				</div>
			</div>
			<div class="row m-b-md">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Biaya Rumah Tangga</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['biaya_rumah_tangga'] }}</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Biaya Pendidikan</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['biaya_pendidikan'] }}</p>
				</div>
			</div>
			<div class="row m-b-md">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Biaya Rutin</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['biaya_rutin'] }}</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Biaya Angsuran</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['biaya_angsuran'] }}</p>
				</div>
			</div>
			<div class="row m-b-md">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Biaya Lainnya</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['biaya_lain'] }}</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<p class="m-b-xs text-sm"><strong>Total Biaya</strong></p>
					<p class="text-capitalize text-lg text-light">{{ $page_datas->credit['keuangan']['total_biaya'] }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>

	{{-- <div class="row m-b-xl">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-capitalize"><strong>sumber penghasilan utama</strong></p>
			<p class="text-capitalize">{{ (isset($page_datas->credit['keuangan']['sumber_penghasilan_utama']) && !is_null($page_datas->credit['keuangan']['sumber_penghasilan_utama'])) ? $page_datas->credit['keuangan']['sumber_penghasilan_utama'] : '-' }}</p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-capitalize"><strong>jumlah tanggungan keluarga</strong></p>
			<p class="text-capitalize">{{ (isset($page_datas->credit['keuangan']['jumlah_tanggungan_keluarga']) && !is_null($page_datas->credit['keuangan']['jumlah_tanggungan_keluarga'])) ? $page_datas->credit['keuangan']['jumlah_tanggungan_keluarga'] : '-' }} Orang</p>

		</div>
	</div> --}}
	{{-- <div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p class="m-b-xs text-capitalize"><strong>disurvei</strong></p>
			<p class="text-capitalize">{!! (isset($page_datas->credit['keuangan']['survei']) && !empty($page_datas->credit['keuangan']['survei'])) ? $page_datas->credit['keuangan']['survei']['tanggal_survei'] . ' oleh ' . $page_datas->credit['keuangan']['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $page_datas->credit['keuangan']['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
		</div>
	</div> --}}
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="keuangan" data-panel="data-keuangan" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>