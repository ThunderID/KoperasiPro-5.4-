@php
	if(!isset($edit)){
		$edit = true;
	}
@endphp

<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Rekening</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['kepribadian']) && !empty($page_datas->credit['kepribadian']))
	@foreach ($page_datas->credit['kepribadian'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-sm text-uppercase">
					kepribadian {{ $key+1 }}

					@if (!empty($page_datas->credit['kepribadian']))
						@if ($edit == true)
							<span class="pull-right text-capitalize">
								<a class="text-danger m-r-sm" href="{{ route('survei.kepribadian.destroy', ['kredit_id' => $page_datas->credit['id'], 'kepribadian_id' => $value['id']]) }}" no-data-pjax>
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="kepribadian-{{ $key }}" data-panel="data-kepribadian" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif

				</p>
				<hr class="m-t-sm m-b-sm"/>
				<p class="text-capitalize text-right text-sm">disurvei {!! (isset($value['survei']) && !empty($value['survei'])) ? $value['survei']['tanggal_survei'] . ' oleh ' . $value['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $value['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
			</div>
		</div>
		<div class="row p-t-md m-b-xl">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p class="m-b-xs text-sm"><strong>Nama Referens</strong></p>
				<p class="text-capitalize text-light">{{ (isset($value['nama_referens']) && !is_null($value['nama_referens'])) ? $value['nama_referens'] : '-' }}</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p class="m-b-xs text-sm"><strong>Hubungan</strong></p>
				<p class="text-capitalize text-light">{{ (isset($value['hubungan']) && !is_null($value['hubungan'])) ? str_replace('_', ' ', $value['hubungan']) : '-'  }}</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p class="m-b-xs text-sm"><strong>Telepon</strong></p>
				<p class="text-capitalize text-light">{{ (isset($value['telepon_referens']) && !is_null($value['telepon_referens'])) ? $value['telepon_referens'] : '-' }}</p>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p class="m-b-xs text-sm"><strong>Uraian</strong></p>
				<p class="text-capitalize text-light">{{ (isset($value['uraian']) && !is_null($value['uraian'])) ? $value['uraian'] : '-' }}</p>
			</div>
		</div>
	@endforeach

	<div class="clearfix">&nbsp;</div>

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#" data-toggle="hidden" data-target="kepribadian" data-panel="data-kepribadian" no-data-pjax><i class="fa fa-plus"></i> Tambahkan kepribadian</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p>Belum ada data disimpan. <a href="#kepribadian" data-toggle="hidden" data-target="kepribadian" data-panel="data-kepribadian" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>