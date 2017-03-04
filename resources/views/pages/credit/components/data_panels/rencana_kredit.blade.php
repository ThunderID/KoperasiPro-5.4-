<div class="row m-t-xl-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">RENCANA KREDIT</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Pengajuan Kredit</strong></p>
				<p>{{ $page_datas->credit->credit->credit_amount->IDR() }}</p>
			</div>
		</div>
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Kemampuan Angsur</strong></p>
				<p>{{ $page_datas->credit->credit->installment_capacity->IDR() }}</p>
			</div>
		</div>		
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Jangka Waktu</strong></p>
				<p>{{ $page_datas->credit->credit->period }} bulan</p>
			</div>
		</div>			
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Tujuan Kredit</strong></p>
				<p>{{ $page_datas->credit->credit->purpose }}</p>
			</div>
		</div>	
	</div>
</div>