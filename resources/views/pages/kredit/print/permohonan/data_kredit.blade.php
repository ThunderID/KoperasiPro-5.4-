<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Plafond yang diajukan</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['pengajuan_kredit'] }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Jenis Kredit</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ ucwords(str_replace('_', ' ', $page_datas->credit['jenis_kredit'])) }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Jangka Waktu</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['jangka_waktu'] }} bulan</p>
			</div>
		</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>