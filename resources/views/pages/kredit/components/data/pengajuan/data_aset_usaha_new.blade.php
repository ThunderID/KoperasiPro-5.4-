@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize m-b-sm text-lg">data aset usaha</p>
	</div>
</div>

@if (isset($page_datas->credit['survei_aset_usaha']) && !empty($page_datas->credit['survei_aset_usaha']))
	@forelse ($page_datas->credit['survei_aset_usaha'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left text-capitalize text-muted">
				<p class="m-b-xs text-capitalize text-sm">
					aset usaha {{ $key+1 }} 
					
					@if (!empty($page_datas->credit['survei_aset_usaha']))
						@if($edit == true)
							<span class="pull-right">
								<a class="text-danger text-sm m-r-md" href="#" data-url="{{ route('survei.aset.usaha.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_aset_usaha_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i> Hapus
								</a> &nbsp;
								<a href="#aset-usaha" class="button-edit text-sm" data-toggle="hidden" data-target="aset-usaha-{{ $key }}" data-panel="data-aset" data-flag="data-aset-usaha" data-index="{{ $key }}" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i> Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-xs m-b-xs"/>
				@if (isset($page_datas->credit['survei_aset_usaha']) && !empty($page_datas->credit['survei_aset_usaha']))
					@php
						$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($page_datas->credit['survei_nasabah']['surveyor']['visas'], $acl_active_office);
					@endphp

					<p class="text-capitalize text-muted text-sm">
						disurvei {!! (isset($page_datas->credit['survei_nasabah']['surveyor']) && !empty($page_datas->credit['survei_nasabah']['surveyor'])) ? $page_datas->credit['survei_nasabah']['tanggal_survei'] . ' oleh ' . $page_datas->credit['survei_nasabah']['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . $role . ' )</span></em>'  : '-'  !!}
					</p>
				@endif
			</div>
		</div>
		<div class="row p-t-sm m-b-sm">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>info usaha</strong></p>
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['nama_usaha']) && !is_null($value['nama_usaha'])) ? $value['nama_usaha'] : '-' }}
					( {{ (isset($value['bidang_usaha']) && !is_null($value['bidang_usaha'])) ? str_replace('_', ' ', $value['bidang_usaha']) : '-'  }} )
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Tgl Berdiri 
					{{ (isset($value['tanggal_berdiri']) && !is_null($value['tanggal_berdiri'])) ? $value['tanggal_berdiri'] : '-' }}
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Status Usaha {{ (isset($value['status']) && !is_null($value['status'])) ? str_replace('_', ' ', $value['status']) : '-'  }}
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Jumlah Karyawan
					{{ (isset($value['jumlah_karyawan']) && !is_null($value['jumlah_karyawan'])) ? $value['jumlah_karyawan'] : '-' }} Orang 
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Jumlah Konsumen
					{{ (isset($value['jumlah_konsumen_perbulan']) && !is_null($value['jumlah_konsumen_perbulan'])) ? $value['jumlah_konsumen_perbulan'] : '-' }} Orang 
				</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>tempat usaha</strong></p>
				<p class="text-capitalize text-light m-b-xs">
					Tempat Usaha 
					{{ (isset($value['status_tempat_usaha']) && !is_null($value['status_tempat_usaha'])) ? $value['status_tempat_usaha'] : '-' }} 
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Luas Tempat Usaha 
					{{ (isset($value['luas_tempat_usaha']) && !is_null($value['luas_tempat_usaha'])) ? $value['luas_tempat_usaha'] : '-' }} M<sup>2</sup>
				</p>

				<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>lain-lain</strong></p>
				<p class="text-capitalize text-light m-b-xs">
					Jumlah Pesaing
					{{ (isset($value['jumlah_saingan_perkota']) && !is_null($value['jumlah_saingan_perkota'])) ? $value['jumlah_saingan_perkota'] : '-' }} 
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Nilai Aset
					{{ (isset($value['nilai_aset']) && !is_null($value['nilai_aset'])) ? $value['nilai_aset'] : '-' }} 
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Uraian
					{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? $value['uraian'] : '-' }} 
				</p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@empty
		@if ($page_datas->credit['status'] == 'pengajuan')
			<div class="row">
				<div class="col-sm-12">
					<p class="text-light">Maaf data belum tersedia, data akan tersedia setelah data disurvei</p>
				</div>
			</div>
		@else
			<!-- No data -->
			<div class="row m-b-md">
				<div class="col-sm-12">
					<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		@endif
	@endforelse

	@if (count($page_datas->credit['survei_aset_usaha']) > 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#" class="text-sm" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Aset Usaha</a>
			</div>
		</div>
	@endif
@else
	@if ($page_datas->credit['status'] == 'pengajuan')
		<div class="row">
			<div class="col-sm-12">
				<p class="text-light">Maaf data belum tersedia, data akan tersedia setelah data disurvei</p>
			</div>
		</div>
	@else
		<!-- No data -->
		<div class="row m-b-md">
			<div class="col-sm-12">
				<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-usaha" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endif
@endif

<div class="clearfix m-b-md">&nbsp;</div>