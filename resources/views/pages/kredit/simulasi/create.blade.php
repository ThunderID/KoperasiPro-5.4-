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
		<div class="col-xs-12 col-sm-4 col-md-3 p-t-md p-l-sm _window"  data-padd-top="auto" data-padd-bottom="0" style="border-right: 1px solid #E8E8E8;">
			<div class="row p-b-sm">
				<div class="col-md-12">
					<h4>Buat Simulasi</h4>
				</div>
			</div>
			<div class="row">
			{!! Form::open(['url' => route('simulasi.store'), 'data-ajax-submit' => true, 'data-pjax' => 'true']) !!}
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Pinjaman</label>
						{!! Form::text('pinjaman', $page_datas->input_simulasi['pinjaman'], ['class' => 'form-control required mask-money', 'placeholder' => 'Masukkan jumlah pinjaman']) !!}
					</fieldset>
				</div>
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Jangka Waktu</label>
						<div class="input-group">
							{!! Form::text('jangka_waktu', $page_datas->input_simulasi['jangka_waktu'], ['class' => 'form-control required', 'placeholder' => 'Masukkan jangka waktu']) !!}
							<span class="input-group-addon">Bulan</span>
						</div>
					</fieldset>
				</div>
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Suku Bunga</label>
						<div class="input-group">
							{!! Form::text('suku_bunga', $page_datas->input_simulasi['suku_bunga'], ['class' => 'form-control required', 'placeholder' => 'Masukkan suku bunga', 'min' => 0, 'max' => 5, 'step' => 0.01]) !!}
							<span class="input-group-addon">% / tahun</span>
						</div>
					</fieldset>
				</div>
				<div class="col-sm-12">
					<fieldset class="form-group">
						<label class="text-sm">Jenis Kredit</label>
						{!! Form::hidden('angsuran', 'pa', null) !!}
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
			<div class="row m-b-sm">
				<div class="col-xs-8 col-sm-7 col-md-6">
					<h4>
						Data Simulasi Kredit
					</h4>
				</div>
				<div class="col-xs-4 col-sm-5 col-md-6 text-right p-t-xs">
					@if(count($page_datas->data_simulasi) > 0)
					<a href="{{ route('simulasi.clear', ['id' => 'all']) }}" class="btn btn-sm btn-default text-danger">
						<i class="fa fa-times" aria-hidden="true"></i>
						<span class="hidden-xs">&nbsp;Hapus Semua Simulasi</span>
					</a>
					@endif
				</div>
			</div>
			<div class="row" id="simulasi-canvas">
				<div class="col-md-12 _window p-t-lg" data-padd-top="auto" data-padd-bottom="0">
						<?php
							// dd($page_datas->data_simulasi);
						?>
				
					@forelse($page_datas->data_simulasi as $key => $data)
						<?php
							// dd($data);
						?>
						<div class="row m-b-lg p-b-md" id="area-print">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<h4 class="text-light">Simulasi {{ $key + 1 }}</h4>
										<hr class="m-t-sm m-b-md" style="border-bottom: 1px solid #E9E9E9">
									</div>
								</div>
								<div class="row p-b-xs">
									<div class="col-xs-4 col-sm-3 col-md-2 p-r-none">
										<p>Pinjaman</p>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 text-center">
										<p>:</p>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 p-l-none">
										<p>{{ $data['pengajuan']['pinjaman'] }}</p>
									</div>
								</div>
								<div class="row p-b-xs">
									<div class="col-xs-4 col-sm-3 col-md-2 p-r-none">
										<p>Jangka Waktu</p>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 text-center">
										<p>:</p>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 p-l-none">
										<p>{{ $data['pengajuan']['jangka_waktu'] }} Bulan</p>
									</div>
								</div>
								<div class="row p-b-xs">
									<div class="col-xs-4 col-sm-3 col-md-2 p-r-none">
										<p>Suku Bunga</p>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 text-center">
										<p>:</p>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 p-l-none">
										<p>{{ $data['pengajuan']['suku_bunga'] }} % / Tahun</p>
									</div>
								</div>
								<div class="row p-b-xs">
									<div class="col-xs-4 col-sm-3 col-md-2 p-r-none">
										<p>Jenis Kredit</p>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 text-center">
										<p>:</p>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 p-l-none">
										<p>{{ 'Angsuran' }}</p>
									</div>
								</div>
								<div class="row p-t-md p-b-xs">
									<div class="col-md-12">
										<p>Ilustrasi Angsuran</p>
										<hr class="m-t-sm m-b-none" style="border-bottom: 1px solid #E9E9E9">		
									</div>		
								</div>
								<div class="row">
									<div class="col-md-12">
										<table class="table m-b-xs">
											<thead>
												<tr>
													<th style="width: 10%;">Angsuran</th>
													<th class="text-right">Angsuran Pokok</th>
													<th class="text-right">Angsuran Bunga</th>
													<th class="text-right">Biaya Lainnya</th>
													<th class="text-right">Total Angsuran</th>
												</tr>
											</thead>
											<tbody>
												@foreach($data['angsuran'] as $key_angs => $val_angs)
												<tr>
													<td>{{ $key_angs }}</td>
													<td class="text-right">{{ $val_angs['angsuran_pokok'] }}</td>
													<td class="text-right">{{ $val_angs['angsuran_bunga'] }}</td>
													<td class="text-right">
														@if(isset($val_angs['biaya_lainnya']))
															{{ Rp. 0 }}<br><small>Biaya Admin</small></td>
														@else
															_
														@endif
													<td class="text-right">{{ $val_angs['total_angsuran'] }}</td>
												</tr>
												@endforeach
												<tr>
													<td><b>Total</b></td>
													<td class="text-right"><b>{{ $data['total']['angsuran_pokok'] }}</b></td>
													<td class="text-right"><b>{{ $data['total']['angsuran_bunga'] }}</b></td>
													<td class="text-right"><b>{{ 'Rp. 0' }}</b></td>
													<td class="text-right"><b>{{ $data['total']['total_angsuran'] }}</b></td>
												</tr>
											</tbody>
										</table>
										<hr class="m-t-xs m-b-none" style="border-bottom: 1px solid #E9E9E9">		
									</div>
								</div>
								<div class="row p-t-lg p-b-lg">
									<div class="col-md-12">
										<p class="text-muted">
											Perhitungan Simulasi kredit ini dicetak pada {{ date("d/m/Y")}}<br>
											Adapun hasil perhitungan diatas merupakan simulasi belaka, jumlah angka yang tertera dapat berubah dan tidak mengikat.
										</p>
									</div>
								</div>								
								<div class="row p-t-sm p-b-md hidden-print">
									<div class="col-sm-6">
										<a href="javascript:void(0);" class="btn btn-sm btn-info trigger-print">
											<i class="fa fa-print" aria-hidden="true"></i>
											Print
										</a>																				
									</div>
									<div class="col-sm-6 text-right">
										<a href="{{ route('simulasi.clear',['id' => $key]) }}" class="btn btn-sm btn-danger m-r-sm">
											<i class="fa fa-times" aria-hidden="true"></i>
											Hapus
										</a>
										<a href="{{ route('simulasi.ajukan', ['id' => $key]) }}" class="btn btn-sm btn-primary">
											<i class="fa fa-check" aria-hidden="true"></i>
											Ajukan
										</a>
									</div>
									<div class="col-md-12">
										<hr class="m-t-sm m-b-none" style="border-bottom: 1px solid #E9E9E9">		
									</div>
								</div>							

							</div>
						</div>
					@empty
						<p class="text-muted">Belum Ada Data</p>
					@endforelse

				</div>
			</div>			
		</div>
	</div>
</div>
@endpush
