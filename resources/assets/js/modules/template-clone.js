
$(function (){
	$('.add').click( function (){
		dataFlag = $(this).data('active');
		template_add(dataFlag);
		window.resizeWizard(); // form wizard automatic height after add template

		// call plugin quick-select if data active 'jaminan'
		if ($(this).data('active') === 'jaminan') {
			$('.quick-select').choiceSelect();
			selectTypeJaminan();
			selectLegal();
		}
	});
});
/**
 * on document ready triger click btn 'add' for template clone
 */
$(document).ready( function() {
	$('.content-clone-contact').find('.add').trigger('click');
	$('.content-clone-jaminan').find('.add').trigger('click');
});
/**
 * function template add
 * description: ...
 */
function template_add(flag) {
	temp = $('#template-clone-' + flag).children().clone();
	// check data is clone jaminan
	if (flag === 'jaminan') {
		replaceQuickSelect(temp); // replace name to 'quick-select'
	}

	$('#section-clone-' + flag).append(temp);
}

/**
 * function replaceQuickSelect
 * description: untuk mereplace nama class quick-select-clone
 */
function replaceQuickSelect(el) {
	el.find('.quick-select-clone').removeClass('quick-select-clone').addClass('quick-select');
}

/**
 * function selectTypeJaminan
 * Description: show/hide jaminan legal dan mengeset value default dari jaminan legal yang sedang aktif 
 */
function selectTypeJaminan() {
	$('.quick-select-type').on('change', function() {
		rootClone = $(this).parent().parent().parent().parent(); // ambil root clone per row
		rootClone.find('.quick-select-legal').hide(); // setiap root clone quick select legal di hide

		val = $(this).find('option:selected').val();
		rootClone.find('.' + val).show(); // quick select legal yg sesuai akn aktif sesuai quick select type yg ter-select 
		valLegal = $('.' + val).children().find('option:selected').val(); // untuk mengisi inputan jaminan legal secara default
		$('.' + val).siblings('.credit-collaterals-legal').val(valLegal);

		window.resizeWizard(); // form wizard automatic height after add template
		window.formEntertoTabs(); // form enter to tabs & on last input to next button for wizard
	});
}

/**
 * function selectLegal
 * Description: ketika select option jaminan legal yang sedang aktif dan dipilih salah satu maka select option value jaminan legal
 * yg sedang terselect akan dimasukkan ke value inputan jaminan legal
 */
function selectLegal() {
	$('.quick-select-legal').on('change', function() {
		val = $(this).find('option:selected').val();
		$(this).parent().siblings('.credit-collaterals-legal').val(val);
		window.formEntertoTabs(); // form enter to tabs & on last input to next button for wizard
	});
}