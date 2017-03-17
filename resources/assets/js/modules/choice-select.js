$.fn.choiceSelect = function(){	
	$(this).quickselect({
		buttonTag: 'a',
		activeButtonClass: 'btn-success active',
		breakOutAll: true,
		buttonClass: 'btn btn-default btn-sm auto-tabindex',
		wrapperClass: 'btn-group'
	});

}
/**
 * function quick_select_to_other
 * description: ambil data-other dari quick-select
 */
function quick_select_to_other(val, element) {
	other = element.data('other');

	// check if 'data-other' undefined
	if (typeof other != 'undefined') {
		// if val '00000' show input hidden
		if (val === '00000') {
			element.siblings('.' + other).attr('type', 'text').addClass('required').val('');	
		} else {
			element.siblings('.' + other).attr('type', 'hidden').removeClass('required').val(val);
		}
		window.resizeWizard();
	}
}
/**
 * function window.quickSelet
 * Description: untuk panggil plugin choice select agar bisa dipanggil dimana saja
 */
window.quickSelect = function() {
	$('.quick-select').choiceSelect();
	// event change on quick-select
	$('.quick-select').on('change', function() {
		selected = $(this).find('option:selected').val();
		quick_select_to_other(selected, $(this));
	});
}

$(document).ready( function() {
	window.quickSelect();
});