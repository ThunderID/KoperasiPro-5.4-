/* README

*/
window.formAjaxSubmit = {
	loadingEffect: function (btn) {
		button = btn.find('button[type="submit"]');
		checkSearch = button.attr('data-search');

		if (typeof (button) != 'undefined') {
			button.html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>');
		} else {
			button.html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i> &nbsp; Simpan..');
		}
	},
	checkState: function (btn) {
		return (btn.attr('data-ajax-submit') == false) ? false : true;
	},
	readonlyInput: function (btn) {
		btn.find(':input').attr('readonly', true);
		btn.find('select').attr('readonly', true);
	},
	disableForm: function (btn) {
		btn.find('a').each( function() {
			$(this).addClass('disabled');
		});
	},
	init: function () {
		$(document).on('submit', 'form', function () {
			window.formAjaxSubmit.loadingEffect($(this));
			window.formAjaxSubmit.checkState($(this));
			window.formAjaxSubmit.readonlyInput($(this));
			window.formAjaxSubmit.disableForm($(this));
		});
	}
}
$(document).ready( function() {
	window.formAjaxSubmit.init();
});
// $(document).on('submit', "form", function () {
// 	// loading effect
// 	btnSubmit = $(this).find('button[type="submit"]');
// 	searchBtnSubmit = btnSubmit.data('search'); 	// check if button submit use searching

// 	if (typeof searchBtnSubmit != 'undefined') {
// 		btnSubmit.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i>");	
// 	} else {
// 		btnSubmit.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> &nbsp; Simpan..");
// 	}

// 	//check is activate on this form
// 	if ($(this).data('ajax-submit') == false){
// 		return false;
// 	}
	
// 	// readonly input & select the form 
// 	$(this).find(":input").prop("readonly", true);
// 	$(this).find('select').prop('readonly', true);
// 	// disabled a the form
// 	$(this).find("a").each(function() {
// 		$(this).addClass('disabled');
// 	});
// });