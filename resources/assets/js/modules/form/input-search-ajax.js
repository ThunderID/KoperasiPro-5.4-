
window.getDataAttribute = function() {
	var attribute 	= {};
	var el 			= document.querySelector("input.input-search-ajax");

	$(el).on('keyup', function(e) {
		if (e.keyCode == 13) {
			this.attribute 	= e.target.dataset.parse;
			dataParse		= e.target.dataset.url;
			value 			= '35-' +e.target.value;

			try {
				parsingToInput(dataAjax);
			}
			catch (err) {
				console.log('parsing data ajax error');
			}

			parsingToInput(attribute);
		}
	});

	function parsingToInput(data) {
		$.each(data, function(index, value) {
			try {
				if (index === 'nik') {
					value = value.substring(3);
				}
				// else if (value == 'is_ektp') {
				// 	if (value == 1) {
				// 		value = true;
				// 	}
				// }

				$('input[name*="' +index+ '"]').val(value);
				$('.input-switch').bootstrapSwitch('setState', (value == 1) ? true: false);
			}
			catch (err) {
				console.log('data tidak ada');
			}
		});
	}

	function callAjax(param, url) {
		try {
			ajax = $.ajax({
				type: "GET",
				url: url,
				data: {nik: param},
				cache: true,
				async: false,
				dataType: 'json',
				success: function (data) {
					// console.log(data);
					return data;
				}
			}).responseJSON;
			attribute = ajax;
		}
		catch (err)
		{
			console.log('error call ajax');
		}
	}
}

$(document).ready( function() {
	window.getDataAttribute();
});