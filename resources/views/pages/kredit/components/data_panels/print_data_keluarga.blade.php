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
				<div class="col-sm-5">
					<p>Nama</p>
				</div>
				<div class="col-sm-7">
					<p>{{ $value['nama'] }}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">

			<div class="row m-b-xl m-b-sm-print">
				<div class="col-sm-5">
					<p>Hubungan</p>
				</div>
				<div class="col-sm-7">
					<p>{{ $value['relasi'] }}</p>
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
@endforelse