<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- DATA ASET --}}
		<div data-panel="data-aset">
			@include ('pages.kredit.components.data.menunggu_persetujuan.data_aset_usaha',[
				'edit' => false
			])

			@include ('pages.kredit.components.data.menunggu_persetujuan.data_aset_kendaraan',[
				'edit' => false
			])

			@include ('pages.kredit.components.data.menunggu_persetujuan.data_aset_tanah_bangunan',[
				'edit' => false
			])
		</div>
	</div>
</div>