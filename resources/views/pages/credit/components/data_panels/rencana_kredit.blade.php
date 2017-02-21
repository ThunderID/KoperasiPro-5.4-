<div class="row">
	<div class="col-sm-12">
		<h3 style="margin-top: 5px">RENCANA KREDIT</h3>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<h4><small>Pengajuan Kredit</small></h4>
	</div>
	<div class="col-sm-3" style="color: red">
		<h4>{{$page_datas->credit->credit->credit_amount->IDR()}}</h4>
	</div>

	<div class="col-sm-3">
		<h4><small>Jangka Waktu</small></h4>
	</div>
	<div class="col-sm-3" style="color: red">
		<h4>{{$page_datas->credit->credit->period}}</h4>
	</div>

	<div class="col-sm-3">
		<h4><small>Kemampuan Angsur</small></h4>
	</div>
	<div class="col-sm-3" style="color: red">
<?php
		// <h4>{{$page_datas->credit->credit->installment_capacity->IDR()}}</h4>
?>
	</div>

	<div class="col-sm-3">
		<h4><small>Tujuan Kredit</small></h4>
	</div>
	<div class="col-sm-3">
		<h4>{{$page_datas->credit->credit->purpose}}</h4>
	</div>
</div>