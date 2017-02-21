$(function (){
	cobaa = 1;
	$('.add').click( function (){
		template_add();
		// form wizard automatic height after add template
		window.resizeWizard();
		// call plugin quick-select
		$('.quick-select').choiceSelect();
	});
});

$(document).ready( function() {
	$('.content-clone').find('.add').trigger('click');
	selectTypeJaminan();
	selectLegal();
});

/**
 * function template add
 * 
 */
function template_add() {
	temp = $('#template-clone').children().clone();
	replaceQuickSelect(temp);
	$('#section-clone').append(temp);
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
		$('.quick-select-legal').hide();
		val = $(this).find('option:selected').val();
		$('.' + val).show();
		// untuk mengisi inputan jaminan legal secara default
		valLegal = $('.' + val).children().find('option:selected').val();
		$('.' + val).siblings('.credit-collaterals-legal').val(valLegal);
	});
}

/**
 * function selectLegal
 * Description: ketika select option jaminan legal yang sedang aktif dan dipilih salah satu maka select option value jaminan legal
 * yg sedang terselect akan dimasukkan ke value inputan jaminan legal
 */
function selectLegal() {
	$('.quick-select-legal').on('change', function() {
		console.log('yes');
		val = $(this).find('option:selected').val();
		$(this).parent().siblings('.credit-collaterals-legal').val(val);
	});
}