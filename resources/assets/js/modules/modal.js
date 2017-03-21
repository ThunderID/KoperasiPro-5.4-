window.callModal =  function() {
	$(".modal").on("show.bs.modal", function(e) {
		// call plugin be use on modal
		window.quickSelect();
		window.select();
		window.formInputMask();
		$(".input-switch").bootstrapSwitch(); // active switch button

		modal = $(this);
		$(document).on("pjax:end", function() { 
			modal.modal("hide");
		});
	});
	$(".modal").on("hidden.bs.modal", function(e) {
		get_data_jaminan_kendaraan();
		$(this).find("input, textarea").val("").end()
			.find("input[type=checkbox], input[type=radiobox]").prop("checked", "").end()
			.find("select").val("").end();
	});
}

function get_data_jaminan_kendaraan () {
	dataJaminanKend = {};
	$('.input-kendaraan').each( function() {
		field = $(this).data('field');
		value = $(this).val();
		dataJaminanKend[field] = value;
	});
	setToTableJaminanKendaraan(dataJaminanKend);
}

function setToTableJaminanKendaraan () {

}

// add event call on document ready & document pjax:end
$(document).ready( function() {
	window.callModal();
	// add event on pjax:end
	$(document).on("pjax:end", function() { 
		window.callModal();
	});
});