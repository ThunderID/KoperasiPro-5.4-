<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-jaminan">
			@include('pages.kredit.components.data.menunggu_persetujuan.data_jaminan_kendaraan',[
				'edit' => false
			])
			@include('pages.kredit.components.data.menunggu_persetujuan.data_jaminan_tanah_bangunan',[
				'edit' => false
			])
		</div>
	</div>
</div>