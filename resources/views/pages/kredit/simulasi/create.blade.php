@extends('template.cms_template')

@section('kredit')
    active in
@stop

@section('simulasi_kredit')
    active
@stop

@push('content')
{{-- Page Heading --}}
<div class="p-content p-b-none">
	<div class="page-header m-t-none m-b-none p-b-none">
		<h2 class="m-t-none">Simulasi Kredit</h2>
	</div>
</div>

{{-- Page Content --}}
<div class="col-md-12">
	<div class="row">
{{-- Left Sidebar --}}
		<div class="col-xs-12 col-sm-4 col-md-3 p-t-md p-l-sm" style="border-right: 1px solid #E8E8E8;">
			<div class="row p-b-sm">
				<div class="col-md-12">
					<h4>Buat Simulasi</h4>
				</div>
			</div>
			<div class="row">
			{!! Form::open(['url' => route('simulasi.store'), 'data-ajax-submit' => true]) !!}
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Pinjaman</label>
						{!! Form::text('pinjaman', null, ['class' => 'form-control required mask-money', 'placeholder' => 'Masukkan jumlah pinjaman']) !!}
					</fieldset>
				</div>
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Jangka Waktu</label>
						<div class="input-group">
							{!! Form::text('jangka_waktu', null, ['class' => 'form-control required', 'placeholder' => 'Masukkan jangka waktu']) !!}
							<span class="input-group-addon">Bulan</span>
						</div>
					</fieldset>
				</div>
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Suku Bunga</label>
						<div class="input-group">
							{!! Form::text('suku_bunga', null, ['class' => 'form-control required', 'placeholder' => 'Masukkan suku bunga', 'min' => 0, 'max' => 5, 'step' => 0.01]) !!}
							<span class="input-group-addon">% / tahun</span>
						</div>
					</fieldset>
				</div>
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Jenis Kredit</label>
						{!! Form::hidden('angsuran', 'PA', null) !!}
						{!! Form::text('angsuran_dummy', 'Angsuran', ['class' => 'form-control required', 'disabled' => 'disabled']) !!}
					</fieldset>
				</div>				
				<div class="col-sm-12 p-t-sm">
					<fieldset class="form-group text-right">
						<button type="submit" class="btn btn-primary">Buat Simulasi</button>
					</fieldset>
				</div>
			{!! Form::close() !!}
			</div>
		</div>
{{-- Right Sidebar --}}
		<div class="col-xs-12 col-sm-8 col-md-9 p-t-md">
			<div class="row p-b-lg">
				<div class="col-md-12">
					<h4>
						Data Simulasi Kredit
						<span class="pull-right">
							<a href="{{ route('simulasi.clear') }}" class="btn btn-sm btn-default text-danger">
								<i class="fa fa-times" aria-hidden="true"></i>&nbsp;
								<span class="hidden-xs">Hapus Semua Simulasi</span>
							</a>
						</span>
					</h4>
				</div>
			</div>
			<div class="row" id="simulasi-canvas">
				<div class="col-md-12 p-b-sm">
						<?php
							// dd($page_datas->data_simulasi);
						?>
				
					@forelse($page_datas->data_simulasi as $key => $data)
						<?php
							// dd($data);
						?>
						<div class="row m-b-md p-b-md">
							<div class="col-md-12">
								<h4 class="text-light">Simulasi {{ $key + 1 }}</h4>
								<p>label: value</p>
							</div>
						</div>
						<hr class="m-t-sm" style="border-bottom: 1px solid #E9E9E9">
					@empty
						<p class="text-muted">Belum Ada Data</p>
					@endforelse
				</div>
			</div>			
		</div>
	</div>
</div>
@endpush
