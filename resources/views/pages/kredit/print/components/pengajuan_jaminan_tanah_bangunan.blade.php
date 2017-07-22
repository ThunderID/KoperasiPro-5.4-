<div class="row m-l-none m-r-none">
	@forelse($page_datas->credit['jaminan_tanah_bangunan'] as $key => $value)
		<div class="col-sm-12">
			<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan {{$key+1}}</strong></p>
			<!-- <div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Tipe</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px;">
							: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Tanah
						</li>
						<li class="text-sm text-capitalize" style="width: 150px;">
							<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tanah &amp; Bangunan
						</li>
					</ul>
				</div>
			</div> -->
			<div class="row m-b-xs">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Jenis Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<ul class="list-inline m-b-none">
						<li class="text-sm text-capitalize" style="width: 90px">
							: <input class="m-b-none" type="checkbox" @if($value['jenis_sertifikat'] == 'shm') checked @endif value="shm" style="height: 11px;"> SHM
						</li>
						<li class="text-sm text-capitalize" style="width: 300px;">
							<input class="m-b-none" type="checkbox" @if($value['jenis_sertifikat'] == 'shgb' || $value['jenis_sertifikat'] == 'hgb') checked @endif value="shgb" style="height: 11px;"> SHGB Sampai Tahun @if($value['jenis_sertifikat'] == 'shgb' || $value['jenis_sertifikat'] == 'hgb') {{$value['masa_berlaku_sertifikat']}} @else {{ str_repeat('.', 8) }} @endif 
						</li>
					</ul>
				</div>
			</div>
			<div class="row" style="padding-top:2px;">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">No Sertifikat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ $value['nomor_sertifikat'] }}</p>
				</div>
			</div>
			<div class="row" style="padding-top:2px;">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Atas Nama</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ $value['atas_nama'] }}</p>
				</div>
			</div>
			<div class="row" style="padding-top:2px;">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Alamat</p>
				</div>
				<div class="col-sm-9 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: 
						{{ $value['alamat'][0]['alamat'] }} RT/RW {{ $value['alamat'][0]['rt']}}/{{ $value['alamat'][0]['rw'] }} @if(isset($value['alamat'][0]['desa'])) Desa/Dusun  {{ $value['alamat'][0]['desa'] }} @endif
						@if(isset($value['alamat'][0]['distrik'])) Kec. {{ $value['alamat'][0]['distrik'] }} @endif @if(isset($value['alamat'][0]['regensi'])) Kota/Kab {{ $value['alamat'][0]['regensi'] }} @endif Provinsi Jawa Timur 
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Luas Tanah</p>
				</div>
				<div class="col-sm-4 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ $value['luas_tanah'] }} M<sup>2</sup></p>
				</div>
				<div class="col-sm-2 p-l-none p-r-none">
					<p class="text-sm text-capitalize">Luas Bangunan</p>
				</div>
				<div class="col-sm-3 p-l-none p-r-none">
					<p class="text-sm text-capitalize">: {{ $value['luas_bangunan'] }} M<sup>2</sup></p>
				</div>
			</div>
		</div>
	@empty
		@foreach(range(1,3) as $key)
			<div class="col-sm-12">
				<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan tanah &amp; bangunan {{$key}}</strong></p>
				<!-- <div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tipe</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Tanah
							</li>
							<li class="text-sm text-capitalize" style="width: 150px;">
								<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Tanah &amp; Bangunan
							</li>
						</ul>
					</div>
				</div> -->
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jenis Sertifikat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px">
								: <input class="m-b-none" type="checkbox" value="shm" style="height: 11px;"> SHM
							</li>
							<li class="text-sm text-capitalize" style="width: 300px;">
								<input class="m-b-none" type="checkbox" value="shgb" style="height: 11px;"> SHGB Sampai Tahun {{ str_repeat('.', 8) }}
							</li>
						</ul>
					</div>
				</div>
				<div class="row" style="padding-top:2px;">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No Sertifikat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row" style="padding-top:2px;">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Atas Nama</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row" style="padding-top:2px;">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Alamat</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: 
							{{ str_repeat('.', 145) }} <br/><br/>
							RT/RW {{ str_repeat('.', 12)}}/{{ str_repeat('.', 12) }} Desa/Dusun {{ str_repeat('.', 40) }}
							Kec. {{ str_repeat('.', 38) }} <br/><br/> Kota/Kab {{ str_repeat('.', 58) }} Provinsi {{ str_repeat('.', 58) }}
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Luas Tanah</p>
					</div>
					<div class="col-sm-4 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 55) }} M<sup>2</sup></p>
					</div>
					<div class="col-sm-2 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Luas Bangunan</p>
					</div>
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 40) }} M<sup>2</sup></p>
					</div>
				</div>
			</div>
		@endforeach
	@endforelse
</div>