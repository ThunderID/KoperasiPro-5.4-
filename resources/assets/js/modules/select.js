window.select = function() {
	$('.select').select2({
		theme: "bootstrap"
	});

	$('.select-province').on('select2:select', function(evt) {
		url = $(this).data('url');
		val = $(this).find('option:selected').val();
		$('.select-cities').select2({
			ajax: {
				url: url,
				dataType: 'json',
				data: function (term, page) {
					return { q: term };
				},
				results: function (data, page) {
					return { results: data };
				},
				cache: true
			}
		});
	});
}