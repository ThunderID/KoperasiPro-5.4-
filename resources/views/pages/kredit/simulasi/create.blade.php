@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('simulasi_kredit')
    active
@stop

@push('content')
	<div class="p-content">
		<div class="page-header m-t-none p-b-xs">
			<h2 class="m-t-none m-b-xs">Simulasi Kredit</h2>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10">
				<h4>Input Data</h4>
				<p>Isi form dibawah ini untuk simulasi pinjaman.</p>
				<br/>
			</div>
		</div>

		<div class="row p-b-sm">
			<div class="col-md-6">
				{!! Form::open(['url' => route('credit.simulasi.store'), 'data-ajax-submit' => true]) !!}
					<fieldset class="form-group">
						<label class="text-sm">Pinjaman</label>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-10">
								{!! Form::text('pinjaman', $page_datas->pokok, ['class' => 'form-control required mask-money', 'placeholder' => 'Masukkan jumlah pinjaman']) !!}			
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label class="text-sm">Jangka Waktu</label>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-10">
								{!! Form::select('jangka_waktu', $page_datas->select_jangka_waktu, $page_datas->bunga, ['class' => 'form-control select required auto-tabindex', 'placeholder' => 'Pilih', 'data-placeholder' => 'Pilih']) !!}
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label class="text-sm">Suku Bunga</label>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-10">
								{!! Form::text('suku_bunga', $page_datas->tenor, ['class' => 'form-control required', 'placeholder' => 'Masukkan suku bunga', 'min' => 0, 'max' => 5, 'step' => 0.01]) !!}			
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label class="text-sm">Jenis Pembebanan Bunga</label>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-10">
								<label class="form-control">Bunga Flat</label>
							</div>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-10">
								<button type="submit" class="btn btn-primary">Hitung Angsuran</button>
							</div>
						</div>
					</fieldset>
				{!! Form::close() !!}

			</div>
			<div class="col-md-4">
				<p class="m-b-sm"><strong>Simulasi Pinjaman (Bunga Flat)</strong></p>
				<div class="row">
					<div class="col-sm-6">
						Pokok pinjaman
					</div>
					<div class="col-sm-6 text-right">
						: {{$page_datas->pokok}}
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						Bunga per Bulan
					</div>
					<div class="col-sm-6 text-right">
						: {{$page_datas->bunga}} %
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						Jangka Waktu Peminjaman
					</div>
					<div class="col-sm-6 text-right">
						: {{$page_datas->tenor}} bulan
					</div>
				</div>
				<hr/>

				<div class="row">
					<div class="col-sm-6">
						Cicilan Pokok
					</div>
					<div class="col-sm-6 text-right">
						: {{$page_datas->angsuran_pokok}}
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						Cicilan Bunga
					</div>
					<div class="col-sm-6 text-right">
						: {{$page_datas->angsuran_bunga}}
					</div>
				</div>
				<hr/>
				<div class="row">
					<strong>
						<div class="col-sm-6">
							Angsuran per Bulan
						</div>
						<div class="col-sm-6 text-right">
							: {{$page_datas->angsuran}}
						</div>
					</strong>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<a href="{{route('credit.simulasi.print')}}" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endpush
