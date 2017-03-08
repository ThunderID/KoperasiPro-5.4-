<div class="row m-t-sm-m-print">
	<div class="col-sm-12">
		<h4 class="text-uppercase m-b-sm-m-print">DATA PRIBADI</h4>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Nama</strong></p>
				<p>
					{{ $page_datas->credit['kreditur']['nama'] }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Jenis Kelamin</strong></p>
				<p>
					@gender($page_datas->credit['kreditur']['nama'])
				</p>
			</div>
		</div>	
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Tanggal Lahir</strong></p>
				<p>
					{{ $page_datas->credit['kreditur']['tanggal_lahir'] }}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Tempat Lahir</strong></p>
				<p>
					{{ $page_datas->credit['kreditur']['tempat_lahir'] }}
				</p>
			</div>
		</div>		
	</div>
	<div class="col-sm-6">
		<div class="row m-b-xl m-t-xs-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Pendidikan Terakhir</strong></p>
				<p>
					{{ $page_datas->credit['kreditur']['pendidikan_terakhir'] }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Status Pernikahan</strong></p>
				<p>
					@marital($page_datas->credit['kreditur']['status_perkawinan'])
				</p>
			</div>
		</div>		
		<div class="row m-b-xl m-t-sm-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Agama</strong></p>
				<p>
					{{ $page_datas->credit['kreditur']['agama'] }}
				</p>
			</div>
		</div>
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Nomor Telepon</strong></p>
				<p>Belum ada data disimpan. <a class="hidden-print" href="#" data-toggle="modal" data-target="#" no-data-pjax> Tambahkan Sekarang </a></p>
			</div>
		</div>
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-xl m-t-xs-m-print">
			<div class="col-sm-12">
				<p class="p-b-sm m-b-xs-m-print"><strong>Alamat</strong></p>
				<p class="p-b-xs m-b-xs-m-print">{{ $page_datas->credit['kreditur']['alamat'][0]['jalan'] }}, {{ $page_datas->credit['kreditur']['alamat'][0]['kota'] }}</p>
				<p>{{ $page_datas->credit['kreditur']['alamat'][0]['provinsi'] }} - {{ $page_datas->credit['kreditur']['alamat'][0]['negara'] }}</p>
				<p>{{ $page_datas->credit['kreditur']['alamat'][0]['kodepos'] }}</p>
				<div class="clearfix hidden-print">&nbsp;</div>
				{{-- <h5 class="hidden-print"><a href="#" data-toggle="modal" data-target="#" no-data-pjax data-href="{{route('person.index', ['id' => $page_datas->credit->creditor->id, 'status' => 'rumah'])}}">Lihat Alamat Lain</a></h5> --}}
			</div>
		</div>
	</div>
</div>

<div class="clearfix hidden-print">&nbsp;</div>

<div class="row">
	@if (isset($page_datas->credit['kreditur']['pekerjaan']))
		@foreach($page_datas->credit['kreditur']['pekerjaan'] as $key => $value)
			<div class="col-sm-6">
				<div class="row m-b-xl m-t-xs-m-print">
					<div class="col-sm-12">
						<p class="p-b-sm m-b-xs-m-print"><strong>Jenis Pekerjaan</strong></p>
						<p>
							{{ $value['area'] }}
						</p>
					</div>
				</div>
				<div class="row m-b-xl m-t-sm-m-print">
					<div class="col-sm-12">
						<p class="p-b-sm m-b-xs-m-print"><strong>Instansi</strong></p>
						<p>
							{{ $value['instansi'] }}
						</p>
					</div>
				</div>
				<div class="row m-b-xl m-t-sm-m-print">
					<div class="col-sm-12">
						<p class="p-b-sm m-b-xs-m-print"><strong>Posisi</strong></p>
						<p>
							{{ $value['jabatan'] }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row m-b-xl m-t-xs-m-print">
					<div class="col-sm-12">
						<p class="p-b-sm m-b-xs-m-print "><strong>Sejak</strong></p>
						<p>
							{{ $value['sejak'] }}
						</p>
					</div>
				</div>				
			</div>
			<div class="clearfix hidden-print">&nbsp;</div>
			<div class="col-sm-12">
				{{-- <h5 class="hidden-print"><u><a href="#">Lihat Alamat</a></u></h5> --}}
			</div>
		@endforeach
	@endif
</div>