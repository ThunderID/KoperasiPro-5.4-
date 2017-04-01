window.setFocus = function(el) {
	$(el).focus();
}

$(document).ready(function() {
	window.setFocus('.set-focus');
});