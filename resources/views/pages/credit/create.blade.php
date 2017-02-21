@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('pengajuan_baru')
    active
@stop

@push('content')
	<div class="p-content">
		<div class="page-header m-t-none m-b-xl p-b-xs">
			<h2 class="m-t-none m-b-xs">Pengajuan Baru</h2>
		</div>
		{!! Form::open(['url' => route('credit.store'), 'class' => 'form wizard']) !!}
			{{-- untuk data kredit --}}
			<h3>Data Kredit</h3>
			<section>
				@include ('pages.credit.wizard.data_kredit')
			</section>
			<h3>Data Pribadi</h3>
			<section>
				@include ('pages.credit.wizard.data_pribadi')
			</section>
			<h3>Data Penjamin</h3>
			<section>
				@include ('pages.credit.wizard.data_penjamin')
			</section>
			<h3>Data Jaminan</h3>
			<section>
				@include ('pages.credit.wizard.data_jaminan')
			</section>
			{{-- koperasi --}}
			{!! Form::hidden('koperasi[kode]', 'ksu_tt') !!}
			{!! Form::hidden('koperasi[nama]', 'tanjung terang') !!}

			{{-- status --}}
			{!! Form::hidden('status[][status]', 'drafting') !!}
			{!! Form::hidden('status[][keterangan]', 'dalam proses drafting') !!}
			{!! Form::hidden('status[][tanggal]', 'today') !!}
			{!! Form::hidden('status[][petugas][nip]', '1234567890') !!}
			{!! Form::hidden('status[][petugas][nama]', 'Benedict Cumberbatch') !!}
		{!! Form::close() !!}
	</div>

	{{-- template clone --}}
	<div class="hidden">
		{{-- template clone untuk data jaminan --}}
		<div id="template-clone-jaminan">
			<div class="root-clone">
				<fieldset class="form-group">
					<label for="">Jenis</label>
					<div class="row">
						<div class="col-md-12">
							{!! Form::select('credit[collaterals][][type]', [
								'kendaraan'			=> 'Kendaraan',
								'tanah_bangunan'	=> 'Tanah / Bangunan'
							], 'kendaraan', ['class' => 'form-control quick-select-clone quick-select-type']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Kepemilikan</label>
					<div class="row">
						<div class="col-md-6">
							{!! Form::text('credit[collaterals][][ownership_status]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Pemilik jaminan']) !!}
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label for="">Legalitas</label>
					<div class="row">
						<div class="col-md-12">
							{{-- untuk legalitas tanah & bangunan --}}
							<div class="quick-select-legal tanah_bangunan" style="display:none">
								{!! Form::select('legal', [
									'hak_milik'		=> 'Hak Milik / HGB',
									'sertifikat'	=> 'Sertifikat'
								], 'hak_milik', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
							</div>
							{{-- untuk legalitas kendaraan --}}
							<div class="quick-select-legal kendaraan" style="display:none">
								{!! Form::select('legal', [
									'bpkb_r2'	=> 'BPKB R2',
									'bpkb_r4'	=> 'BPKB R4',
									'stnk_r2'	=> 'STNK R2',
									'stnk_r4'	=> 'STNK R4'
								], 'bpkb_2', ['class' => 'form-control quick-select-clone quick-select-legal']) !!}
							</div>
							{!! Form::hidden('credit[collaterals][][legal]', null, ['class' => 'credit-collaterals-legal']) !!}
					</div>
				</fieldset>
			</div>
		</div>
		{{-- template clone untuk data kontak --}}
		<div id="template-clone-contact">
			<div class="root-clone">
				<fieldset class="form-group">
					<label for="">No. Hp</label>
					<div class="row">
						<div class="col-md-5">
							{!! Form::text('phone[][number]', null, ['class' => 'form-control required auto-tabindex', 'placeholder' => 'Ex. 081223399001']) !!}
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
@endpush

@push('modals')
@endpush

@push('scripts')
@endpush