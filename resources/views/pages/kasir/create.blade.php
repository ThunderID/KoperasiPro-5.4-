@extends('template.cms_template')

@section('kasir')
	active in
@stop

@section(($page_datas->status == 'masuk') ? 'tambah_kas_masuk' : 'tambah_kas_keluar')
	active
@stop

@push('content')
<div class="p-content">
	<div class="page-header m-t-none m-b-xl p-b-xs">
		<h2 class="m-t-none m-b-xs">Tambah {{ $page_attributes->title }}</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(['url' => route('kasir.kas.store', ['status' => $page_datas->status]), 'class' => 'form no-enter', 'data-ajax-submit' => true]) !!}
					{!! Form::hidden('koperasi_id', '') !!}
					{{-- <h5 class="text-uppercase text-light">Debitur ID</h5> --}}
					<div class="form-group">
						<label class="text-sm">Debitur</label>
						<div class="row ml-0 mr-0">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<select name="debitur_id" id="" class="form-control select">
									@foreach ($page_datas->select_kreditur as $k => $v)
										<option value="{{ $k }}" data-id="{{ $k }}">{{ $v }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Nomor Nota</label>
						<div class="row">
							<div class="col-md-3">
								{!! Form::text('nomor_nota', (isset($param['data']['nomor_nota']) ? $param['data']['nomor_nota'] : null), ['class' => 'form-control mask-number', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Tipe</label>
						<div class="row">
							<div class="col-md-3">
								{!! Form::text('tipe', (isset($param['data']['tipe']) ? $param['data']['tipe'] : null), ['class' => 'form-control', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Tanggal</label>
						<div class="row">
							<div class="col-md-2">
								{!! Form::text('tanggal', (isset($param['data']['tanggal']) ? $param['data']['tanggal'] : null), ['class' => 'form-control mask-date', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Status</label>
						<div class="row">
							<div class="col-md-3">
								{!! Form::text('status', (isset($param['data']['status']) ? $param['data']['status'] : null), ['class' => 'form-control', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<h5><b>Detail Items</b></h5>
					<div class="m-b-md">
						<div id="content-item"></div>
						
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-7 text-right">
								<h4>Subtotal</h4>
							</div>
							<div class="col-md-5">
								{!! Form::text('subtotal', (isset($param['data']['subtotal']) ? $param['data']['subtotal'] : 0), ['class' => 'form-control subtotal mask-money', 'placeholder' => '', 'readonly' => 'readonly']) !!}
							</div>
						</div>
					</div>
					<hr/>
					<div class="form-group text-right">
						{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
				<div id="template-item" style="display: none;">
					<div class="row item" data-total="0">
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::text('item[]', (isset($param['data']['item']) ? $param['data']['item'] : null), ['class' => 'form-control', 'placeholder' => 'Item']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::text('deskripsi[]', (isset($param['data']['deskripsi']) ? $param['data']['deskripsi'] : null), ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								{!! Form::text('qty[]', (isset($param['data']['qty']) ? $param['data']['qty'] : 0), ['class' => 'form-control qty mask-number-small', 'placeholder' => 'Qty', 'data-flag' => '']) !!}
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								{!! Form::text('diskon_satuan[]', (isset($param['data']['diskon_satuan']) ? $param['data']['diskon_satuan'] : 0), ['class' => 'form-control diskon mask-money', 'placeholder' => 'Diskon Satuan', 'data-flag' => '']) !!}
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								{!! Form::text('harga_satuan[]', (isset($param['data']['harga_satuan']) ? $param['data']['harga_satuan'] : 0), ['class' => 'form-control harga mask-money', 'placeholder' => 'Harga Satuan', 'data-flag' => '']) !!}
							</div>
						</div>
						<div class="col-md-1">
							<a href="#" class="btn btn-success btn-sm add init-add-one" style="margin-top: 3px;" data-item="0" data-template="template-item" data-content="content-item" data-typeclone="form-with-value"><i class="fa fa-plus-circle"></i> item</a>
							<a href="#" class="btn btn-danger btn-sm remove hide" style="margin-top: 3px;" data-item="0" data-template="template-item" data-content="content-item" data-typeclone="form-with-value"><i class="fa fa-minus-circle"></i> item</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endpush

@push('scripts')
@endpush