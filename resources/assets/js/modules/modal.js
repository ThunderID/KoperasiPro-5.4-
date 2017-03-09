$('.modal').on('show.bs.modal', function(e) {
	modal = $(this);
	$(document).on('pjax:end', function() { 
		modal.modal('hide');
	});
});
$('.modal').on('shown.bs.modal', function(e) {
	window.select();
	window.formInputMask();
});