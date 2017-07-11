<div class="row p-t-none p-b-none step">
	<div class="col-xs-12 col-md-12 p-l-none p-r-none step-content">
		<div class="state text-center {{ ($page_datas->credit['status'] == 'lunas') ? 'success' : 'complete' }}">1. Pengajuan</div>
		<div class="state text-center {{ ($page_datas->credit['status'] == 'lunas') ? 'success' : 'complete' }}">2. Survei</div>
		<div class="state text-center {{ ($page_datas->credit['status'] == 'lunas') ? 'success' : 'complete' }}">3. Menunggu Persetujuan</div>
		<div class="state text-center {{ ($page_datas->credit['status'] == 'lunas') ? 'success' : 'complete' }}">4. Menunggu Realisasi</div>
		<div class="state text-center {{ ($page_datas->credit['status'] == 'lunas') ? 'success' : 'complete' }}">5. Selesai</div>
	</div>
</div>