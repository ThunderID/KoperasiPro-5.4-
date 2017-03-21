	@if(isset($page_datas->credit['jaminan_tanah_bangunan']))
		@foreach((array)$page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<div class="row">
			<div class="col-sm-12">
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-3">
						<p>Jaminan Tidak Bergerak ({{($key + 1)}})</p>
					</div>
					<div class="col-sm-9">
						<p>{{ $value['jenis_sertifikat'] }}</p>
					</div>
				</div>
				
				<div class="row m-b-xl m-b-sm-print">
					<div class="col-sm-6 col-sm-offset-3">
						<div class="row">
							<div class="col-sm-3">
								<p>Nomor Sertifikat</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['nomor_sertifikat']}}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>Luas</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['luas']}} m2</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>Masa Berlaku</p>
							</div>
							<div class="col-sm-9">
								<p>{{$value['masa_berlaku_sertifikat']}}</p>
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

						<div class="row">
							<div class="col-sm-12">
								<div class="row m-b-xl m-b-sm-print">
									<div class="col-sm-3">
										<p>Alamat</p>
									</div>
									<div class="col-sm-9">
										<p>{{ $value['alamat']['alamat'] }}</p>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-2 col-sm-offset-3">
										<p>RT</p>
									</div>
									<div class="col-sm-1">
										<p>{{$value['alamat']['rt']}}</p>
									</div>
									<div class="col-sm-2">
										<p>RW
									</div>
									<div class="col-sm-1">
										<p>{{$value['alamat']['rt']}}</p>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-2 col-sm-offset-3">
										<p>Desa/Kel</p>
									</div>
									<div class="col-sm-7">
										<p>{{$value['alamat']['desa']}}</p>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2 col-sm-offset-3">
										<p>Kec</p>
									</div>
									<div class="col-sm-7">
										<p>{{$value['alamat']['distrik']}}</p>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2 col-sm-offset-3">
										<p>Kota/Kab</p>
									</div>
									<div class="col-sm-7">
										<p>{{$value['alamat']['regensi']}}</p>
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