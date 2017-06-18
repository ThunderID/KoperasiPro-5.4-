window.buttonUpload = {
	upload: function () {
		$('input[type="file"').on('change', function () {
			$('.input-upload').val($(this).val().replace(/.*(\/|\\)/, ''));
		});
	},
	init: function () {
		this.upload();
	}
}
$(document).ready( function() {
	window.buttonUpload.init();
});