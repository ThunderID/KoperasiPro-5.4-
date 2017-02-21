window.formEntertoTabs = function () {
	$('input, a').on('keypress', function(e) {
		if (e.keyCode == 13) {
			elements = $(this).parents('section').eq(0).find('.auto-tabindex');
			idx = elements.index(this);

			if (idx == elements.length - 1) {
				// set to button next wizard
				$('.wizard').find('a[href$="#next"]').focus();
			} else {
				elements[idx + 1].focus();
				// elements[idx + 1].select();
			}
		}
	});
}
$(document).ready(function() {
	window.formEntertoTabs();
});