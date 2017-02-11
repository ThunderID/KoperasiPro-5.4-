window.validation = function () {
	$('form').validate();
	$('.required').rules('add', {
		required: true,
		minlength: 3
	});
}