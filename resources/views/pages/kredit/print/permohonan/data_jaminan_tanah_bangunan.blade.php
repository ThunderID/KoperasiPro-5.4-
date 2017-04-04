@if(isset($page_datas->credit['jaminan_tanah_bangunan']))
	@foreach((array)$page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-sm-12">
				<div class="row m-b-sm-print">
					<div class="col-sm-2">
						<p>Jaminan Tidak Bergerak ({{ ($key + 1) }})</p>
					</div>
					<div class="col-sm-9">
						<p class="text-uppercase">: {{ str_replace('_', ' ', $value['jenis_sertifikat']) }}</p>
					</div>
				</div>
				
				<div class="row m-b-sm-print">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-3 col-sm-offset-1">
								<p>&nbsp;&nbsp;Nomor Sertifikat</p>
							</div>
							<div class="col-sm-8">
								<p>: {{ $value['nomor_sertifikat'] }}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 col-sm-offset-1">
								<p>&nbsp;&nbsp;Luas</p>
							</div>
							<div class="col-sm-8">
								<p>: {{ $value['luas'] }} m2</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 col-sm-offset-1">
								<p>&nbsp;&nbsp;Masa Berlaku</p>
							</div>
							<div class="col-sm-8">
								<p>: {{ $value['masa_berlaku_sertifikat'] }}</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3 col-sm-offset-1">
								<p>&nbsp;&nbsp;Atas Nama</p>
							</div>
							<div class="col-sm-8">
								<p>: {{ $value['atas_nama'] }}</p>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="row m-b-sm-print">
									<div class="col-sm-3 col-sm-offset-1">
										<p>&nbsp;&nbsp;Alamat</p>
									</div>
									<div class="col-sm-8">
										<p>: {{ $value['alamat']['alamat'] }}</p>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-2 col-sm-offset-4">
										<p>&nbsp;&nbsp;Kota/Kab</p>
									</div>
									<div class="col-sm-2">
										<p>: {{ (isset($value['alamat']['regensi']) ? $value['alamat']['regensi'] : '-') }}</p>
									</div>
									<div class="col-sm-2">
										<p>Kec</p>
									</div>
									<div class="col-sm-2">
										<p>: {{ (isset($value['alamat']['distrik']) ? $value['alamat']['distrik'] : '-') }}</p>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-2 col-sm-offset-4">
										<p>&nbsp;&nbsp;Desa/Kel</p>
									</div>
									<div class="col-sm-2">
										<p>: {{ (isset($value['alamat']['desa']) ? $value['alamat']['desa'] : '-') }}</p>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2 col-sm-offset-4">
										<p>&nbsp;&nbsp;RT</p>
									</div>
									<div class="col-sm-2">
										<p>: {{ (isset($value['alamat']['rt']) ? $value['alamat']['rt'] : '-') }}</p>
									</div>
									<div class="col-sm-2">
										<p>RW
									</div>
									<div class="col-sm-2">
										<p>: {{ (isset($value['alamat']['rw']) ? $value['alamat']['rw'] : '-') }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endif