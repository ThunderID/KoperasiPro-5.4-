$("body").on("click", "*[data-toggle=hidden]", function(e) {
	e.preventDefault();

	target = $(this).data("target");
	panel = $(this).data('panel');

	$("div[data-panel=" +panel+ "]").addClass("hidden");
	$("div[data-form=" +target+ "]").removeClass("hidden");
});

$("body").on("click", "*[data-dismiss=panel]", function(e) {
	e.preventDefault();

	target = $(this).data("target");
	panel = $(this).data('panel');

	$("div[data-panel=" +panel+ "]").removeClass("hidden");
	$("div[data-form=" +target+ "]").addClass("hidden");
});