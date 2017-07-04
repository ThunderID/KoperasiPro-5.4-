import $ from 'jquery';
window.select = function(element, param) {
	$('.select').select2({
		theme: "bootstrap",
		allowClear: true,
		width: null,
	});

	$('.select-get-ajax').on('select2:select', function(evt) {
		var url = $(this).attr('data-url');
		var val = $(this).find('option:selected').val();
		var caption = $(this).find('option:selected').html();
		var dataFlag = $(this).data('value-from-caption');
		
		if ((typeof dataFlag != 'undefined')) {
			$(this).val(caption);
		}

		// get select2 to parsing data
		var targetParsing = $(this).data('target-parsing');
		// get parent select on aktif
		var rootSelect = $(this).parent().parent().parent().parent();
		var elementTarget = rootSelect.find(targetParsing);

		// get data list on ajax
		$.ajax({
			type: "GET",
			url: url,
			data: {id: val},
			cache: true,
			success: function (data) {
				console.log(data);
				// parsing data ajax to content
				elementTarget.html('');
				$.each(data, function(index, value) {
					var $option = $("<option value='" + index + "' data-id='" +index+ "'>" + value +"</option>");
					// $option.val(v.id).text(v.nama);
					// elementTarget.append($option);
					elementTarget.append($option);
				});
				// remove default on selected
				elementTarget.val('');
			}
		});
		// remove disable select regensi
		elementTarget.removeAttr('disabled');
		// after get data, set focus to select-regensi
		elementTarget.focus();
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

// document ready & document pjax:end
$(document).ready( function() {
	window.select();
});

$(document).on('pjax:end',   function() { 
	window.select();
});