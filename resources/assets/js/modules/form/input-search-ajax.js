
window.getDataAttribute = function() {
	var attribute 	= {};
	var el 			= document.querySelector("input.input-search-ajax");

	$(el).on('keyup', function(e) {
		if (e.keyCode == 13) {
			attribute 	= e.target.dataset.parse;
			dataURL			= e.target.dataset.url;
			dataParse 		= '35-' +e.target.value;

			try {
				callAjax(dataParse, dataURL);
				parsingToInput(attribute);
			}
			catch (err) {
				console.log('parsing data ajax error ' + err);
			}

			parsingToInput(attribute);
		}
	});

	function parsingToInput(data) {
		$.each(data, function(index, value) {
			switch(index) {
				case 'nik':
					value = value.substring(3);
					break;
				case 'foto_ktp':
					$('.input-upload').val(value);
					break;
				case 'is_ktp':
					$('.input-switch').bootstrapSwitch('state', value);
					break;
			}

			try {
				$('[name*="' +index+ '"]').val(value);
				$('select[name*="' +index+ '"]').val(value).change();
			}
			catch (err) {
				console.log('data tidak ada ' +index+ ' dengan data '+value);
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