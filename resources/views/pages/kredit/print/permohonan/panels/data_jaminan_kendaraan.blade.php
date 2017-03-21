	@if(isset($page_datas->credit['jaminan_kendaraan']))
		@foreach((array)$page_datas->credit['jaminan_kendaraan'] as $key => $value)
		<div class="row">
			<div class="col-sm-12">
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-3">
						<p>Jaminan Bergerak ({{($key + 1)}})</p>
					</div>
					<div class="col-sm-9">
						<p>{{ $value['tipe'] }}</p>
					</div>
				</div>
				
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="row">
							<div class="col-sm-3">
								<p>Nomor BPKB</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['nomor_bpkb']}}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>Merk</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['merk']}}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>Tahun</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['tahun']}}</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<p>Tipe</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['merk']}}</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<p>Atas Nama</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['atas_nama']}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@endif