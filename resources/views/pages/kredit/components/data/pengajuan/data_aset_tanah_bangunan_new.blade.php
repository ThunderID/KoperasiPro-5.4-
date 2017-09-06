@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize m-b-sm text-lg">data aset tanah &amp; bangunan</p>
	</div>
</div>

@if (isset($page_datas->credit['survei_aset_tanah_bangunan']) && !empty($page_datas->credit['survei_aset_tanah_bangunan']))
	@forelse ($page_datas->credit['survei_aset_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize text-sm">
					aset tanah &amp; bangunan {{ $key+1 }}

					@if (!empty($page_datas->credit['survei_aset_tanah_bangunan']))
						@if($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.aset.tanah.bangunan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_aset_tanah_bangunan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;

								<a href="#aset-tanah-bangunan" class="button-edit" data-toggle="hidden" data-target="aset-tanah-bangunan-{{ $key }}" data-panel="data-aset" data-flag="data-aset-tanah-bangunan" data-index="{{ $key }}" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif
				</p>
				<hr class="m-t-xs m-b-xs"/>
				@if (isset($page_datas->credit['survei_aset_tanah_bangunan']) && !empty($page_datas->credit['survei_aset_tanah_bangunan']))
					@php
						$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($page_datas->credit['survei_nasabah']['surveyor']['visas'], $acl_active_office);
					@endphp

					<p class="text-capitalize text-muted text-sm">
						disurvei {!! (isset($page_datas->credit['survei_nasabah']['surveyor']) && !empty($page_datas->credit['survei_nasabah']['surveyor'])) ? $page_datas->credit['survei_nasabah']['tanggal_survei'] . ' oleh ' . $page_datas->credit['survei_nasabah']['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . $role . ' )</span></em>'  : '-'  !!}
					</p>
				@endif
			</div>
		</div>
		<div class="row p-t-lg m-b-sm">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($value['tipe']) && !is_null($value['tipe'])) ? str_replace('_', ' ', $value['tipe']) : '-' }}
					( Luas {{ (isset($value['luas']) && !is_null($value['luas'])) ? str_replace('_', ' ', $value['luas']) : '0' }} M<sup>2</sup> )
				</p>
				<p class="text-capitalize text-light m-b-xs">
					Nomor Sertifikat 
					{{ (isset($value['nomor_sertifikat']) && !is_null($value['nomor_sertifikat'])) ? str_replace('_', ' ', $value['nomor_sertifikat']) : '-' }}
				</p>
				<p class="text-capitalize text-light">
					@foreach ($value['alamat'] as $k => $v)
						@if ($k == 0)
							{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }} <br/>
							RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
							<span class="text-uppercase">
								{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} -
								{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik']  : '' }} <br/>
								{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
								jawa timur <br/>
								{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
							</span>
						@endif
					@endforeach
				</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<p class="text-capitalize text-light">
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
					<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-tanah-bangunan" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		@endif
	@endforelse

	@if (count($page_datas->credit['survei_aset_tanah_bangunan']) > 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="#aset-tanah-bangunan" class="text-sm" data-toggle="hidden" data-target="aset-tanah-bangunan" data-panel="data-aset" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Aset Tanah &amp; Bangunan</a>
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
				<p class="text-light">Belum ada data disimpan. <a href="#" data-toggle="hidden" data-target="aset-tanah-bangunan" data-panel="data-aset" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endif
@endif

<div class="clearfix m-b-md">&nbsp;</div>