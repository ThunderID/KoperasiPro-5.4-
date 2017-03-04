<div class="row m-t-md-print">
	<div class="col-sm-12">
		<h4 class="m-b-sm-m-print">DATA KELUARGA</h4>
		<hr class="print"/>
	</div>
</div>

@if(isset($page_datas->credit->creditor->relatives))
	@foreach($page_datas->credit->creditor->relatives as $key => $value)
		<div class="row">
			<div class="col-sm-6">
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-4">
						<p>Nama</p>
					</div>
					<div class="col-sm-8">
						<p><strong>{{$value->name}}</strong></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">

				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-4">
						<p>Hubungan</p>
					</div>
					<div class="col-sm-8">
						<p><strong>{{$value->relation}}</strong></p>
					</div>
				</div>

			</div>
		</div>

		<div class="clearfix hidden-print">&nbsp;</div>
		
		<div class="row">
			<div class="col-sm-12">
				<h5 class="hidden-print"><a href="{{route('address.index', ['id' => $value->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5>
			</div>
		</div>
	@endforeach
@else
	<div class="row m-b-xl m-b-sm-print">
		<div class="col-sm-12">
			<p>
				Belum ada data keluarga
			</p>
		</div>
	</div>
@endif