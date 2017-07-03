window.buttonUpload = {
	init: function () {
		$('.btn-upload').change(function () {
			$('.input-upload').val($(this).val().replace(/.*(\/|\\)/, ''));
		});
	}
}
$(document).ready( function() {
	window.buttonUpload.init();
});