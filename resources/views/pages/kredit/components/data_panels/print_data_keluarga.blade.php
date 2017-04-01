<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA KELUARGA</h4>
		<hr/>
	</div>
</div>

@if (isset($page_datas->credit['kreditur']['relasi']))
	@foreach ($page_datas->credit['kreditur']['relasi'] as $key => $value)
		<div class="row">
			<div class="col-sm-6">
				<div class="row m-b-xl m-t-xs-print">
					<div class="col-sm-12">
						<p class="p-b-sm m-b-xs-m-print"><strong>Nama</strong></p>
						<p>
							{{ $value['nama'] }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row m-b-xl m-t-xs-print">
					<div class="col-sm-12">
						<p class="p-b-sm m-b-xs-m-print"><strong>Hubungan</strong></p>
						<p>
							{{ $value['hubungan'] }}
						</p>
					</div>
				</div>

			</div>
		</div>
		<div class="clearfix hidden-print">&nbsp;</div>
	@endforeach
@endif

