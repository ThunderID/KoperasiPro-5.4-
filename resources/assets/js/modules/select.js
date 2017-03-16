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
	
	$('.select-province').on('select2:select', function(evt) {
		url = $(this).data('url');
		val = $(this).find('option:selected').val();
		rootSelect = $(this).parent().parent().parent().parent(); //get parent select-province
		rootSelect.find('.select-cities').html('');

		$.ajax({
			type: "GET",
			url: url,
			data: {id: val},
			cache: true,
			success: function(data) {
				// set select2 city option, value province selected from ajax
				rootSelect.find('.select-cities').html('');
				$.each(data, function(i, v) {
					$option = $("<option></option>");
					$option.val(v.city_id).text(v.city_name_full);
					rootSelect.find('.select-cities').append($option);
				});
			}
		});
		// after get data set focus to select-cities
		rootSelect.find('.select-cities').focus();
	});

	// on event select2 'cities' on selected after focus to 'input-kodepos' on form kontak
	$('.select-cities').on('select2:select', function(evt) {
		rootSelect = $(this).parent().parent().parent().parent();
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