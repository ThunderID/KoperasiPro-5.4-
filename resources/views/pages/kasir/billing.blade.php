@extends('template.cms_template')

@section('kasir')
	active in
@stop

@section('billing')
	active
@stop

@push('content')
<div class="p-content">
	<div class="page-header m-t-none m-b-xl p-b-xs">
		<h2 class="m-t-none m-b-xs">{{ $page_attributes->title }}</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{!! Form::open(['url' => '', 'class' => 'form no-enter', 'data-ajax-submit' => true]) !!}
					{!! Form::hidden('koperasi_id', '') !!}
					{{-- <h5 class="text-uppercase text-light">Debitur ID</h5> --}}
					<div class="form-group">
						<label class="text-sm">Debitur</label>
						<div class="row ml-0 mr-0">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<select name="debitur_id" id="" class="form-control select">
									@foreach ($page_datas->kreditur as $k => $v)
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
								{!! Form::text('nomor_nota', (isset($param['data']['nomor_nota']) ? $param['data']['nomor_nota'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Tipe</label>
						<div class="row">
							<div class="col-md-3">
								{!! Form::text('tipe', (isset($param['data']['tipe']) ? $param['data']['tipe'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Tanggal</label>
						<div class="row">
							<div class="col-md-2">
								{!! Form::text('tanggal', (isset($param['data']['tanggal']) ? $param['data']['tanggal'] : null), ['class' => 'form-control auto-tabindex mask-date-format', 'placeholder' => '']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-sm">Status</label>
						<div class="row">
							<div class="col-md-3">
								{!! Form::text('status', (isset($param['data']['status']) ? $param['data']['status'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
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
								{!! Form::text('subtotal', (isset($param['data']['subtotal']) ? $param['data']['subtotal'] : 0), ['class' => 'form-control auto-tabindex subtotal mask-money', 'placeholder' => '', 'readonly' => 'readonly']) !!}
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
								{!! Form::text('item[]', (isset($param['data']['item']) ? $param['data']['item'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Item']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::text('deskripsi[]', (isset($param['data']['deskripsi']) ? $param['data']['deskripsi'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Deskripsi']) !!}
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								{!! Form::text('qty[]', (isset($param['data']['qty']) ? $param['data']['qty'] : 0), ['class' => 'form-control auto-tabindex qty mask-number', 'placeholder' => 'Qty', 'data-flag' => '']) !!}
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								{!! Form::text('diskon_satuan[]', (isset($param['data']['diskon_satuan']) ? $param['data']['diskon_satuan'] : 0), ['class' => 'form-control auto-tabindex diskon mask-money', 'placeholder' => 'Diskon Satuan', 'data-flag' => '']) !!}
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								{!! Form::text('harga_satuan[]', (isset($param['data']['harga_satuan']) ? $param['data']['harga_satuan'] : 0), ['class' => 'form-control auto-tabindex harga mask-money', 'placeholder' => 'Harga Satuan', 'data-flag' => '']) !!}
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
	$(document).ready(function(){
		var buttonAdd = document.getElementsByClassName('add')[0];

			// add event click listener to button add
			if (typeof (buttonAdd) !== 'undefined') {
				buttonAdd.addEventListener('click', function(e) {
					e.preventDefault();
					// call function clone add
					add(this);
				});
				// first call to clone template
				buttonAdd.click();
			}


			function add (elem) {
				var templateItem = document.getElementById('template-item');
				var contentItem = document.getElementById('content-item');
				var cloneItem = templateItem.firstElementChild.cloneNode(true);
				var item = parseInt(elem.dataset.item);

				if (item != 0) {
					cloneItem.getElementsByClassName('add')[0].classList.add('hide');
					cloneItem.getElementsByClassName('remove')[0].classList.remove('hide');

					// replace icon button add to remove
					cloneItem.getElementsByClassName('remove')[0].getElementsByTagName('i')[0].classList.add('fa-minus-circle');
					cloneItem.getElementsByClassName('remove')[0].getElementsByTagName('i')[0].classList.remove('fa-plus-circle');

					// set total item in button add
					lengthButtonAdd = contentItem.getElementsByClassName('add').length;
					contentItem.getElementsByClassName('add')[lengthButtonAdd - 1].dataset.item = item + 1;
					// set total item in button remove
					cloneItem.getElementsByClassName('remove')[0].dataset.item = item + 1;
				} else {
					cloneItem.getElementsByClassName('add')[0].dataset.item = item + 1;
					cloneItem.getElementsByClassName('remove')[0].dataset.item = item + 1;
				}

				// get element qty, diskon, harga
				var qtyInput = cloneItem.getElementsByClassName('qty')[0];
				var diskonInput = cloneItem.getElementsByClassName('diskon')[0];
				var hargaInput = cloneItem.getElementsByClassName('harga')[0];

				// add event listener keypress on qty, diskon, harga
				initEventKeyPress(qtyInput, 'item' + (item + 1));
				initEventKeyPress(diskonInput, 'item' + (item + 1));
				initEventKeyPress(hargaInput, 'item' + (item + 1));
				
				// add class item with jumlah item div clone item
				cloneItem.classList.add('item' + (item + 1));

				var buttonAdd = cloneItem.getElementsByClassName('add')[0];
				var buttonRemove = cloneItem.getElementsByClassName('remove')[0];

				// add event click listener to button add
				buttonAdd.addEventListener('click', function(e) {
					e.preventDefault();
					// call function clone add
					add(this);
				});

				// add event click listener to button remove
				buttonRemove.addEventListener('click', function(e) {
					e.preventDefault();
					// get row item id 
					var itemID = this.dataset.item;
					remove('item' + itemID);
					// call function sub total
					subtotal();
				});

				// add clone item to content item
				if (item != 0) {
					contentItem.prepend(cloneItem);
				} else {
					contentItem.append(cloneItem);
				}
				window.formInputMask();

			}

			function remove (id) {
				var contentItem = document.getElementById('content-item');
				// remove item 
				contentItem.getElementsByClassName(id)[0].remove();
			}

			function initEventKeyPress(elem, flag) {
				elem.dataset.flag = flag;
				elem.onkeypress = function(e) {
					setTimeout(function() {
						totalRow(flag);
					}, 300);
				}
			}

			function totalRow (rowID) {
				var parent = document.getElementById('content-item').getElementsByClassName(rowID)[0];
				var qty = parent.getElementsByClassName('qty')[0].value;
				var diskon = parent.getElementsByClassName('diskon')[0].value.replace(/\./g, '').slice(3);
				var harga = parent.getElementsByClassName('harga')[0].value.replace(/\./g, '').slice(3);

				// get total row and parse to data attribute total in row 
				total = (harga - diskon)*qty;
				parent.dataset.total = total;

				// call function sub total
				subtotal();
			}

			function subtotal () {
				var lengthContent = document.getElementById('content-item').getElementsByClassName('item').length;
				var content = document.getElementById('content-item').getElementsByClassName('item');
				var subTotal = document.getElementsByClassName('subtotal')[0];

				// get & set total all item
				var temp = 0;
				for (var i=0; i<lengthContent; i++) {
					temp += parseInt(content[i].dataset.total);
				}

				subTotal.value = temp;
			}
	});
@endpush