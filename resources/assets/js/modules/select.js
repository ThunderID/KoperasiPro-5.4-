window.select = function() {
	$('.select').select2({
		theme: "bootstrap",
		allowClear: true
	});

	$('.select-tempat-lahir').select2({
		theme: "bootstrap",
		allowClear: true,
		tags: true
	});
	
	$('.select-provinsi').on('select2:select', function(evt) {
		url = $(this).data('url');
		val = $(this).find('option:selected').val();
		rootSelect = $(this).parent().parent().parent().parent(); //get parent select-province
		rootSelect.find('.select-regensi').html('');

		$.ajax({
			type: "GET",
			url: url,
			data: {id: val},
			cache: true,
			success: function(data) {
				// set select2 regensi option, value provinsi id selected from ajax
				rootSelect.find('.select-regensi').html('');
				$.each(data, function(i, v) {
					$option = $("<option></option>");
					$option.val(v.id).text(v.nama);
					rootSelect.find('.select-regensi').append($option);
				});
			}
		});
		// remove disable select regensi
		rootSelect.find('.select-regensi').removeAttr('disabled');
		// after get data, set focus to select-regensi
		rootSelect.find('.select-regensi').focus();
	});

	// on event select2 'regensi' on selected after focus to 'select-distrik' on form kontak
	$('.select-regensi').on('select2:select', function(evt) {
		url = $(this).data('url');
		val = $(this).find('option:selected').val();
		rootSelect = $(this).parent().parent().parent().parent(); //get parent select-regensi
		rootSelect.find('.select-distrik').html('');

		$.ajax({
			type: "GET",
			url: url,
			data: {id: val},
			cache: true,
			success: function(data) {
				// set select2 city option, value province selected from ajax
				rootSelect.find('.select-distrik').html('');
				$.each(data, function(i, v) {
					$option = $("<option></option>");
					$option.val(v.id).text(v.nama);
					rootSelect.find('.select-distrik').append($option);
				});
			}
		});
		// remove disable select distrik
		rootSelect.find('.select-distrik').removeAttr('disabled');
		// after get data, set focus to select distrik
		rootSelect.find('.select-distrik').focus();
	});

	// on event select2 'distrik' on selected after focus to 'select-desa' on form kontak
	$('.select-distrik').on('select2:select', function(evt) {
		url = $(this).data('url');
		val = $(this).find('option:selected').val();
		rootSelect = $(this).parent().parent().parent().parent(); //get parent select-cities
		rootSelect.find('.select-desa').html('');

		$.ajax({
			type: "GET",
			url: url,
			data: {id: val},
			cache: true,
			success: function(data) {
				// set select2 city option, value province selected from ajax
				rootSelect.find('.select-desa').html('');
				$.each(data, function(i, v) {
					$option = $("<option></option>");
					$option.val(v.id).text(v.nama);
					rootSelect.find('.select-desa').append($option);
				});
			}
		});
		// remove disable select desa
		rootSelect.find('.select-desa').removeAttr('disabled');
		// after get data, set focus to select desa
		rootSelect.find('.select-desa').focus();
	});

	// on event select2 'desa' on selected after focus to 'select-desa' on form kontak
	$('.select-desa').on('select2:select', function(evt) {
		rootSelect = $(this).parent().parent().parent().parent(); //get parent select-cities
		rootSelect.find('.input-kodepos').focus();
	});

	// on event select2 'pekerjaan' on selected after focus to 'input-jabatan' on form pekerjaan
	$('.select-pekerjaan').on('select2:select', function(evt) {
		rootSelect = $(this).parent().parent().parent().parent();
		rootSelect.find('.input-instansi').focus();
	});

	// on event select2 'lama-angsuran' on selected after focus to 'input-tujuan-kredit' on form rencana kredit
	$('.select-lama-angsuran').on('select2:select', function(evt) {
		rootSelect = $(this).parent().parent().parent().parent();
		rootSelect.find('.input-tujuan-kredit').focus();
	});
}