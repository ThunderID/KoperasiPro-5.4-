window.noEnterToSubmit = {
	init: function () {
		$('form.no-enter input, form.no-enter select').on("keyup keypress", function(e) {
			var code = e.keyCode || e.which; 
			if (code  == 13) 
			{
				e.preventDefault();
				return false;
			}
		});
	}
}
$(document).ready( function() {
	window.noEnterToSubmit.init();
});