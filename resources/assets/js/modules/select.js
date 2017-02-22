window.select = function() {
	$('.select').select2({
		theme: "bootstrap",
		allowClear: true
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
}