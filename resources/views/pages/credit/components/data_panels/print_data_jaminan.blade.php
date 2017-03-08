<div class="row m-t-xl-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA JAMINAN</h4>
		<hr class="print"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		@if (!empty($page_datas->credit['jaminan']))
			@foreach($page_datas->credit['jaminan'] as $key => $value)
				<div class="row m-b-sm-print">
					<div class="col-sm-4">
						<p>{{ ucwords($value['type']) }}</p>
					</div>
					<div class="col-sm-8">
						<p>{{ strtoupper($value['legalitas']) }}</p>
					</div>
				</div>
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-4">
						<p>Status</p>
					</div>
					<div class="col-sm-8">
						<p>{{ ucwords(str_replace('_', ' ', $value['status_kepemilikan'])) }}</p>
					</div>
				</div>
			@endforeach
		@else
			<div class="row m-t-xs-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. </p>
				</div>
			</div>
		@endif
	</div>
</div>