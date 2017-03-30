
window.getDataAttribute = function() {
	var attribute 	= {};
	var el 			= document.querySelector("input.input-search-ajax");

	$(el).on('keyup', function(e) {
		if (e.keyCode == 13) {
			this.attribute 	= e.target.dataset.parse;
			dataParse		= e.target.dataset.url;
			value 			= e.target.value;

			dataAjax 		= callAjax(value, dataParse);
			// attribute 		= splitAttribute(this.attribute);

			console.log(dataAjax);
			parsingToInput(attribute);
		}
	});

	function splitAttribute(param) {
		return param.split(',');
	}

	function parsingToInput(param) {
		$.each(param, function(index, value) {
			$('input.' +value).val();
			// console.log(index);
		});
	}

	function callAjax(param, url) {

			$.ajax({
				type: "GET",
				url: url,
				data: {nik: param},
				cache: true,
				success: function (data) {
					return data;
				}
			});
			

	}
}

$(document).ready( function() {
	window.getDataAttribute();
});