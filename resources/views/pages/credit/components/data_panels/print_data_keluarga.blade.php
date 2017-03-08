<div class="row m-t-md-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA KELUARGA</h4>
		<hr class="print"/>
	</div>
</div>

@forelse ($page_datas->credit['kreditur']['relasi'] as $key => $value)
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-4">
					<p>Nama</p>
				</div>
				<div class="col-sm-8">
					<p><strong>{{ $value['nama'] }}</strong></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-4">
					<p>Hubungan</p>
				</div>
				<div class="col-sm-8">
					<p><strong>{{ $value['relasi'] }}</strong></p>
				</div>
			</div>

		</div>
	</div>
@empty
	<div class="row">
		<div class="col-sm-12">
			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-12">
					<p>Belum ada data disimpan.</p>
				</div>
			</div>
		</div>
	</div>
@endforeach