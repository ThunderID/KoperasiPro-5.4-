@if(isset($page_datas->credit['jaminan_kendaraan']))
	@foreach((array)$page_datas->credit['jaminan_kendaraan'] as $key => $value)
		<div class="row">
			<div class="col-sm-12">
				<div class="row m-b-sm-print">
					<div class="col-sm-2">
						<p>Jaminan Bergerak ({{ ($key + 1) }})</p>
					</div>
					<div class="col-sm-9">
						<p>: {{ ucwords(str_replace('_', ' ', $value['tipe'])) }}</p>
					</div>
				</div>
				
				<div class="row m-b-sm-print">
					<div class="col-sm-6 col-sm-offset-1">
						<div class="row">
							<div class="col-sm-2">
								<p>Nomor BPKB</p>
							</div>
							<div class="col-sm-9">
								<p class="text-uppercase">: {{ $value['nomor_bpkb'] }}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2">
								<p>Merk</p>
							</div>
							<div class="col-sm-9">
								<p class="text-capitalize">: {{ $value['merk'] }}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2">
								<p>Tahun</p>
							</div>
							<div class="col-sm-9">
								<p>: {{ $value['tahun'] }}</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-2">
								<p>Tipe</p>
							</div>
							<div class="col-sm-9">
								<p class="text-capitalize">: {{ $value['merk'] }}</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-2">
								<p>Atas Nama</p>
							</div>
							<div class="col-sm-9">
								<p class="text-capitalize">: {{ $value['atas_nama'] }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endif