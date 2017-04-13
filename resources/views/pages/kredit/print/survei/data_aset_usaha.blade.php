@if (isset($page_datas->credit['aset_usaha']) && !empty($page_datas->credit['aset_usaha']))
	@forelse ($page_datas->credit['aset_usaha'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					<u>aset usaha {{ $key+1 }}</u>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>info usaha</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Nama Usaha 
						</p>
					</div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['nama_usaha']) && !is_null($value['nama_usaha'])) ? $value['nama_usaha'] : '-' }}
							( {{ (isset($value['bidang_usaha']) && !is_null($value['bidang_usaha'])) ? str_replace('_', ' ', $value['bidang_usaha']) : '-'  }} )
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Berdiri Tanggal
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['tanggal_berdiri']) && !is_null($value['tanggal_berdiri'])) ? $value['tanggal_berdiri'] : '-' }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Status 
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['status']) && !is_null($value['status'])) ? str_replace('_', ' ', $value['status']) : '-'  }}
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Jumlah Karyawan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['jumlah_karyawan']) && !is_null($value['jumlah_karyawan'])) ? $value['jumlah_karyawan'] : '-' }} Orang 
						</p>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Jumlah Konsumen perbulan
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['jumlah_konsumen_perbulan']) && !is_null($value['jumlah_konsumen_perbulan'])) ? $value['jumlah_konsumen_perbulan'] : '-' }} Orang 
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>tempat usaha</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							status tempat usaha
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['status_tempat_usaha']) && !is_null($value['status_tempat_usaha'])) ? $value['status_tempat_usaha'] : '-' }} 
						</p>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							luas tempat usaha
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['luas_tempat_usaha']) && !is_null($value['luas_tempat_usaha'])) ? $value['luas_tempat_usaha'] : '-' }} M<sup>2</sup>
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-xs m-b-xs text-capitalize text-sm text-muted"><strong>lain-lain</strong></p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							Perputaran stok
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['perputaran_stok']) && !is_null($value['perputaran_stok'])) ? $value['perputaran_stok'] : '-' }} 
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							jumlah saingan perkota
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['jumlah_saingan_perkota']) && !is_null($value['jumlah_saingan_perkota'])) ? $value['jumlah_saingan_perkota'] : '-' }} 
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							nilai aset
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['nilai_aset']) && !is_null($value['nilai_aset'])) ? $value['nilai_aset'] : '-' }} 
						</p>
					</div>
				</div>
				<div class="row m-b-none">
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<p class="text-capitalize text-light m-b-xs">
							uraian
						</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? $value['uraian'] : '-' }} 
						</p>
					</div>
				</div>
			</div>
		</div>
	@empty
	@endforelse
@else
@endif