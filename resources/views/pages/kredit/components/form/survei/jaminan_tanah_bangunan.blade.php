{!! Form::hidden('jaminan_tanah_bangunan[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<fieldset class="form-group">
	<label class="text-sm">Tipe</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jaminan_tanah_bangunan[tipe]', [
					'bangunan'	=> 'Bangunan',
					'tanah'		=> 'Tanah',
				], (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'bangunan'), ['class' => 'form-control quick-select select auto-tabindex', 'data-other' => 'input-tipe-jaminan-tanah-bangunan']) !!}
			{{-- {!! Form::hidden('jaminan_tanah_bangunan[tipe]', (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'bangunan'), ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'tipe']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jenis Sertifikat</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::select('jaminan_tanah_bangunan[jenis_sertifikat]', [
					'hgb'	=> 'Hak Guna Bangunan (HGB)',
					'shm'	=> 'Sertifikat Hak Milik (SHM)',
				], (isset($param['data']['jenis_sertifikat']) ? $param['data']['jenis_sertifikat'] : 'hgb'), ['class' => 'form-control quick-select select auto-tabindex']) !!} <br/>
			{{-- {!! Form::hidden('jaminan_tanah_bangunan[jenis_sertifikat]', (isset($param['data']['jenis_sertifikat']) ? $param['data']['jenis_sertifikat'] : 'hgb'), ['class' => 'input-tipe-jaminan-tanah-bangunan input-tanah-bangunan', 'data-field' => 'jenis_sertifikat']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">No. Sertifikat</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('jaminan_tanah_bangunan[nomor_sertifikat]', (isset($param['data']['nomor_sertifikat']) ? $param['data']['nomor_sertifikat'] : null), ['class' => 'form-control auto-tabindex mask-no-sertifikat input-tanah-bangunan', 'placeholder' => 'No. Sertifikat', 'data-field' => 'nomor_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Masa Berlaku</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('jaminan_tanah_bangunan[masa_berlaku_sertifikat]', (isset($param['data']['masa_berlaku_sertifikat']) ? $param['data']['masa_berlaku_sertifikat'] : null), ['class' => 'form-control auto-tabindex mask-date-format input-tanah-bangunan', 'placeholder' => 'Masa Berlaku', 'data-field' => 'masa_berlaku_sertifikat']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('jaminan_tanah_bangunan[atas_nama]', (isset($param['data']['atas_nama']) ? $param['data']['atas_nama'] : null), ['class' => 'form-control auto-tabindex input-tanah-bangunan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>

@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'jaminan_tanah_bangunan',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'						=> 'input-tanah-bangunan'
	]
])

<fieldset class="form-group">
	<label class="text-sm">Luas Tanah</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('jaminan_tanah_bangunan[luas_tanah]', (isset($param['data']['luas_tanah']) ? $param['data']['luas_tanah'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Luas Bangunan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('jaminan_tanah_bangunan[luas_bangunan]', (isset($param['data']['luas_bangunan']) ? $param['data']['luas_bangunan'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">M<sup>2</sup></div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Fungsi Bangunan</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jaminan_tanah_bangunan[fungsi_bangunan]', [
				'ruko'		=> 'Ruko',
				'rumah'		=> 'Rumah',
			], (isset($param['data']['fungsi_bangunan']) ? $param['data']['fungsi_bangunan'] : 'ruko'), ['class' => 'form-control auto-tabindex quick-select select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Bentuk Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[bentuk_bangunan]', [
				'tingkat'			=> 'Tingkat',
				'tidak_tingkat'		=> 'Tidak tingkat',
				'lain_lain'			=> 'Lainnya',
			], (isset($param['data']['bentuk_bangunan']) ? (in_array($param['data']['bentuk_bangunan'], ['tingkat', 'tidak_tingkat']) ? $param['data']['bentuk_bangunan'] : 'lain_lain') : 'tingkat'), ['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-jaminan-tanah-bangunan-bentuk-bangunan']) !!} <br/>
			{{-- {!! Form::text('jaminan_tanah_bangunan[bentuk_bangunan]', isset($param['data']['bentuk_bangunan']) ? $param['data']['bentuk_bangunan'] : 'tingkat', ['class' => 'form-control auto-tabindex m-t-sm input-jaminan-tanah-bangunan-bentuk-bangunan ' . (isset($param['data']['bentuk_bangunan']) && (in_array($param['data']['bentuk_bangunan'], ['tingkat', 'tidak_tingkat']) ? 'hidden' : (!isset($param['data']['bentuk_bangunan']) ? 'hidden' : '')))]) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Konstruksi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[konstruksi_bangunan]', [
				'permanen' 			=> 'Permanen',
				'semi_permanen'		=> 'Semi Permanen',
			], (isset($param['data']['konstruksi_bangunan']) ? $param['data']['konstruksi_bangunan'] : 'permanen'), ['class' => 'form-control auto-tabindex quick-select select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Lantai Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[lantai_bangunan]', [
				'keramik'		=> 'Keramik',
				'tanah'			=> 'Tanah',
				'tegel'			=> 'Tegel',
				'Ubin'			=> 'Ubin',
				'lain_lain'		=> 'Lainnya',
			], (isset($param['data']['lantai_bangunan']) ? (in_array($param['data']['lantai_bangunan'], ['keramik', 'tanah', 'tegel', 'ubin']) ? $param['data']['lantai_bangunan'] : 'lain_lain') : 'keramik'), ['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-jaminan-tanah-bangunan-lantai-bangunan']) !!} <br/>
			{{-- {!! Form::text('jaminan_tanah_bangunan[lantai_bangunan]', (isset($param['data']['lantai_bangunan']) ? $param['data']['lantai_bangunan'] : 'keramik'), ['class' => 'form-control auto-tabindex m-t-sm input-jaminan-tanah-bangunan-lantai-bangunan ' . (isset($param['data']['lantai_bangunan']) && (in_array($param['data']['lantai_bangunan'], ['keramik', 'tanah', 'tegel', 'ubin']) ? 'hidden' : !isset($param['data']['lantai_bangunan']) ? 'hidden' : ''))]) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Dinding Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[dinding]', [
				'bambu'		=> 'Bambu',
				'kayu'		=> 'Kayu',
				'tembok'	=> 'Tembok',
				'lain_lain'	=> 'Lainnya',
			], (isset($param['data']['dinding']) ? (in_array($param['data']['dinding'], ['bambu', 'kayu', 'tembok']) ? $param['data']['dinding'] : 'lain_lain') : 'bambu'), ['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-jaminan-tanah-bangunan-dinding']) !!} <br/>
			{{-- {!! Form::text('jaminan_tanah_bangunan[dinding]', (isset($param['data']['dinding']) ? $param['data']['dinding'] : 'bambu'), ['class' => 'form-control auto-tabindex m-t-sm input-jaminan-tanah-bangunan-dinding ' . (isset($param['data']['dinding']) && (in_array($param['data']['dinding'], ['bambu', 'kayu', 'tembok']) ? 'hidden' : !isset($param['data']['dinding']) ? 'hidden' : ''))]) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Listrik</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jaminan_tanah_bangunan[listrik]', [
				'450_watt'		=> '450 Watt',
				'900_watt'		=> '900 Watt',
				'1300_watt'		=> '1300 Watt',
			], (isset($param['data']['listrik']) ? $param['data']['listrik'] : '450_watt'), ['class' => 'form-control auto-tabindex quick-select select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Air</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jaminan_tanah_bangunan[air]', [
				'pdam'		=> 'PDAM',
				'sumur'		=> 'Sumur',
			], (isset($param['data']['air']) ? $param['data']['air'] : 'pdam'), ['class' => 'form-control auto-tabindex quick-select select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Jalan</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('jaminan_tanah_bangunan[jalan]', [
				'aspal'		=> 'Aspal',
				'batu'		=> 'Batu',
				'tanah'		=> 'Tanah',
			], (isset($param['data']['luas_tanah']) ? $param['data']['luas_tanah'] : 'aspal'), ['class' => 'form-control auto-tabindex quick-select select']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Lebar Jalan</label>
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				{!! Form::text('jaminan_tanah_bangunan[lebar_jalan]', (isset($param['data']['lebar_jalan']) ? $param['data']['lebar_jalan'] : null), ['class' => 'form-control auto-tabindex mask-number', 'placeholder' => '']) !!}
				<div class="input-group-addon">M</div>
			</div>
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Letak Lokasi Terhadap Jalan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[letak_lokasi_terhadap_jalan]', [
				'lebih_rendah_dari_jalan'		=> 'Lebih Rendah Dari Jalan',
				'lebih_tinggi_dari_jalan'		=> 'Lebih Tinggi Dari Jalan',
				'sama_dengan_jalan'				=> 'Sama Dengan Jalan',
				'lain_lain'						=> 'Lainnya',
			], (isset($param['data']['letak_lokasi_terhadap_jalan']) ? (in_array($param['data']['letak_lokasi_terhadap_jalan'], ['lebih_rendah_dari_jalan', 'lebih_tinggi_dari_jalan', 'sama_dengan_jalan']) ? $param['data']['letak_lokasi_terhadap_jalan'] : 'lain_lain') : 'lebih_rendah_dari_jalan'), ['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-jaminan-tanah-bangunan-letak-lokasi']) !!} <br/>
			{{-- {!! Form::text('jaminan_tanah_bangunan[letak_lokasi_terhadap_jalan]', (isset($param['data']['letak_lokasi_terhadap_jalan']) ? $param['data']['letak_lokasi_terhadap_jalan'] : 'lebih_rendah_dari_jalan'), ['class' => 'form-control auto-tabindex m-t-sm input-jaminan-tanah-bangunan-letak-lokasi ' . (isset($param['data']['letak_lokasi_terhadap_jalan']) && (in_array($param['data']['letak_lokasi_terhadap_jalan'], ['lebih_rendah_dari_jalan', 'lebih_tinggi_dari_jalan', 'sama_dengan_jalan']) ? 'hidden' : !isset($param['data']['letak_lokasi_terhadap_jalan']) ? 'hidden' : '')), 'style' => 'width:40%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Lingkungan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::select('jaminan_tanah_bangunan[lingkungan]', [
				'industri'		=> 'Industri',
				'kampung'		=> 'Kampung',
				'pasar'			=> 'Pasar',
				'perkantoran'	=> 'Perkantoran',
				'pertokoan'		=> 'Pertokoan',
				'perumahan'		=> 'Perumahan',
				'lain_lain'		=> 'Lainnya',
			], (isset($param['data']['lingkungan']) ? (in_array($param['data']['lingkungan'], ['industri', 'kampung', 'pasar', 'perkantoran', 'pertokoan', 'perumahan']) ? $param['data']['lingkungan'] : 'lain_lain') : 'industri'), 
			['class' => 'form-control auto-tabindex quick-select select', 'data-other' => 'input-jaminan-tanah-bangunan-linkungan']) !!} <br/>
			{{-- {!! Form::text('jaminan_tanah_bangunan[lingkungan]', (isset($param['data']['lingkungan']) ? $param['data']['lingkungan'] : 'industri'), ['class' => 'form-control auto-tabindex m-t-sm input-jaminan-tanah-bangunan-linkungan ' . 
			(isset($param['data']['lingkungan']) && (in_array($param['data']['lingkungan'], ['industri', 'kampung', 'pasar', 'perkantoran', 'pertokoan', 'perumahan']) ? 'hidden' : !isset($param['data']['lingkungan']) ? 'hidden' : '')), 'style' => 'width:40%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nilai Jaminan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[nilai_jaminan]', (isset($param['data']['nilai_jaminan']) ? $param['data']['nilai_jaminan'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Taksasi Tanah</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[taksasi_tanah]', (isset($param['data']['taksasi_tanah']) ? $param['data']['taksasi_tanah'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Taksasi Bangunan</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[taksasi_bangunan]', (isset($param['data']['taksasi_bangunan']) ? $param['data']['taksasi_bangunan'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">NJOP</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[njop]', (isset($param['data']['njop']) ? $param['data']['njop'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">PBB Terakhir</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[pbb_terakhir]', (isset($param['data']['pbb_terakhir']) ? $param['data']['pbb_terakhir'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Uraian</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('jaminan_tanah_bangunan[uraian]', (isset($param['data']['uraian']) ? $param['data']['uraian'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>