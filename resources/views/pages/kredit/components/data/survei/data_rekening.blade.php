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

@if (isset($page_datas->credit['rekening']) && !empty($page_datas->credit['rekening']))
	@foreach ($page_datas->credit['rekening'] as $key => $value)
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-capitalize text-muted">
				<p class="m-b-sm text-capitalize">
					rekening {{ $key+1 }}

					@if (!empty($page_datas->credit['rekening']))
						@if ($edit == true)
							<span class="pull-right">
								<a class="text-danger m-r-md" href="#" data-url="{{ route('survei.rekening.destroy', ['kredit_id' => $page_datas->credit['id'], 'survei_rekening_id' => $value['id']]) }}" data-toggle="modal" data-target="#modal-delete">
									<i class="fa fa-trash" aria-hidden="true"></i>
									 Hapus
								</a> &nbsp;
								<a href="#" data-toggle="hidden" data-target="rekening-{{ $key }}" data-panel="data-rekening" no-data-pjax>
									<i class="fa fa-pencil" aria-hidden="true"></i>
									 Edit
								</a>
							</span>
						@endif
					@endif

				</p>
				<hr class="m-t-sm m-b-sm"/>
				@if (isset($page_datas->credit['rekening']) && !empty($page_datas->credit['rekening']))
					<p class="text-capitalize text-sm">disurvei {!! (isset($value['survei']) && !empty($value['survei'])) ? $value['survei']['tanggal_survei'] . ' oleh ' . $value['survei']['petugas']['nama'] . '<span class="text-muted"><em> ( ' . $value['survei']['petugas']['role'] . ' )</span></em>'  : '-'  !!}</p>
				@endif
			</div>
		</div>
		<div class="row p-t-lg">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="text-uppercase text-light">{{ (isset($value['nama_bank']) && !is_null($value['nama_bank'])) ? str_replace('_', ' ', $value['nama_bank']) : '-' }}</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<p class="text-capitalize text-light">{{ (isset($value['atas_nama']) && !is_null($value['atas_nama'])) ? $value['atas_nama'] : '-' }} </p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="m-b-xs text-capitalize text-light">{{ (isset($value['saldo_awal']) && !is_null($value['saldo_awal'])) ? $value['saldo_awal'] : '-' }} </p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 11px;"><em>( saldo awal )</em></p>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<p class="m-b-xs text-capitalize text-light">{{ (isset($value['saldo_akhir']) && !is_null($value['saldo_akhir'])) ? $value['saldo_akhir'] : '-' }} </p>
				<p class="text-capitalize text-muted text-sm" style="font-size: 11px;"><em>( saldo akhir )</em></p>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
	@endforeach

	<div class="row m-t-md m-b-md">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="#" data-toggle="hidden" data-target="rekening" data-panel="data-rekening" no-data-pjax><i class="fa fa-plus"></i> Tambahkan Rekening</a>
		</div>
	</div>
@else
	<!-- No data -->
	<div class="row">
		<div class="col-sm-12">
			<p class="text-light">Belum ada data disimpan. <a href="#rekening" data-toggle="hidden" data-target="rekening" data-panel="data-rekening" no-data-pjax> Tambahkan Sekarang </a></p>
		</div>
	</div>
@endif

<div class="clearfix m-b-md">&nbsp;</div>