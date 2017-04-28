@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
	@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-none text-capitalize">
					<u>jaminan kendaraan {{ $key+1 }}</u>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-sm m-b-xs text-capitalize text-sm text-muted"><strong>info jaminan</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Tipe
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Merk
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['merk']) && !is_null($value['merk'])) ? $value['merk'] : '-' }}
							( {{ (isset($value['tahun']) && !is_null($value['tahun'])) ? $value['tahun'] : '-' }} )
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							No. BPKB
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? $value['nomor_bpkb'] : '-' }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							atas nama
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }}
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
	@endforelse
@else
@endif