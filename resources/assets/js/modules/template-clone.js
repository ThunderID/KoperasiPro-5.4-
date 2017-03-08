$(function (){
	$('.add').click( function (e){
		e.preventDefault();
		dataFlag = $(this).data('active');
		template_add(dataFlag, $(this));
		window.resizeWizard(); // form wizard automatic height after add template

		// call plugin quick-select if data active 'jaminan'
		if ($(this).data('active') === 'jaminan') {
			$('.quick-select').choiceSelect();
			selectTypeJaminan();
			selectLegal();
		} else if ($(this).data('active') === 'contact') {
			window.formInputMask();
		}
		// add event remove template click
		$('.remove').click( function(e) {
			e.preventDefault();
			template_remove($(this));
		});
	});

});
/**
 * on document ready triger click btn 'add' for template clone
 */
$(document).ready( function() {
	$('.add.init-add-one').trigger('click');
});
/**
 * function template add
 * description: ...
 */
function template_add(flag, element) {
	target = element.data('target');
	temp = $('#' + target).children().clone();
	// check data is clone jaminan
	if (flag === 'jaminan') {
		replaceQuickSelect(temp); // replace name to 'quick-select'
	}
	// append template to section clone
	element.parent().parent().find('.section-clone-' + flag).append(temp);
}
/**
 * function template remove
 * description: ...
 */
function template_remove(e) {
	rootClone = e.parent().parent().parent().parent();
	rootClone.remove();
	window.resizeWizard();

	// call again event remove template click
	$('.remove').click(function(e) {
		e.preventDefault();
		template_remove($(this));
	});
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
		setName = $(this).find('option:selected').data('name');

		rootClone.find('.' + val).show(); // quick select legal yg sesuai akn aktif sesuai quick select type yg ter-select 
		valLegal = $('.' + val).children().find('option:selected').val(); // untuk mengisi inputan jaminan legal secara default

		// change parsing name input sesuai dengan type jaminan nya
		// change name input status kepemilikan
		rootClone.find('.credit-jaminan-kepemilikan').attr('name', setName + '[status_kepemilikan]');

		// change name & value input legalitas
		$('.' + val).siblings('.credit-jaminan-legal').val(valLegal);
		$('.' + val).siblings('.credit-jaminan-legal').attr('name', setName + '[legalitas]');

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
		name = $(this).data('name');
		$(this).parent().siblings('.credit-jaminan-legal').attr('name', name);
		$(this).parent().siblings('.credit-jaminan-legal').val(val);
		window.formEntertoTabs(); // form enter to tabs & on last input to next button for wizard
	});
}

/**
 * function count and each label increment template clone
 */