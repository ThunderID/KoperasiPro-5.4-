/**
 * module template-clone
 * usage: 	use data-attribute
 * 			data-template-clone: 	untuk template dari clonenya
 * 			data-root-template: 	untuk root dari template dan yang akan ditaruh templatenya
 */

var dataObj = {};
var templateClone, rootTemplate, $template, availableAdd, typeClone;
window.templateClone = function() {

	$('.add').click(function(e) {
		e.preventDefault();

		$template 		= $(this);
		rootTemplate 	= $template.data('root-template');		// class root dari template clone
		availableAdd 	= $template.data('available-add');		// jumlah yang boleh diclone
		typeClone 		= $template.data('type-clone');			// type clone
		templateClone 	= $template.data('template-clone');

		switch (typeClone) {
			case 'table':
				var inputParsing 	= $template.data('input-get');	// class input yang diparsing di form yang diclone
				var inputPrefix 	= $template.data('input-prefix');
				var countAdd 		= countDataClone(rootTemplate);	// ambil total data yang sudah diclone

				checkAvailableAdd(countAdd, availableAdd); // check data template lbh dari 3
				rowAdd($template, inputParsing, inputPrefix);

				$('body .modal').modal('hide');
				break;
			case 'form':
				formAdd($template);
				break;
		}

		$('.remove').on('click', function(e) {
			e.preventDefault();

			rootTemplate 	= $(this).data('root-template');
			availableAdd 	= $(this).data('available-add');
			typeClone 		= $(this).data('type-clone');

			switch (typeClone) {
				case 'table':
					rowRemove($(this));
			}
		});
	});
}
/**
 * on document ready triger click btn 'add' for template clone & event pjax:end
 */
$(document).ready(function() {
	window.templateClone();
	$('.add.init-add-one').trigger('click');
	// add event on pjax:end
	$(document).on('pjax:end',   function() { 
		window.templateClone();
		$('.add.init-add-one').trigger('click');
	});
});
/**
 * function template add
 * description: ...
 */
function formAdd(element) {
	temp = $('.' +templateClone).clone(true);

	// append template to section clone
	temp.find('input').removeAttr('disabled');
	$('.' +rootTemplate).append(temp);

	element.addClass('hidden');
}
/**
 * function template remove
 * description: ...
 */
// function template_remove(e) {
// 	rootClone = e.parent().parent().parent().parent();
// 	rootClone.remove();
// 	window.resizeWizard();

// 	// call again event remove template click
// 	$('.remove').click(function(e) {
// 		e.preventDefault();
// 		template_remove($(this));
// 	});
// }

// TABLE
/**
 * function replaceQuickSelect
 * description: untuk mereplace nama class quick-select-clone
 */
function replaceQuickSelect(el) {
	el.find('.quick-select-clone').removeClass('quick-select-clone').addClass('quick-select');
}

function rowAdd ($element, parameter, prefixName) {
	temp = $('.' +templateClone).clone(true);
	temp.removeClass('hidden').removeClass(templateClone).addClass('clone-row');
	getData(parameter);

	if (dataObj != null) {
		setData(dataObj, temp, prefixName);

		$('.' + rootTemplate).find('.template-clone-default').addClass('hidden');
		addButtonRemoveRow(temp, prefixName);
		$('.' + rootTemplate).append(temp);
	}
	window.resizeWizard();
}

/**
 * function tableRemove
 * param: 	$element (element dari button remove)
 * description: untuk menghapus list dari tabel
 */
function rowRemove($element) {
	$element.parent().parent().remove();

	i = 1;
	$('.' +rootTemplate).find('tr.clone-row').each( function() {
		$(this).find('.nomor').html(i);
		// renameInputHidden($(this), inputHidden, (i + 1));
		i++;
	});

	countData = countDataClone(rootTemplate);	// ambil total data yang sudah diclone
	checkAvailableAdd(countData - 1, availableAdd);

	if (countData == 1) {
		$('.' + rootTemplate).find('tr[class*="template-clone-default"]').removeClass('hidden');	// hidden data tabel default
	}
	
	window.resizeWizard();
}

function addButtonRemoveRow (template, prefixName) {
	template.find('.action').html('<a href="#" class="text-danger remove" data-type-clone="' +typeClone+ '" data-root-template="' +rootTemplate+'" data-available-add="' +availableAdd+ '" data-input-prefix="' +prefixName+ '"><i class="fa fa-trash"></i> Hapus</a>');
}

function addInputHidden (field, value) {
	$input = $('<input type="hidden" />');
	$input.attr('name', field).val(value);
	return $input;
}

function getData (parameter) {
	$(parameter).each( function(i, v) {
		var field = $(this).data('field');
		var value = $(this).val();

		dataObj[field] = value;
	});
}

function setData(data, temp, prefixName) {
	$.each(data, function(k, v) {
		temp.find('.' + k).html(v.replace('_', ' ').toLowerCase());
		inputHidden = addInputHidden(prefixName + '[' + k + '][]', v);
		temp.append(inputHidden);
	});

	dataCount = countDataClone(rootTemplate);
	temp.find('.nomor').html(dataCount);
}

// cek data jumlah data clone
function countDataClone(rootTemplate) {
	count = $('.' + rootTemplate).find('tr.clone-row').length + 1;
	return count;
}

// function tableAdd ($element, inputCheck, inputHidden) {
// 	getClassTemplate = $element.data('template-clone');
// 	getClassSection = $element.data('section-clone');
// 	getClassRootTemplate = $element.data('root-template');

// 	$temp = $('.' + getClassTemplate).clone(true);

// 	$temp.removeClass('hidden').removeClass(getClassTemplate).addClass('clone-jaminan');
// 	getDataJaminan($temp, getClassRootTemplate, inputCheck, inputHidden);
// 	$temp.find('.action').html('<a href="#" class="text-danger remove-jaminan" data-root-template="' +getClassRootTemplate+'" data-available-add="' +availableAdd+ '" data-input-hidden="' +inputHidden+ '">Hapus</a>');
	
// 	$('.' + getClassRootTemplate).append($temp);
// 	$('.' + getClassRootTemplate).find('.' + getClassTemplate + '-default').addClass('hidden');	// hidden data tabel default

// 	countClone = getCountDataClone(getClassRootTemplate);
// 	// renameInputHidden($temp, inputHidden, countClone);

// 	window.resizeWizard();
// }

/**
 * function checkAvailableAdd
 * param: 	state (jumlah yg sudah diclone)
 * 			available (jumlah clone yang boleh ditambahkan)
 * 			classRootTemplate (class root template clone & section clone)
 * description: untuk mengecheck jumlah yang dibolehkan untuk diclone
 */
function checkAvailableAdd(state, available) {
	if (state >= available) {
		$('.' + rootTemplate).parent().parent().find('.modal-add-jaminan').addClass('disabled');
		$('.' + rootTemplate).parent().parent().find('.modal-add-jaminan').siblings('.info-add').removeClass('hidden');
	} else {
		$('.' + rootTemplate).parent().parent().find('.modal-add-jaminan').removeClass('disabled');
		$('.' + rootTemplate).parent().parent().find('.modal-add-jaminan').siblings('.info-add').addClass('hidden');
	}
}

// function renameInputHidden($temp, inputHidden, count) {
// 	$temp.find('input[type="hidden"]').each(function() {
// 		name = $(this).attr('name');
// 		$(this).attr('name', inputHidden+ '[' +(count-1)+ ']' +name );
// 	});
// }