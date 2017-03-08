<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA PENJAMIN</h4>
		<hr/>
	</div>
</div>

@if(!empty($page_datas->credit['penjamin']))
<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Nama</strong></p>
				<p>
					{{ $page_datas->credit['penjamin']['nama'] }}
				</p>
			</div>
		</div>

	</div>
</div>
@else
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl m-t-xs-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#data_penjamin" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		</div>
	</div>
@endif

@push('show_modals')

		

@endpush