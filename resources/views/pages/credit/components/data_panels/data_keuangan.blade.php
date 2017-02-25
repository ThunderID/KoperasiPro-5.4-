<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">DATA KEUANGAN</h4>
		<hr/>
	</div>
</div>

<!-- AREA PENDAPATAN -->
<div class="row">
	<div class="col-sm-12">
		<H4>Pendapatan</H4>
	</div>
</div>

@foreach($page_datas->credit->finance->incomes() as $key => $value)
	<div class="row">
		<div class="col-sm-6">
			<h4><small>{{$value->description}}</small></h4>
		</div>
		<div class="col-sm-6 text-right">
			<h4>{{$value->amount->IDR()}}</h4>
		</div>
	</div>
@endforeach

<!-- AREA PENGELUARAN -->
<div class="row">
	<div class="col-sm-12">
		<H4>Pengeluaran</H4>
	</div>
</div>

@foreach($page_datas->credit->finance->expenses() as $key => $value)
	<div class="row">
		<div class="col-sm-6">
			<h4><small>{{$value->description}}</small></h4>
		</div>
		<div class="col-sm-6 text-right">
			<h4>{{$value->amount->IDR()}}</h4>
		</div>
	</div>
@endforeach

<!-- AREA NET INCOME -->
<div class="row">
	<div class="col-sm-6" style="color: red">
		<h4>Pendapatan Bersih</h4>
	</div>
	<div class="col-sm-6 text-right" style="color: red">
		<h4>{{$page_datas->credit->finance->netIncome()->IDR()}}</h4>
	</div>
</div>
<div class="row">
	<div class="col-sm-6" style="color: red">
		<h4>Repayment Capacity</h4>
	</div>
	<div class="col-sm-6 text-right" style="color: red">
		<h4>{{$page_datas->credit->finance->repaymentCapacity()->IDR()}}</h4>
	</div>
</div>
