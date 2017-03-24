/* README

*/

$(document).on('submit', "form", function () {
	// loading effect
	btnSubmit = $(this).find('button[type="submit"]');
	searchBtnSubmit = btnSubmit.data('search'); 	// check if button submit use searching

	if (typeof searchBtnSubmit != 'undefined') {
		btnSubmit.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i>");	
	} else {
		btnSubmit.html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> &nbsp; Simpan..");
	}

	//check is activate on this form
	if ($(this).data('ajax-submit') == false){
		return false;
	}
	
	// readonly input & select the form 
	$(this).find(":input").prop("readonly", true);
	$(this).find('select').prop('readonly', true);
	// disabled a the form
	$(this).find("a").each(function() {
		$(this).addClass('disabled');
	});
});