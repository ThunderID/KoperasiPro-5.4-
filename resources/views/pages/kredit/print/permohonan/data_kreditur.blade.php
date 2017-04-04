<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Nomor KTP</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['kreditur']['nik'] }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Nama</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['kreditur']['nama'] }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Tanggal Lahir</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['kreditur']['tanggal_lahir'] }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Jenis Kelamin</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['kreditur']['jenis_kelamin'] }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Status</p>
			</div>
			<div class="col-sm-9">
				<p class="text-capitalize">: {{ ucwords(str_replace('_', ' ', $page_datas->credit['kreditur']['status_perkawinan'])) }}</p>
			</div>
		</div>
	</div>
</div>

@foreach((array)$page_datas->credit['kreditur']['alamat'] as $key => $value)
	@if ($key == 0)
		<div class="row">
			<div class="col-sm-12">
				<div class="row m-b-sm-print">
					<div class="col-sm-2">
						<p>Alamat</p>
					</div>
					<div class="col-sm-9">
						<p>: {{ $value['alamat'] }}</p>
					</div>
				</div>
				
				<div class="row m-b-sm-print">
					<div class="col-sm-1 col-sm-offset-2">
						<p>&nbsp;&nbsp;Kota/Kab</p>
					</div>
					<div class="col-sm-2">
						<p>: {{ (isset($value['regensi']) ? $value['regensi'] : '-') }}</p>
					</div>
					<div class="col-sm-1">
						<p>Kec</p>
					</div>
					<div class="col-sm-2">
						<p>: {{ (isset($value['distrik']) ? $value['distrik'] : '-') }}</p>
					</div>
				</div>

				<div class="row m-b-sm-print">
					<div class="col-sm-1 col-sm-offset-2">
						<p>&nbsp;&nbsp;Desa/Kel</p>
					</div>
					<div class="col-sm-2">
						<p>: {{ (isset($value['desa']) ? $value['desa'] : '-') }}</p>
					</div>
				</div>

				<div class="row m-b-sm-print">
					<div class="col-sm-1 col-sm-offset-2">
						<p>&nbsp;&nbsp;RT</p>
					</div>
					<div class="col-sm-2">
						<p>: {{ (isset($value['rt']) ? $value['rt'] : '-') }}</p>
					</div>
					<div class="col-sm-1">
						<p>RW</p>
					</div>
					<div class="col-sm-2">
						<p>: {{ (isset($value['rw']) ? $value['rw'] : '-') }}</p>
					</div>
				</div>
			</div>
		</div>
	@endif
@endforeach

<div class="row">
	<div class="col-sm-12">
		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Telepon</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['kreditur']['telepon'] }}</p>
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>		

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Pekerjaan</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ ucwords(str_replace('_', ' ', $page_datas->credit['kreditur']['pekerjaan'])) }}</p>
			</div>
		</div>

		<div class="row m-b-sm-print">
			<div class="col-sm-2">
				<p>Penghasilan Bersih</p>
			</div>
			<div class="col-sm-9">
				<p>: {{ $page_datas->credit['kreditur']['penghasilan_bersih'] }}</p>
			</div>
		</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>