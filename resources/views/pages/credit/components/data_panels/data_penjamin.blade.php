<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA PENJAMIN</h4>
		<hr/>
	</div>
</div>

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

<div class="clearfix hidden-print">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Alamat</strong></p>
				<p class="p-b-xs m-b-xs-m-print">{{ $page_datas->warrantor_address_active->address->address->street }}, {{ $page_datas->warrantor_address_active->address->address->city }}</p>
				<p>{{ $page_datas->warrantor_address_active->address->address->province }} - {{ $page_datas->warrantor_address_active->address->address->country }}</p>
				<div class="clearfix hidden-print">&nbsp;</div>
				<h5 class="hidden-print"><a href="#" data-toggle="modal" data-target="#" no-data-pjax data-href="{{route('person.index', ['id' => $page_datas->credit->credit->warrantor->id, 'status' => 'rumah'])}}">Lihat Alamat Lain</a></h5>
			</div>
		</div>
	</div>
</div>