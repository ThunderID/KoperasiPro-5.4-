<div class="row m-t-md-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA PENJAMIN</h4>
		<hr class="print"/>
	</div>
</div>
@if(!empty($page_datas->credit['penjamin']))
	<div class="row">
		<div class="col-sm-12">
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-4">
					<p>Nama</p>
				</div>
				<div class="col-sm-8">
					<p><strong>{{ $page_datas->credit['penjamin']['nama'] }}</strong></p>
				</div>
			</div>
		</div>
	</div>
@else
	<div class="row">
		<div class="col-sm-12">
			<div class="row m-b-xl m-b-sm-print">
				<p>Belum ada data disimpan.</p>
			</div>
		</div>
	</div>
@endif