@if (isset($page_datas->credit['jaminan_kendaraan']) && !empty($page_datas->credit['jaminan_kendaraan']))
		@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
					<p class="m-b-xs text-capitalize">
						<u>jaminan kendaraan {{ $key+1 }}</u>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>info jaminan</strong></p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								tipe
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['merk']) && !is_null($value['merk'])) ? str_replace('_', ' ', $value['merk']) : '-' }}  
								( {{ (isset($value['warna']) && !is_null($value['warna'])) ? str_replace('_', ' ', $value['warna']) : '-'  }} )
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								tahun
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['tahun']) && !is_null($value['tahun'])) ? str_replace('_', ' ', $value['tahun']) : '-' }}
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								atas nama
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? str_replace('_', ' ', $value['atas_nama']) : '-' }}
							</p>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>info kendaraan</strong></p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								Fungsi sehari-hari
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['fungsi_sehari_hari']) && !is_null($value['fungsi_sehari_hari'])) ? str_replace('_', ' ', $value['fungsi_sehari_hari']) : '-' }} 
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								nomor rangka
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['nomor_rangka']) && !is_null($value['nomor_rangka'])) ? str_replace('_', ' ', $value['nomor_rangka']) : '-' }} 
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								nomor mesin
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['nomor_mesin']) && !is_null($value['nomor_mesin'])) ? str_replace('_', ' ', $value['nomor_mesin']) : '-' }}
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								nomor BPKB
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['nomor_bpkb']) && !is_null($value['nomor_bpkb'])) ? str_replace('_', ' ', $value['nomor_bpkb']) : '-' }}
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								nomor polisi
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['nomor_polisi']) && !is_null($value['nomor_polisi'])) ? str_replace('_', ' ', $value['nomor_polisi']) : '-' }}
							</p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								status kepemilikan
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['status_kepemilikan']) && !is_null($value['status_kepemilikan'])) ? str_replace('_', ' ', $value['status_kepemilikan']) : '-' }} 
							</p>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>lain-lain</strong></p>
						</div>
					</div>
					<div class="row m-b-none">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<p class="text-capitalize text-light m-b-xs">
								harga taksasi
							</p>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<p class="text-capitalize text-light m-b-xs">
								{{ (isset($value['harga_taksasi']) && !is_null($value['harga_taksasi'])) ? str_replace('_', ' ', $value['harga_taksasi']) : '-' }} 
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