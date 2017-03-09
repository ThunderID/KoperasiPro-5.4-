<div class="row m-t-xl-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA JAMINAN</h4>
		<hr class="print"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		@if (!empty($page_datas->credit['jaminan']))
			@if(isset($page_datas->credit['jaminan']['kendaraan']))
				@foreach($page_datas->credit['jaminan']['kendaraan'] as $key => $value)
					<div class="row m-b-sm-print">
						<div class="col-sm-8">
							<p>
								BPKB {{ ucwords($value['jenis']) }}
								{{ ucwords(str_replace('_', ' ', $value['legal']['status_kepemilikan'])) }}
							</p>
						</div>
					</div>
				@endforeach
			@endif

			@if(isset($page_datas->credit['jaminan']['tanah_bangunan']))
				@foreach($page_datas->credit['jaminan']['tanah_bangunan'] as $key => $value)
					<div class="row m-b-sm-print">
						<div class="col-sm-8">
							<p>
								{{ ucwords($value['tipe_jaminan']) }} 
								{{ ucwords(str_replace('_', ' ', $value['legal']['atas_nama_sertifikat'])) }}
							</p>
						</div>
					</div>
				@endforeach
			@endif
		@else
			<div class="row m-t-xs-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. </p>
				</div>
			</div>
		@endif
	</div>
</div>