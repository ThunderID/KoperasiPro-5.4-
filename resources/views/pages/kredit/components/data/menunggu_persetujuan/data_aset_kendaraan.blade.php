<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset Kendaraan</h4>
		<hr/>
	</div>
</div>

{{-- check data aset kendaraan --}}
@if (isset($page_datas->credit['aset_kendaraan']) && !empty($page_datas->credit['aset_kendaraan']))
	{{-- foreach data aset kendaraan --}}
	@foreach ($page_datas->credit['aset_kendaraan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-md text-capitalize">
					aset kendaraan {{ $key+1 }}
				</p>
				<hr class="m-t-sm m-b-sm"/>
				<p class="text-capitalize text-sm">disurvei {!! (isset($value['survei']) && !empty($value['survei'])) ? $value['survei']['tanggal_survei'] . ' oleh ' . $value['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $value['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
			</div>
		</div>
		<div class="row p-t-lg">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="m-b-xs text-capitalize text-light">{{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? str_replace('_', ' ', $value['nomor_bpkb']) : '-' }}</p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 11px;"><em>( No. BPKB )</em></p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@endforeach
@else
	<!-- No data -->
	<div class="row m-b-md">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. </p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>