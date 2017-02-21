<div class="row">
	<div class="col-sm-12">
		<h4>RENCANA KREDIT</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Pengajuan Kredit</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->credit->credit_amount->IDR()}}</strong></p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Kemampuan Angsur</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->credit->installment->IDR()}}</strong></p>
			</div>
		</div>				
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Jangka Waktu</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->credit->period}} bulan</strong></p>
			</div>
		</div>	
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-6">
				<p>Tujuan Kredit</p>
			</div>
			<div class="col-sm-6">
				<p><strong>{{$page_datas->credit->credit->purpose}}</strong></p>
			</div>
		</div>	
	</div>	
</div>	
