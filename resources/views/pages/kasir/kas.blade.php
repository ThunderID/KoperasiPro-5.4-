@extends('pages.kasir.templates.index_show_template')

@section('kas')
	active
@stop

@section('page_content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						No. Transaksi
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['id']) && !empty($page_datas->cash['id'])) ? $page_datas->cash['nomor_transaksi'] : '-' }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Tanggal Jatuh Tempo
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['id']) && !empty($page_datas->cash['id'])) ? $page_datas->cash['tanggal_jatuh_tempo'] : '-' }}
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Dokumen
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['id']) && ($page_datas->cash['id']) != '0') ? str_replace('_', ' ', $page_datas->cash['tipe']) : '-' }}
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="row p-t-sm m-b-sm">
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<p class="text-capitalize text-light">
						Status
					</p>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<p class="text-capitalize text-light">
						{{ (isset($page_datas->cash['id']) && !empty($page_datas->cash['id'])) ? $page_datas->cash['status'] : '-' }}
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-t-lg">
		<div class="col-xs-12 col-sm-12 col-md-12">
			@if (isset($page_datas->cash['details']))
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center" style="width: 6%;">No</th>
							<th class="text-center" style="width: 44%;">Deskripsi</th>
							<th class="text-center" style="width: 20%:">Kuantitas</th>
							<th class="text-center" style="width: 20%;">Diskon</th>
							<th class="text-center" style="width: 20%;">Harga</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($page_datas->cash['details'] as $k => $v)
							@php 
								$qty = $v['kuantitas'];
								$diskon = (int) str_replace('.', '', substr($v['diskon_satuan'], 3));
								$harga = (int) str_replace('.', '', substr($v['harga_satuan'], 3));
								$total = ($harga - $diskon) * $qty;
							@endphp
							<tr>
								<td class="text-center">{{ $k+1 }}</td>
								<td>{{ $v['deskripsi'] }}</td>
								<td class="text-center">{{ $v['kuantitas'] }}</td>
								<td class="text-right">{{ $v['diskon_satuan'] }}</td>
								<td class="text-right">{{ $v['harga_satuan'] }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-right">
			<h4 style="display: inline-block;">Subtotal</h4> &nbsp;&nbsp;
			<div class="form-control" style="width: 50%; display: inline-block; font-size: 16px; background-color: #eee;">
				@money($total)
			</div>
		</div>
	</div>
@stop

@section('page_modals')
	@stack('show_modals')
@append

@section('page_scripts')
@append