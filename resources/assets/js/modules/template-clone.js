window.templateClone = function() {
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
		}
		
		window.formInputMask();
		$(this).remove();

		// add event remove template click
		$('.remove').click( function(e) {
			e.preventDefault();
			template_remove($(this));
		});
	});

	$('.add-jaminan').click(function(e) {
		e.preventDefault();

		classRootTemplate = $(this).data('root-template'); 	// class root dari template clone & section clone
		inputCheck = $(this).data('input-parsing');			// class input yang di form jaminan
		availableAdd = $(this).data('available-add');		// jumlah data clone yang boleh ditambahkan 
		countAdd = getCountDataClone(classRootTemplate);	// ambil total data yang sudah diclone
		inputHidden = $(this).data('input-hidden');

		tableAdd($(this), inputCheck, inputHidden);
		checkAvailableAdd(countAdd, availableAdd, classRootTemplate); // check data template lbh dari 3

		$('.modal').modal('hide');
		$('.remove-jaminan').on('click', function(e) {
			e.preventDefault();
			tableRemove($(this));
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
function template_add(flag, element) {
	target = element.data('target');
	temp = $('#' + target).children().clone(true);
	// check data is clone jaminan
	if (flag === 'jaminan') {
		replaceQuickSelect(temp); // replace name to 'quick-select'
	}
	// append template to section clone
	temp.find('input').removeAttr('disabled');
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



function tableAdd ($element, inputCheck, inputHidden) {
	getClassTemplate = $element.data('template-clone');
	getClassSection = $element.data('section-clone');
	getClassRootTemplate = $element.data('root-template');

	$temp = $('.' + getClassTemplate).clone(true);

	$temp.removeClass('hidden').removeClass(getClassTemplate).addClass('clone-jaminan');
	getDataJaminan($temp, getClassRootTemplate, inputCheck, inputHidden);
	$temp.find('.action').html('<a href="#" class="text-danger remove-jaminan" data-root-template="' +getClassRootTemplate+'" data-available-add="' +availableAdd+ '" data-input-hidden="' +inputHidden+ '">Hapus</a>');
	
	$('.' + getClassRootTemplate).append($temp);
	$('.' + getClassRootTemplate).find('.' + getClassTemplate + '-default').addClass('hidden');	// hidden data tabel default

	countClone = getCountDataClone(getClassRootTemplate);
	// renameInputHidden($temp, inputHidden, countClone);

	window.resizeWizard();
}

/**
 * function tableRemove
 * param: 	$element (element dari button remove)
 * description: untuk menghapus list dari tabel
 */
function tableRemove($element) {
	$element.parent().parent().remove();
	getClassRootTemplate = $element.data('root-template');
	availableAdd = $(this).data('available-add');		// jumlah data clone yang boleh ditambahkan 
	countAdd = getCountDataClone(getClassRootTemplate);	// ambil total data yang sudah diclone
	inputHidden = $(this).data('input-hidden');

	checkAvailableAdd(countAdd, availableAdd, getClassRootTemplate);

	i = 1;
	$('.' +getClassRootTemplate).find('tr.clone-jaminan').each( function() {
		$(this).find('.nomor').html(i);
		// renameInputHidden($(this), inputHidden, (i + 1));
		i++;
	});

	if (countAdd == 1) {
		$('.' + getClassRootTemplate).find('tr[class*="default"]').removeClass('hidden');	// hidden data tabel default
	}
	
	window.resizeWizard();
}

/**
 * function checkAvailableAdd
 * param: 	state (jumlah yg sudah diclone)
 * 			available (jumlah clone yang boleh ditambahkan)
 * 			classRootTemplate (class root template clone & section clone)
 * description: untuk mengecheck jumlah yang dibolehkan untuk diclone
 */
function checkAvailableAdd(state, available, classRootTemplate) {
	if (countAdd >= availableAdd) {
		$('.' + classRootTemplate).parent().parent().find('.modal-add-jaminan').addClass('disabled');
		$('.' + classRootTemplate).parent().parent().find('.modal-add-jaminan').siblings('.info-add').removeClass('hidden');
	} else {
		$('.' + classRootTemplate).parent().parent().find('.modal-add-jaminan').removeClass('disabled');
		$('.' + classRootTemplate).parent().parent().find('.modal-add-jaminan').siblings('.info-add').addClass('hidden');
	}
}

/**
 * function getDataJaminan
 * param: 	template (clone dari template)
 * 			rootTemplate (root dari template clone & section clone)
 * 			element (inputan apa yang akan digunakan parsingan dari form jaminan)
 * description: ambil data jaminan dari form jaminan yang diambil dari inputan 'element' lalu dijadikan data object
 */
function getDataJaminan ($template, rootTemplate, element, inputHidden) {
	dataJaminan = {};
	$(element).each( function() {
		field = $(this).data('field');
		value = $(this).val();
		dataJaminan[field] = value;
	});
	setToTableJaminan(dataJaminan, $template, rootTemplate, inputHidden); // panggil fungsi yang untuk ditampilkan ke dalam tabel
}

/**
 * function setToTableJaminan
 * param: 	data (data object dari function getDataJaminan)
 * 			$template (clone dari template)
 * 			rootTemplate (root dari template clone & section clone)
 * description: set data object dan ditampilkan ke dalam tabel
 */
function setToTableJaminan (data, $template, rootTemplate, inputHidden) {
	$.each(data, function(key, value) {
		$template.find('.' + key).html(value.replace('_', ' ').toLowerCase());
		inputTemp = addInputHidden(key, value, rootTemplate, inputHidden);		// panggil fungsi tambahkan input hidden
		$template.append(inputTemp);			// tambahkan input hidden ke dalam template clone yg sdh diclone
	});

	dataCount = getCountDataClone(rootTemplate);
	$template.find('.nomor').html(dataCount);
}

// cek data jumlah data clone
function getCountDataClone(rootTemplate) {
	count = $('.' + rootTemplate).find('tr.clone-jaminan').length + 1;
	return count;
}

// tambah input hidden setelah tambah clone table
function addInputHidden(field, value, rootTemplate, inputHidden) {
	$input = $('<input type="hidden" />');
	$input.attr('name', inputHidden + '[' + field +'][]').val(value);
	return $input;
}

function renameInputHidden($temp, inputHidden, count) {
	$temp.find('input[type="hidden"]').each(function() {
		name = $(this).attr('name');
		$(this).attr('name', inputHidden+ '[' +(count-1)+ ']' +name );
	});
}