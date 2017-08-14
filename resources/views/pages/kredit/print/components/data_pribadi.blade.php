<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">NIK</p>
	</div>
	<div class="col-sm-5 p-l-none p-r-none text">
		: <span class="string">{{ isset($datas['nik']) ? $datas['nik'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
	<div class="col-sm-4 p-l-none p-r-none">
		<p class="text text-capitalize">
			&nbsp;&nbsp;{!! (isset($datas['is_ktp']) && $datas['is_ktp'] == 1) ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Menggunakan E-KTP
		</p>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">Nama</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text">
		: <span class="string">{{ (isset($datas['nama'])) ? $datas['nama'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">Tgl Lahir</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text">
		: <span class="string">{{ (isset($datas['tanggal_lahir'])) ? $datas['tanggal_lahir'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">Jenis Kelamin</p>
	</div>
	<div class="col-sm-9 p-l-none p-r-none">
		<ul class="list-inline m-b-none">
			<li class="text-capitalize" style="width: 150px">
				<p class="text-capitalize m-b-xs text">
					: {!! (isset($datas['jenis_kelamin']) && $datas['jenis_kelamin'] == 'laki_laki') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Laki-laki
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['jenis_kelamin']) && $datas['jenis_kelamin'] == 'perempuan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Perempuan
				</p>
			</li>
		</ul>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">Status Pernikahan</p>
	</div>
	<div class="col-sm-9 p-l-none p-r-none">
		<ul class="list-inline m-b-none">
			<li class="text-capitalize" style="width: 150px">
				<p class="text-capitalize m-b-xs text">
					: {!! (isset($datas['status_perkawinan']) && $datas['status_perkawinan'] == 'belum_kawin') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Belum Kawin
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['status_perkawinan']) && $datas['status_perkawinan'] == 'cerai_hidup') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Cerai Hidup
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					&nbsp;&nbsp;{!! (isset($datas['status_perkawinan']) && $datas['status_perkawinan'] == 'cerai_mati') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Cerai Mati
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['status_perkawinan']) && $datas['status_perkawinan'] == 'kawin') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Kawin
				</p>
			</li>
		</ul>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text-capitalize text">RT/RW</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
		: <span class="string">
			{{ (isset($datas['alamat']) && isset($datas['alamat'][0]['rt'])) ? $datas['alamat'][0]['rt'] : '' }}
			/ {{ (isset($datas['alamat']) && isset($datas['alamat'][0]['rw'])) ? $datas['alamat'][0]['rw'] : '' }}
		</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text-capitalize text">Desa/Dusun</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
		: <span class="string">{{ (isset($datas['alamat']) && isset($datas['alamat'][0]['desa'])) ? $datas['alamat'][0]['desa'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text-capitalize text">Kecamatan</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
		: <span class="string">{{ (isset($datas['alamat']) && isset($datas['alamat'][0]['distrik'])) ? $datas['alamat'][0]['distrik'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text-capitalize text">Kota/Kabupaten</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
		: <span class="string">{{ (isset($datas['alamat']) && isset($datas['alamat'][0]['regensi'])) ? $datas['alamat'][0]['regensi'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text-capitalize text">Provinsi</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text text-capitalize">
		: <span class="string">{{ (isset($datas['alamat']) && isset($datas['alamat'][0]['provinsi'])) ? $datas['alamat'][0]['provinsi'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">No. Telp/HP</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text">
		: <span class="string">{{ (isset($datas['telepon'])) ? $datas['telepon'] : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">Jenis Pekerjaan</p>
	</div>
	<div class="col-sm-9 p-l-none p-r-none">
		<ul class="list-inline m-b-none">
			<li class="text-capitalize" style="width: 200px">
				<p class="text-capitalize m-b-xs text">
					: {!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'tidak_bekerja') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Belum / Tidak Bekerja
				</p>
			</li>
			<li class=" text-capitalize" style="width: 180px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'karyawan_swasta') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Karyawan Swasta
				</p>
			</li>
			<li class=" text-capitalize" style="width: 200px;">
				<p class="text-capitalize m-b-xs text">
					&nbsp;&nbsp;{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'nelayan') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Nelayan
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'pegawai_negeri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Pegawai Negeri
				</p>
			</li>
			<li class=" text-capitalize" style="width: 200px;">
				<p class="text-capitalize m-b-xs text">
					&nbsp;&nbsp;{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'petani') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Petani
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'polri') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Polri
				</p>
			</li>
			<li class=" text-capitalize" style="width: 200px;">
				<p class="text-capitalize m-b-xs text">
					&nbsp;&nbsp;{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'wiraswasta') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Wiraswasta
				</p>
			</li>
			<li class=" text-capitalize" style="width: 150px;">
				<p class="text-capitalize m-b-xs text">
					{!! (isset($datas['pekerjaan']) && $datas['pekerjaan'] == 'lain_lain') ? '<i class="fa fa-check-square-o label-fa-icon"></i>' : '<i class="fa fa-square-o label-fa-icon"></i>' !!} Lainnya
				</p>
			</li>
		</ul>
	</div>
</div>
<div class="row row-info m-l-none m-r-none">
	<div class="col-sm-3 p-l-none p-r-none">
		<p class="text text-capitalize">Penghasilan Bersih</p>
	</div>
	<div class="col-sm-8 p-l-none p-r-none text">
		: Rp <span class="money">{{ isset($datas['penghasilan_bersih']) ? substr($datas['penghasilan_bersih'], 3) : '' }}</span>
		<div class="dot-line"></div>
	</div>
</div>