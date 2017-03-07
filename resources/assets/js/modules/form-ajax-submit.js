$(document).on('submit', "form", function () {
	// disable the form 
	$(this).find(":input").prop("disabled", true);
	$(this).find("a").each(function() {
		$(this).addClass('disabled');
	});


	// loading effect
	btn_submit = $(this).find('button[type="submit"]');
	btn_submit.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> &nbsp; Saving");
});