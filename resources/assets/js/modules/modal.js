$('.modal').on('show.bs.modal', function(e) {
	modal = $(this);
	$(document).on('pjax:end', function() { 
		modal.modal('hide');
	});
});