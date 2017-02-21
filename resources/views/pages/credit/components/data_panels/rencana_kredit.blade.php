<div class="row">
	<div class="col-sm-12">
		<h4>RENCANA KREDIT</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Pengajuan Kredit</strong></p>
				<p>{{$page_datas->credit->credit->credit_amount->IDR()}}</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Kemampuan Angsur</strong></p>
				<?php
					// <h4>{{$page_datas->credit->credit->installment_capacity->IDR()}}</h4>
				?>
				<?php
					// <p>{{$page_datas->credit->credit->installment->IDR()}}</p>
				?>
			</div>
		</div>		
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Jangka Waktu</strong></p>
				<p>{{$page_datas->credit->credit->period}} bulan</p>
			</div>
		</div>			
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Tujuan Kredit</strong></p>
				<p>{{$page_datas->credit->credit->purpose}}</p>
			</div>
		</div>	
	</div>

	<div class="col-sm-3">
		<h4><small>Tujuan Kredit</small></h4>
	</div>
	<div class="col-sm-3">
		<h4>{{$page_datas->credit->credit->purpose}}</h4>
	</div>
</div>