window.buttonUpload = function () {
	$('input[type="file"]').on('change', function() {
		$('.input-upload').val($(this).val().replace(/.*(\/|\\)/, ''));
	});
}

$(document).ready( function() {
	window.buttonUpload();
	// add event on pjax:end
	$(document).on("pjax:end", function() { 
		window.buttonUpload();
	});
});