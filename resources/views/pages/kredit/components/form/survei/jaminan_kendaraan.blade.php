{!! Form::hidden('survei_jaminan_kendaraan[id]', (isset($param['data']['id']) ? $param['data']['id'] : null)) !!}
<h5 class="text-uppercase text-light">Data Kendaraan</h5>
<fieldset class="form-group">
	<label class="text-sm">Jenis Kendaraan</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('survei_jaminan_kendaraan[tipe]', $page_datas->select_jenis_kendaraan, (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'roda_2'), [
				'id' 	=> 'add-survei-jenis-kendaraan',
				'class' => 'form-control auto-tabindex quick-select select', 
				'placeholder' => 'Pilih',
				'data-placeholder' => 'Pilih', 
				'data-other' => 'input-tipe-jaminan-kendaraan',
				'onChange' 	=> 'uiJenisKendaraan(this);' 
			]) !!}
			{{-- {!! Form::hidden('survei_jaminan_kendaraan[tipe]', (isset($param['data']['tipe']) ? $param['data']['tipe'] : 'roda_2'), ['class' => 'input-tipe-jaminan-kendaraan input-kendaraan', 'data-field' => 'tipe']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Merk</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::select('survei_jaminan_kendaraan[merk]', $page_datas->select_merk_kendaraan, null, [
				'id'	=> 'merk-kendaraan',
				'class' => 'form-control auto-tabindex quick-select select', 
				'placeholder' => 'Merk Kendaraan', 
				'data-other' => 'input-merk-kendaraan',
				'data-preload' => $param['data']['merk']
			]) !!}
			{{-- {!! Form::text('survei_jaminan_kendaraan[merk]', (isset($param['data']['merk']) ? $param['data']['merk'] : 'daihatsu'), ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan ' . (isset($param['data']['merk']) && (in_array($param['data']['merk'], ['daihatsu', 'honda', 'isuzu', 'kawasaki', 'kia', 'mitsubishi', 'nissan', 'suzuki', 'toyota', 'yamaha']) ? 'hidden' : (!isset($param['data']['merk']) ? 'hidden' : ''))), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Tahun</label>
	<div class="row">
		<div class="col-md-2">
			{!! Form::text('survei_jaminan_kendaraan[tahun]', (isset($param['data']['tahun']) ? $param['data']['tahun'] : null), ['class' => 'form-control auto-tabindex  mask-year', 'placeholder' => 'Tahun', 'data-field' => 'tahun']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Warna</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::select('survei_jaminan_kendaraan[warna]', [
					'biru'			=> 'Biru',
					'hijau'			=> 'Hijau',
					'hitam'			=> 'Hitam',
					'merah'			=> 'Merah',
					'merah_muda'	=> 'Merah Muda',
					'orange'		=> 'Orange',
					'lain_lain'		=> 'Lainnya',
				], 
				(isset($param['data']['warna']) ? (in_array($param['data']['warna'], ['biru', 'hijau', 'hitam', 'merah', 'merah_muda', 'orange']) ? $param['data']['warna'] : 'lain_lain') : 'biru'), 
				['class' => 'form-control auto-tabindex quick-select select', 'placeholder' => 'Merk Kendaraan', 'data-other' => 'input-merk-kendaraan']) !!}
			{{-- {!! Form::text('survei_jaminan_kendaraan[warna]', (isset($param['data']['warna']) ? $param['data']['warna'] : 'biru'), ['class' => 'form-control auto-tabindex m-t-sm input-merk-kendaraan input-kendaraan ' . (isset($param['data']['warna']) && (in_array($param['data']['warna'], ['biru', 'hijau', 'hitam', 'merah', 'merah_muda', 'orange'])) ? 'hidden' : (!isset($param['data']['warna']) ? 'hidden' : '')), 'placeholder' => 'Sebutkan', 'style' => 'width:40%;']) !!} --}}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Nomor Mesin</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('survei_jaminan_kendaraan[nomor_mesin]', (isset($param['data']['nomor_mesin']) ? $param['data']['nomor_mesin'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nomor Mesin']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group p-b-sm">
	<label class="text-sm">Nomor Rangka</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('survei_jaminan_kendaraan[nomor_rangka]', (isset($param['data']['nomor_rangka']) ? $param['data']['nomor_rangka'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nomor Rangka']) !!}
		</div>
	</div>
</fieldset>
<h5 class="text-uppercase text-light">Data Legalitas Kendaraan</h5>
<fieldset class="form-group">
	<label class="text-sm">Atas Nama</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('survei_jaminan_kendaraan[atas_nama]', (isset($param['data']['atas_nama']) ? $param['data']['atas_nama'] : null), ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Atas Nama', 'data-field' => 'atas_nama']) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Nomor BPKB</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('survei_jaminan_kendaraan[nomor_bpkb]', (isset($param['data']['nomor_bpkb']) ? $param['data']['nomor_bpkb'] : null), ['class' => 'form-control auto-tabindex input-kendaraan', 'placeholder' => 'Nomor BPKB', 'data-field' => 'nomor_bpkb', 'readonly' => true]) !!}
		</div>
	</div>
</fieldset>

<fieldset class="form-group">
	<label class="text-sm">Nomor Polisi</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('survei_jaminan_kendaraan[nomor_polisi]', (isset($param['data']['nomor_polisi']) ? $param['data']['nomor_polisi'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => 'Nomor Polisi']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group p-b-sm">
	<label class="text-sm">Masa Berlaku STNK</label>
	<div class="row">
		<div class="col-md-5">
			{!! Form::text('survei_jaminan_kendaraan[masa_berlaku_stnk]', (isset($param['data']['masa_berlaku_stnk']) ? $param['data']['masa_berlaku_stnk'] : null), ['class' => 'form-control auto-tabindex mask-date']) !!}
			<span class="help-block">format pengisian tanggal hari/bulan/tahun (dd/mm/yyyy)</span>
		</div>
	</div>
</fieldset>

@include('components.helpers.forms.address', [
	'param'		=> [
		'prefix'	=> 'survei_jaminan_kendaraan',
		'data'		=> isset($param['data']['alamat']) ? $param['data']['alamat'] : null,
	],
	'data'		=> ['provinsi' 	=> $page_datas->provinsi],
	'settings'	=> [
		'class'		=> 'input-kendaraan'
	],
	'title'		=> 'Data Alamat Sesuai BPKB'
])

<h5 class="text-uppercase text-light p-t-sm">Data Penunjang</h5>
<fieldset class="form-group">
	<label class="text-sm">Harga Taksasi</label>
	<div class="row">
		<div class="col-md-3">
			{!! Form::text('jaminan_kendaraan[harga_taksasi]', (isset($param['data']['harga_taksasi']) ? $param['data']['harga_taksasi'] : null), ['class' => 'form-control auto-tabindex mask-money', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Status Kepemilikan</label>
	<div class="row">
		<div class="col-md-4">
			{!! Form::text('jaminan_kendaraan[status_kepemilikan]', (isset($param['data']['status_kepemilikan']) ? $param['data']['status_kepemilikan'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group">
	<label class="text-sm">Fungsi Sehari-hari</label>
	<div class="row">
		<div class="col-md-6">
			{!! Form::text('jaminan_kendaraan[fungsi_sehari_hari]', (isset($param['data']['fungsi_sehari_hari']) ? $param['data']['fungsi_sehari_hari'] : null), ['class' => 'form-control auto-tabindex', 'placeholder' => '']) !!}
		</div>
	</div>
</fieldset>
<fieldset class="form-group m-b-sm">
	<label for="jaminan_kendaraan[foto]" class="text-sm">Foto Jaminan</label>
	<div class="row">
		<div class="col-md-12">
			<div class="thunder-imgUploader" thunder-imgUploader-subtitle = "* File maksimum 200kb" thunder-imageUploader-store-url="{{ route('helper.gambar.store') }}" thunder-imageUploader-remove-url="{{ route('helper.gambar.destroy') }}">
	            <input id="jaminan_kendaraan[foto]" name="jaminan_kendaraan[foto]" type="file" multiple accept='image/jpeg'/>
	        </div>		
		</div>
	</div>
</fieldset>


<script type="text/javascript">
	//init 
	function initJaminanKendaraan(){
		$(document).find('.survei-jaminan-kendaraan').each(function(){
			uiJenisKendaraan($(this).find('#add-survei-jenis-kendaraan'));
		});
	}


	function uiJenisKendaraan(e){
		if($(e).val()){
			// init
			var merk = [];
			@foreach($page_datas->select_merk_kendaraan as $kategori => $values)
				merk["{{$kategori}}"] = [
					@foreach($values as $merk)
						'{{$merk}}',
					@endforeach
				];
			@endforeach

			// if val not empty
			var elementTarget = $(e).closest('.form-group').next('.form-group').find('#merk-kendaraan');

			elementTarget.html('');

			if($(e).val() != ''){
				// set ux roles
				elementTarget.prop('disabled', false);

				// set options based on tipe
				$.each(merk[$(e).val()], function(index, value) {
					var $option = $("<option value='" + value + "' data-id='" + value + "'>" +  window.thunder.stringManipulator.ucWords(window.thunder.stringManipulator.toSpace(value)) +"</option>");
					elementTarget.append($option);
				});					
			}else{
				elementTarget.prop('disabled', true);
			}

			// preload
			window.selectDropdown.setValue(elementTarget, elementTarget.attr('data-preload'));
		}
	}

</script>