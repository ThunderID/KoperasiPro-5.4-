@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<p class="text-capitalize text-lg m-b-sm">Data Keuangan</p>
	</div>
</div>

@if (isset($page_datas->credit['survei_keuangan']) && !empty($page_datas->credit['survei_keuangan']))
	@forelse ($page_datas->credit['survei_keuangan'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-xs text-capitalize">
					<span class="text-sm">keuangan {{ $key+1 }}</span>

					@if (!empty($page_datas->credit['survei_keuangan']))
						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.keuangan.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_keuangan_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="keuangan-{{ $key }}" data-panel="data-keuangan" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif

				</p>
				<hr class="m-t-xs m-b-xs"/>
				@if(isset($value['surveyor']) && !empty($value['surveyor']))
					@php
						$role 	= \App\Service\Helpers\UI\Inspector::checkOffice($value['surveyor']['visas'], $acl_active_office);
					@endphp
					<p class="text-capitalize text-sm">disurvei {!!  $value['tanggal_survei'] . ' oleh ' . $value['surveyor']['nama'] . '<span class="text-muted"><em> ( ' . $role . ' )</span></em>'  !!}</p>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				{{-- pendapatan --}}
				<div class="row p-t-md">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-t-sm m-b-xs text-capitalize text-sm"><strong>pendapatan</strong></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">penghasilan rutin</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['penghasilan_rutin']) && !is_null($value['penghasilan_rutin'])) ? $value['penghasilan_rutin'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">penghasilan pasangan</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['penghasilan_pasangan']) && !is_null($value['penghasilan_pasangan'])) ? $value['penghasilan_pasangan'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">penghasilan usaha</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['penghasilan_usaha']) && !is_null($value['penghasilan_usaha'])) ? $value['penghasilan_usaha'] : '-' }}</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">total Pendapatan</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['total_pendapatan']) && !is_null($value['total_pendapatan'])) ? $value['total_pendapatan'] : '-' }}</p>
					</div>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>

				{{-- biaya --}}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="m-b-xs text-capitalize text-sm"><strong>biaya</strong></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">biaya rumah tangga</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['biaya_rumah_tangga']) && !is_null($value['biaya_rumah_tangga'])) ? $value['biaya_rumah_tangga'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">biaya pendidikan</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['biaya_pendidikan']) && !is_null($value['biaya_pendidikan'])) ? $value['biaya_pendidikan'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">biaya rutin</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['biaya_rutin']) && !is_null($value['biaya_rutin'])) ? $value['biaya_rutin'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">biaya angsuran</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['biaya_angsuran']) && !is_null($value['biaya_angsuran'])) ? $value['biaya_angsuran'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">biaya lain-lain</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['biaya_lain']) && !is_null($value['biaya_lain'])) ? $value['biaya_lain'] : '-' }}</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">total biaya</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['total_biaya']) && !is_null($value['total_biaya'])) ? $value['total_biaya'] : '-' }}</p>
					</div>
				</div>
				
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>

				<div class="row m-b-sm">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">sumber penghasilan utama</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['sumber_penghasilan_utama']) && !is_null($value['sumber_penghasilan_utama'])) ? $value['sumber_penghasilan_utama'] : '-' }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<p class="m-b-xs text-light text-capitalize">jumlah tanggungan keluarga</p>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
						<p class="m-b-xs text-light">{{ (isset($value['jumlah_tanggungan_keluarga']) && !is_null($value['jumlah_tanggungan_keluarga'])) ? $value['jumlah_tanggungan_keluarga'] : '-' }}</p>
					</div>
				</div>
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
			<div class="row">
				<div class="col-sm-12">
					<p class="text-light">Belum ada data disimpan. <a href="#keuangan" data-toggle="hidden" data-target="keuangan" data-panel="data-keuangan" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		@endif
	@endforelse

	@if (count($page_datas->credit['survei_keuangan']) > 0)
		<div class="row m-t-md m-b-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a class="text-capitalize" href="#" data-toggle="hidden" data-target="keuangan" data-panel="data-keuangan" no-data-pjax><i class="fa fa-plus"></i> Tambahkan keuangan</a>
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
		<div class="row">
			<div class="col-sm-12">
				<p class="text-light">Belum ada data disimpan. <a href="#keuangan" data-toggle="hidden" data-target="keuangan" data-panel="data-keuangan" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	@endif
@endif

<div class="clearfix m-b-md">&nbsp;</div>