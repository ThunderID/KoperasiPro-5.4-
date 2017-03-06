$("form").submit(function() {
	el = $(this).find('button[type="submit"]');
	el.prop('disabled', true);
	el.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> &nbsp; Saving");
});