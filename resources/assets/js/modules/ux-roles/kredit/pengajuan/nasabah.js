var kredit_pengajuan_nasabah = function(){
	/* private function role form input nasabah */
	var disableInput = function(){
		document.getElementById("debitur_nama").disabled = true;
		document.getElementById("debitur_tanggal_lahir").disabled = true;
		document.getElementById("debitur_jenis_kelamin").disabled = true;
		document.getElementById("debitur_status_perkawinan").disabled = true;
		document.getElementById("debitur[alamat][0][alamat]").disabled = true;
		document.getElementById("debitur[alamat][0][rt]").disabled = true;
		document.getElementById("debitur[alamat][0][rw]").disabled = true;
		// document.getElementById("debitur[alamat][0][provinsi]").disabled = true;
		document.getElementById("debitur[alamat][0][regensi]").disabled = true;
		document.getElementById("debitur[alamat][0][distrik]").disabled = true;
		document.getElementById("debitur[alamat][0][desa]").disabled = true;
		document.getElementById("debitur[alamat][0][negara]").disabled = true;
		document.getElementById("debitur[telepon]").disabled = true;
		document.getElementById("debitur_pekerjaan").disabled = true;
		document.getElementById("debitur_penghasilan_bersih").disabled = true;
	}

	var enableInput = function(){
		document.getElementById("debitur_nama").disabled = false;
		document.getElementById("debitur_tanggal_lahir").disabled = false;
		document.getElementById("debitur_jenis_kelamin").disabled = false;
		document.getElementById("debitur_status_perkawinan").disabled = false;
		document.getElementById("debitur[alamat][0][alamat]").disabled = false;
		document.getElementById("debitur[alamat][0][rt]").disabled = false;
		document.getElementById("debitur[alamat][0][rw]").disabled = false;
		// document.getElementById("debitur[alamat][0][provinsi]").disabled = false;
		document.getElementById("debitur[alamat][0][regensi]").disabled = false;
		// document.getElementById("debitur[alamat][0][distrik]").disabled = false;
		document.getElementById("debitur[alamat][0][desa]").disabled = false;
		document.getElementById("debitur[alamat][0][negara]").disabled = false;
		document.getElementById("debitur[telepon]").disabled = false;
		document.getElementById("debitur_pekerjaan").disabled = false;
		document.getElementById("debitur_penghasilan_bersih").disabled = false;	
	}

	this.init = function(){
		// 1. disable all input
		if($('#debitur_id').val().length == 0){
			disableInput();
		}


		// 2. bind keypress on nik input
		$(document).on('keypress', '#debitur_id', function(e) {
			if($(this).val()[$(this).val().length -1] != '_' && $(this).val() != '' ){

				// UI
				$('.debitur_id_loader').css("visibility", "visible");
				// rm error msg
				$(this).trigger('blur');

				// disable autofill inputs
				disableInput();		
				
				// Ajax Data
				var nik = '35-'+document.getElementById("debitur_id").value;

				$.ajax({url: $(this).data('url')+"?nik="+nik, success: function(result, enableNasabahForm)
				{
					// UI
					$('.debitur_id_loader').css("visibility", "hidden");

					// enable autofill inputs
					enableInput();			

					// if result, set the data 
					if(result.nama){
						document.getElementById("debitur_nama").value = result.nama;
						document.getElementById("debitur_tanggal_lahir").value = result.tanggal_lahir;
						document.getElementById("debitur_jenis_kelamin").value = result.jenis_kelamin;
						document.getElementById("debitur_status_perkawinan").value = result.status_perkawinan;
						document.getElementById("debitur[alamat][0][alamat]").value = result.alamat.alamat;
						document.getElementById("debitur[alamat][0][rt]").value = result.alamat.rt;
						document.getElementById("debitur[alamat][0][rw]").value = result.alamat.rw;
						document.getElementById("debitur[alamat][0][provinsi]").value = result.alamat.provinsi;
						document.getElementById("debitur[alamat][0][regensi]").value = result.alamat.regensi;
						document.getElementById("debitur[alamat][0][distrik]").value = result.alamat.distrik;
						document.getElementById("debitur[alamat][0][desa]").value = result.alamat.desa;
						document.getElementById("debitur[alamat][0][negara]").value = result.alamat.negara;
						document.getElementById("debitur[telepon]").value = result.telepon;
						document.getElementById("debitur_pekerjaan").value = result.pekerjaan;
						document.getElementById("debitur_penghasilan_bersih").value = result.penghasilan_bersih;				
					}
				}});
			}
		});

		//3. bind additional 
		$("#modal-jaminan-tanah-bangunan").on("show.bs.modal", function () { 
			if(iface_kredit_pengajuan_nasabah.validate() == true){
				// clear all input
				$(this).find('input').val('');
				$(this).find('.select').each(function() {
					// special case don't need to cleared
					if (! $( this ).hasClass( "select-provinsi" ) ) {
						window.selectDropdown.clear($(this));		
					};
				});

				// init
				$(this).find('.select-regensi').prop('disabled', false);
				$(this).find('.select-distrik').prop('disabled', true);
				$(this).find('.select-distrik').prop('disabled', true);

				// set dummies
				$(this).find('.input-provinsi').val('JAWA TIMUR');
			}
		});
		$("#modal-jaminan-kendaraan").on("show.bs.modal", function () { 
			if(iface_kredit_pengajuan_nasabah.validate() == true){
				// clear all input
				$(this).find('input').val('');
				$(this).find('.select').each(function() {
					// special case don't need to cleared
					if (! $( this ).hasClass( "select-provinsi" ) ) {
						window.selectDropdown.clear($(this));		
					};
				});

				// init
				if($(this).find('.select-merk').val() == ""){
					$(this).find('.select-merk').prop('disabled', true);
				}
			}
		});

		//3. layout adjuster
		$(document).on('change', '#input_foto_ktp', function(e) {
			// input_foto_ktp
			var rslt = window.thunder.imagePreviewer.preview($(e.target).prop('files')[0], $('.thunder-imagePreview-canvas'));
			rslt.onloadend = function(){
				window.wizard.resizeContent();
				$('.thunder-imagePreview-path').val($(e.target).prop('files')[0].name);
			}
		});

	}

	this.validate = function()
	{
		// check if this is nasabah page
		if (top.location.pathname === '/credit/create'){
			return true;
		}
		return false;
	}
}

var iface_kredit_pengajuan_nasabah = new kredit_pengajuan_nasabah()

$(document).on('ready', function(kredit_pengajuan_nasabah) {
	if(iface_kredit_pengajuan_nasabah.validate() == true){
		iface_kredit_pengajuan_nasabah.init();
	}
});
$(document).on('pjax:end', function() { 
	if(iface_kredit_pengajuan_nasabah.validate() == true){
		iface_kredit_pengajuan_nasabah.init();
	}
});