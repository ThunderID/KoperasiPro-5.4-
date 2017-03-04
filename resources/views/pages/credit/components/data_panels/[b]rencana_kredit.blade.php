<div class="row m-t-m-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">RENCANA KREDIT</h4>
		<hr class="print"/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Pengajuan Kredit</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{$page_datas->credit->credit->credit_amount->IDR()}}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Kemampuan Angsur</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{$page_datas->credit->credit->installment_capacity->IDR()}}</strong></p>
			</div>
		</div>				
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Jangka Waktu</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{$page_datas->credit->credit->period}} bulan</strong></p>
			</div>
		</div>	
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl m-b-sm-print">
			<div class="col-sm-4">
				<p>Tujuan Kredit</p>
			</div>
			<div class="col-sm-8">
				<p><strong>{{$page_datas->credit->credit->purpose}}</strong></p>
			</div>
		</div>	
	</div>	
</div>	
