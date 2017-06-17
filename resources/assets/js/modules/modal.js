window.moduleModal = {
	menuModal: function () {
		$('a.mobile-menu-content').on('click', function() {
			var toRoute = ($(this).data('menu-to') || false);
			var fromRoute = ($(this).data('menu-from') || false);

			if ((toRoute !== false) && (fromRoute !== false)) {
				$(fromRoute).addClass('hidden').css('opacity', 0);
				$('div.loading').removeClass('hidden');
				setTimeout (function () {
					$(toRoute).removeClass('hidden').css('opacity', 1);
					$('div.loading').addClass('hidden');
				}, 300);
			} else {
				$(this).closest('.modal').modal('hide');
				// $(fromRoute).addClass('hidden').css('opacity', 0);
				// $('#main-menu').removeClass('hidden').css('opacity', 1);
			}
		});
	},
	deleteModal: function () {
		$('#modal-delete').on('shown.bs.modal', function(e) {
			url = $(e.relatedTarget).attr('data-url');

			if (typeof (url) !== 'undefined') {
				$(this).find('.form-delete').attr('action', url).attr('method', 'delete');
				window.setFocusModule.init();
			}
		});
	},
	init: function () {
		this.menuModal();
		this.deleteModal();
	}
}

window.callModal =  function() {
	// $(".modal").on("shown.bs.modal", function(e) {
	// 	// call plugin be use on modal
	// 	window.quickSelect();
	// 	window.formInputMask();
	// 	$(".input-switch").bootstrapSwitch(); // active switch button

	// 	modal = $(this);
	// 	$(document).on("pjax:end", function() { 
	// 		modal.modal("hide");
	// 	});
	// });
	// $(".modal").on("hidden.bs.modal", function(e) {
	// 	// $(this).find("input, textarea").val("");
	// 	// $(this).find("input[type=checkbox], input[type=radiobox]").prop("checked", "");
	// 	// $(this).find("select").val("");
	// });

	// $('a[data-toggle="modal"]').on('click', function(e) {
	// 	if ($(this).hasClass('disabled')) {
	// 		e.stopPropagation();
	// 	}
	// });
}


// add event call on document ready & document pjax:end
$(document).ready( function() {
	window.moduleModal.init();
});