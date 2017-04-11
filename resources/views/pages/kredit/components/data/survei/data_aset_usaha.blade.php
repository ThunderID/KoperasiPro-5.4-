@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Aset Usaha</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['aset_usaha']) && !empty($page_datas->credit['aset_usaha']))
	@forelse ($page_datas->credit['aset_usaha'] as $key => $value)
		<div class="row m-t-sm">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left text-capitalize text-muted">
				<p class="m-b-sm text-uppercase">
					aset usaha {{ $key+1 }}
					@if(!empty($page_datas->credit['aset_usaha']))
						@if($edit == true)
							<span class="pull-right text-capitalize">
								<a class="text-danger" href="{{ route('survei.aset.usaha.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_aset_usaha_id' => $value['id']]) }}" no-data-pjax>
									<i class="fa fa-trash" aria-hidden="true"></i> Hapus
								</a> &nbsp;
								<a href="#aset-usaha" data-toggle="hidden" data-target="aset-usaha-{{ $key }}" data-panel="data-aset" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i> Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-sm m-b-sm"/>
				<p class="text-capitalize text-right text-sm">disurvei {!! (isset($value['survei']) && !empty($value['survei'])) ? $value['survei']['tanggal_survei'] . ' oleh ' . $value['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $value['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
			</div>
		</div>
		<div class="row p-t-md m-b-sm">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light">
					Nama Usaha {{ (isset($value['nama_usaha']) && !is_null($value['nama_usaha'])) ? $value['nama_usaha'] : '-' }} - 
					{{ (isset($value['bidang_usaha']) && !is_null($value['bidang_usaha'])) ? str_replace('_', ' ', $value['bidang_usaha']) : '-'  }}
				</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					Berdiri Tanggal {{ (isset($value['tanggal_berdiri']) && !is_null($value['tanggal_berdiri'])) ? $value['tanggal_berdiri'] : '-' }} - {{ (isset($value['status']) && !is_null($value['status'])) ? str_replace('_', ' ', $value['status']) : '-'  }}
				</p>
			</div>
		</div>
		<div class="row m-b-sm">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light">
					tempat usaha {{ (isset($value['status_tempat_usaha']) && !is_null($value['status_tempat_usaha'])) ? $value['status_tempat_usaha'] : '-' }} dengan Luas {{ (isset($value['luas_tempat_usaha']) && !is_null($value['luas_tempat_usaha'])) ? str_replace('_', ' ', $value['luas_tempat_usaha']) : '-'  }} M<sup>2</sup>
				</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
					Jumlah Karyawan {{ (isset($value['jumlah_karyawan']) && !is_null($value['jumlah_karyawan'])) ? $value['jumlah_karyawan'] : '-' }} Orang 
				</p>
				<p class="text-capitalize text-light">
					Jumlah Konsumen {{ (isset($value['jumlah_konsumen_perbulan']) && !is_null($value['jumlah_konsumen_perbulan'])) ? str_replace('_', ' ', $value['jumlah_konsumen_perbulan']) : '-'  }} Orang perbulan
				</p>
				<p class="text-capitalize text-light">
					Jumlah Pesaing {{ (isset($value['jumlah_saingan_perkota']) && !is_null($value['jumlah_saingan_perkota'])) ? str_replace('_', ' ', $value['jumlah_saingan_perkota']) : '-'  }} perkota
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light">
					Perputaran Stok {{ (isset($value['perputaran_stok']) && !is_null($value['perputaran_stok'])) ? str_replace('_', ' ', $value['perputaran_stok']) : '-'  }}
				</p>
				<p class="text-capitalize text-light">
					Nilai Aset {{ (isset($value['nilai_aset']) && !is_null($value['nilai_aset'])) ? str_replace('_', ' ', $value['nilai_aset']) : '-'  }}
				</p>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<p class="text-capitalize text-light">
					{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? str_replace('_', ' ', $value['uraian']) : '-'  }}
					<p class="text-capitalize text-muted text-sm" style="font-size: 10px;"><em>( uraian )</em></p>
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
	@endforelse

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#aset-usaha" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Aset Usaha</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row m-b-md">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>