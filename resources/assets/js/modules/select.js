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

	$('.select-get-ajax').on('select2:select', function(evt) {
		$url = $(this).data('url');
		$val = $(this).find('option:selected').val();
		// get select2 to parsing data
		$targetParsing = $(this).data('target-parsing');
		// get parent select on aktif
		rootSelect = $(this).parent().parent().parent().parent();

		// get data list on ajax
		$.ajax({
			type: "GET",
			url: $url,
			data: {id: $val},
			cache: true,
			success: function (data) {
				// parsing data ajax to content
				rootSelect.find($targetParsing).html('');
				$.each(data, function(i, v) {
					$option = $("<option></option>");
					$option.val(v.id).text(v.nama);
					rootSelect.find($targetParsing).append($option);
				});
				rootSelect.find($targetParsing).val('');
				// remove default on selected
			}
		});
		// remove disable select regensi
		rootSelect.find($targetParsing).removeAttr('disabled');
		// after get data, set focus to select-regensi
		rootSelect.find($targetParsing).focus();
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

$(document).ready( function() {
	window.select();
});