<div class="row m-l-none m-r-none">
	@forelse($page_datas->credit['jaminan_kendaraan'] as $key => $value)
			<div class="col-sm-12">
				<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan kendaraan {{$key+1}}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jenis Kendaraan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								: <input class="m-b-none" type="checkbox" @if($value['tipe']=='roda_2') checked @endif value="roda_2" style="height: 11px;"> Roda 2
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['tipe']=='roda_4') checked @endif value="roda_4" style="height: 11px;"> Roda 4
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['tipe']=='roda_6') checked @endif value="roda_6" style="height: 11px;"> Roda 6
							</li>
						</ul>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Merk</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px">
								: <input class="m-b-none" type="checkbox" @if($value['merk']=='daihatsu') checked @endif value="daihatsu" style="height: 11px;"> Daihatsu
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='honda') checked @endif value="honda" style="height: 11px;"> Honda
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='isuzu') checked @endif value="isuzu" style="height: 11px;"> Isuzu
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='kawasaki') checked @endif value="kawasaki" style="height: 11px;"> Kawasaki
							</li>
						</ul>
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" @if($value['merk']=='kia') checked @endif value="kia" style="height: 11px;"> Kia
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='mitsubishi') checked @endif value="mitsubishi" style="height: 11px;"> Mitsubishi
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='nissan') checked @endif value="nissan" style="height: 11px;"> Nissan
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='suzuki') checked @endif value="suzuki" style="height: 11px;"> Suzuki
							</li>
						</ul>
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" @if($value['merk']=='toyota') checked @endif value="toyota" style="height: 11px;"> Toyota
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='yamaha') checked @endif value="yamaha" style="height: 11px;"> Yamaha
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" @if($value['merk']=='lainnya') checked @endif value="lainnya" style="height: 11px;"> Lainnya
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. BPKB</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ $value['nomor_bpkb'] }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tahun</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ $value['tahun'] }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Atas nama</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ $value['atas_nama'] }}</p>
					</div>
				</div>
			</div>
	@empty
		@foreach(range(1,2) as $key)
			<div class="col-sm-12">
				<p class="text-capitalize m-l-min-md text-sm"><strong>jaminan kendaraan {{$key}}</strong></p>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Jenis Kendaraan</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								: <input class="m-b-none" type="checkbox" value="roda_2" style="height: 11px;"> Roda 2
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="roda_4" style="height: 11px;"> Roda 4
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="roda_6" style="height: 11px;"> Roda 6
							</li>
						</ul>
					</div>
				</div>
				<div class="row m-b-xs">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Merk</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px">
								: <input class="m-b-none" type="checkbox" value="daihatsu" style="height: 11px;"> Daihatsu
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="honda" style="height: 11px;"> Honda
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="isuzu" style="height: 11px;"> Isuzu
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="kawasaki" style="height: 11px;"> Kawasaki
							</li>
						</ul>
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="kia" style="height: 11px;"> Kia
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="mitsubishi" style="height: 11px;"> Mitsubishi
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="nissan" style="height: 11px;"> Nissan
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="suzuki" style="height: 11px;"> Suzuki
							</li>
						</ul>
						<ul class="list-inline m-b-none">
							<li class="text-sm text-capitalize" style="width: 90px;">
								&nbsp;&nbsp;<input class="m-b-none" type="checkbox" value="toyota" style="height: 11px;"> Toyota
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="yamaha" style="height: 11px;"> Yamaha
							</li>
							<li class="text-sm text-capitalize" style="width: 90px;">
								<input class="m-b-none" type="checkbox" value="lainnya" style="height: 11px;"> Lainnya
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">No. BPKB</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Tahun</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 p-l-none p-r-none">
						<p class="text-sm text-capitalize">Atas nama</p>
					</div>
					<div class="col-sm-9 p-l-none p-r-none">
						<p class="text-sm text-capitalize">: {{ str_repeat('.', 145) }}</p>
					</div>
				</div>
			</div>
		@endforeach
	@endforelse
</div>