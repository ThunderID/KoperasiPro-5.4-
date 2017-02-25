<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">RENCANA KREDIT</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Pengajuan Kredit</strong></p>
				<p>{{ $page_datas->credit->credit->credit_amount->IDR() }}</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Kemampuan Angsur</strong></p>
				<p>{{ $page_datas->credit->credit->installment_capacity->IDR() }}</p>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Jangka Waktu</strong></p>
				<p>{{ $page_datas->credit->credit->period }} bulan</p>
			</div>
		</div>			
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p class="p-b-sm"><strong>Tujuan Kredit</strong></p>
				<p>{{ $page_datas->credit->credit->purpose }}</p>
			</div>
		</div>	
	</div>
</div>