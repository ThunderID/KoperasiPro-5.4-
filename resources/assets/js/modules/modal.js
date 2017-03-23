window.callModal =  function() {
	$(".modal").on("shown.bs.modal", function(e) {
		// call plugin be use on modal
		window.quickSelect();
		window.formInputMask();
		$(".input-switch").bootstrapSwitch(); // active switch button

		modal = $(this);
		$(document).on("pjax:end", function() { 
			modal.modal("hide");
		});
	});
	$(".modal").on("hidden.bs.modal", function(e) {
		$(this).find("input, textarea").val("").end()
			.find("input[type=checkbox], input[type=radiobox]").prop("checked", "").end()
			.find("select").val("").end();
	});

	$('a[data-toggle="modal"]').on('click', function(e) {
		if ($(this).hasClass('disabled')) {
			e.stopPropagation();
		}
	});
}

// add event call on document ready & document pjax:end
$(document).ready( function() {
	window.callModal();
	// add event on pjax:end
	$(document).on("pjax:end", function() { 
		window.callModal();
	});
});