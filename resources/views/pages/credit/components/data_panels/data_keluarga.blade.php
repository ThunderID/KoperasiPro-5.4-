<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">DATA KELUARGA</h4>
		<hr/>
	</div>
</div>

@if(isset($page_datas->credit->creditor->relatives))
	@foreach($page_datas->credit->creditor->relatives as $key => $value)
		<div class="row">
			<div class="col-sm-6">

				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p class="p-b-sm"><strong>Nama</strong></p>
						<p>
							{{ $value->name }}
						</p>
					</div>
				</div>

			</div>
			<div class="col-sm-6">

				<div class="row m-b-xl">
					<div class="col-sm-12">
						<p class="p-b-sm"><strong>Hubungan</strong></p>
						<p>
							{{ $value->relation }}
						</p>
					</div>
				</div>

			</div>
		</div>

		<div class="clearfix">&nbsp;</div>
		
		<div class="row">
			<div class="col-sm-12">
				<h5><a href="{{route('address.index', ['id' => $value->id, 'status' => 'rumah'])}}">Lihat Alamat</a></h5>
			</div>
		</div>
	@endforeach
@else
	<div class="row">
		<div class="col-sm-6">
			<div class="row m-b-xl">
				<div class="col-sm-12">
					<p>Belum ada data disimpan. <a href="#" data-toggle="modal" data-target="#" no-data-pjax> Tambahkan Sekarang </a></p>
				</div>
			</div>
		</div>
	</div>
@endif