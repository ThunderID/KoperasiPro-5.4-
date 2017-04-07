{!! Form::hidden('jaminan_tanah_bangunan[id]', (isset($data['id']) ? $data['id'] : null)) !!}
<fieldset class="form-group">
	<label for="">Tipe</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select('jaminan_tanah_bangunan[tipe]', [
					'bangunan'	=> 'Bangunan',
					'tanah'		=> 'Tanah',
				], (isset($data['tipe']) ? $data['tipe'] : 'bangunan'), ['class' => 'form-control quick-select auto-tabindex', 'data-other' => 'input-tipe-jaminan-tanah-bangunan']) !!}
			{!! Form::hidden('jaminan_tanah_bangunan[tipe]', (isset($data['tipe']) ? $data['tipe'] : 'bangunan'), ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'tipe']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jenis Sertifikat</label>
	<div class="row">
		<div class="col-md-7">
			{!! Form::select('jaminan_tanah_bangunan[jenis_sertifikat]', [
					'hgb'	=> 'Hak Guna Bangunan (HGB)',
					'shm'	=> 'Sertifikat Hak Milik (SHM)',
				], (isset($data['jenis_sertifikat']) ? $data['jenis_sertifikat'] : 'hgb'), ['class' => 'form-control quick-select auto-tabindex']) !!}
			{!! Form::hidden('jaminan_tanah_bangunan[jenis_sertifikat]', (isset($data['jenis_sertifikat']) ? $data['jenis_sertifikat'] : 'hgb'), ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'jenis_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">No. Sertifikat</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('jaminan_tanah_bangunan[nomor_sertifikat]', (isset($data['nomor_sertifikat']) ? $data['nomor_sertifikat'] : null), ['class' => 'form-control auto-tabindex mask-kodepos input-tanah-bangunan', 'placeholder' => 'No. Sertifikat', 'data-field' => 'nomor_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Masa Berlaku</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('jaminan_tanah_bangunan[masa_berlaku_sertifikat]', (isset($data['masa_berlaku_sertifikat']) ? $data['masa_berlaku_sertifikat'] : null), ['class' => 'form-control auto-tabindex mask-date-format input-tanah-bangunan', 'placeholder' => 'Masa Berlaku', 'data-field' => 'masa_berlaku_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Atas Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('jaminan_tanah_bangunan[atas_nama]', (isset($data['atas_nama']) ? $data['atas_nama'] : null), ['class' => 'form-control auto-tabindex input-tanah-bangunan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>

@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'jaminan_tanah_bangunan',
		'data'		=> isset($data['alamat']) ? $data['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'						=> 'input-tanah-bangunan'
	]
])

<fieldset class="form-group">
	<label for="">Luas Tanah</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('jaminan_tanah_bangunan[luas_tanah]', (isset($data['luas_tanah']) ? $data['luas_tanah'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('jaminan_tanah_bangunan[luas_bangunan]', (isset($data['luas_bangunan']) ? $data['luas_bangunan'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Fungsi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[fungsi_bangunan]', [
				'ruko'		=> 'Ruko',
				'rumah'		=> 'Rumah',
			], (isset($data['fungsi_bangunan']) ? $data['fungsi_bangunan'] : 'ruko'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Bentuk Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[bentuk_bangunan]', [
				'tingkat'			=> 'Tingkat',
				'tidak_tingkat'		=> 'Tidak tingkat',
				'lain_lain'			=> 'Lainnya',
			], (isset($data['bentuk_bangunan']) ? $data['bentuk_bangunan'] : 'tingkat'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Konstruksi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[konstruksi_bangunan]', [
				'permanen' 			=> 'Permanen',
				'semi_permanen'		=> 'Semi Permanen',
			], (isset($data['konstruksi_bangunan']) ? $data['konstruksi_bangunan'] : 'permanen'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lantai Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[lantai_bangunan]', [
				'keramik'		=> 'Keramik',
				'tanah'			=> 'Tanah',
				'tegel'			=> 'Tegel',
				'Ubin'			=> 'Ubin',
				'lain_lain'		=> 'Lainnya',
			], (isset($data['lantai_bangunan']) ? $data['lantai_bangunan'] : 'keramik'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Dinding Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[dinding]', [
				'bambu'		=> 'Bambu',
				'kayu'		=> 'Kayu',
				'tembok'	=> 'Tembok',
				'lain_lain'	=> 'Lainnya',
			], (isset($data['dinding']) ? $data['dinding'] : 'bambu'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Listrik</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[listrik]', [
				'450_watt'		=> '450 Watt',
				'900_watt'		=> '900 Watt',
				'1300_watt'		=> '1300 Watt',
			], (isset($data['listrik']) ? $data['listrik'] : '450_watt'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Air</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[air]', [
				'pdam'		=> 'PDAM',
				'sumur'		=> 'Sumur',
			], (isset($data['air']) ? $data['air'] : 'pdam'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Jalan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[jalan]', [
				'aspal'		=> 'Aspal',
				'batu'		=> 'Batu',
				'tanah'		=> 'Tanah',
			], (isset($data['luas_tanah']) ? $data['luas_tanah'] : 'aspal'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lebar Jalan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('jaminan_tanah_bangunan[lebar_jalan]', (isset($data['lebar_jalan']) ? $data['lebar_jalan'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">M</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Letak Lokasi Terhadap Jalan</label>
	<div class="row">
		<div class="col-md-10">
			{!! Form::select('jaminan_tanah_bangunan[letak_lokasi_terhadap_jalan]', [
				'lebih_rendah_dari_jalan'		=> 'Lebih Rendah Dari Jalan',
				'lebih_tinggi_dari_jalan'		=> 'Lebih Tinggi Dari Jalan',
				'sama_dengan_jalan'				=> 'Sama Dengan Jalan',
				'lain_lain'						=> 'Lainnya',
			], (isset($data['letak_lokasi_terhadap_jalan']) ? $data['letak_lokasi_terhadap_jalan'] : 'lebih_rendah_dari_jalan'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Lingkungan</label>
	<div class="row">
		<div class="col-md-10">
			{!! Form::select('jaminan_tanah_bangunan[lingkungan]', [
				'industri'		=> 'Industri',
				'kampung'		=> 'Kampung',
				'pasar'			=> 'Pasar',
				'perkantoran'	=> 'Perkantoran',
				'pertokoan'		=> 'Pertokoan',
				'perumahan'		=> 'Perumahan',
				'lain_lain'		=> 'Lainnya',
			], (isset($data['lingkungan']) ? $data['lingkungan'] : 'industri'), ['class' => 'form-control auto-tabindex quick-select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Nilai Jaminan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[nilai_jaminan]', (isset($data['nilai_jaminan']) ? $data['nilai_jaminan'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Taksasi Tanah</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[taksasi_tanah]', (isset($data['taksasi_tanah']) ? $data['taksasi_tanah'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Taksasi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[taksasi_bangunan]', (isset($data['taksasi_bangunan']) ? $data['taksasi_bangunan'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Njop</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[njop]', (isset($data['njop']) ? $data['njop'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label for="">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[uraian]', (isset($data['uraian']) ? $data['uraian'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>