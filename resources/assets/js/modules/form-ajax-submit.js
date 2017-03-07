$(document).on('submit', "form", function () {
	$("#target :input").prop("disabled", true);
	el = $(this).find('button[type="submit"]');
	el.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> &nbsp; Saving");
});