<div class="row p-t-none p-b-none step">
	<div class="col-xs-12 col-md-12 p-l-none p-r-none step-content">
		<div class="state text-center {{ ($page_datas->credit['status'] != 'tolak') ? 'active' : '' }}">1. Pengajuan</div>
		<div class="state text-center {{ ($page_datas->credit['status'] != 'tolak') ? 'active' : '' }}">2. Survei</div>
		<div class="state text-center {{ ($page_datas->credit['status'] != 'tolak') ? 'active' : '' }}">3. Disetejui</div>
		<div class="state text-center {{ ($page_datas->credit['status'] != 'tolak') ? 'active' : '' }}">4. Menunggu Realisasi</div>
		<div class="state text-center {{ ($page_datas->credit['status'] != 'tolak') ? 'active' : '' }}">5. Kredit Aktif</div>
		<div class="state text-center {{ ($page_datas->credit['status'] != 'tolak') ? 'active' : '' }}">6. Lunas</div>
	</div>
</div>	