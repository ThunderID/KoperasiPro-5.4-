/**
 * module template-clone
 * usage: 	use data-attribute
 * 			data-template-clone: 	untuk template dari clonenya
 * 			data-root-template: 	untuk root dari template dan yang akan ditaruh templatenya
 */
window.templateClone = {
	template: null,
	content: null,
	data: {},
	maxAdd: null,
	typeClone: null,
	buttonAdd : function () {
		$('.add').click(function(e) {
			e.preventDefault();

			window.templateClone.template 	= this.dataset.template;
			window.templateClone.content 	= this.dataset.content;
			window.templateClone.typeClone 	= this.dataset.typeclone;

			switch (window.templateClone.typeClone) {
				case 'table':
					var inputParsing 				= this.dataset.inputget;	// class input yang diparsing di form yang diclone
					var inputPrefix 				= this.dataset.inputprefix;
					var countAdd 					= window.templateClone.countItemClone($('#'+ window.templateClone.content));	// ambil total data yang sudah diclone
					window.templateClone.maxAdd 	= parseInt(this.dataset.availableadd);

					window.templateClone.fillableAdd(countAdd, window.templateClone.maxAdd); // check data template lbh dari 3
					// call function method add
					window.templateClone.methodAdd({button: $(this), input: inputParsing, prefix: inputPrefix}, 'table');

					$('body .modal').modal('hide');

					break;
				case 'form':
					window.templateClone.methodAdd({button: $(this)}, 'form');

					break;
				case 'form-with-value':
					// call function clone add 'form-with-value'
					// var item = parseInt(this.dataset.item);
					// window.templateClone.methodAdd({item: item}, 'form-with-value');

					break;
			}
		});
	},
	buttonRemove: function () {
		$('.remove').click(function (e) {
			e.preventDefault();

			window.templateClone.template = this.dataset.template;
			window.templateClone.content = this.dataset.content;
			window.templateClone.typeClone = this.dataset.typeclone;

			switch (window.templateClone.typeClone) {
				case 'table':
					window.templateClone.maxAdd = this.dataset.availableadd;
					window.templateClone.methodRemove($(this), 'table');
					break;
				case 'form':
					break;
				case 'form-with-value':
					window.templateClone.methodRemove($(this), 'form-with-value');
					break;
			}

		});
	},
	methodAdd: function (param, flag) {
		switch (flag) {
			case 'table':
				var template 	= window.templateClone.template;
				var content 	= window.templateClone.content;
				var data 		= window.templateClone.data;
				var typeClone 	= window.templateClone.typeClone;
				var maxAdd 		= window.templateClone.maxAdd;
				
				var templateItem 	= $('#'+ template);
				var contentItem 	= $('#'+ content);
				var cloneItem 		= templateItem.clone(true);
				
				
				cloneItem.removeClass('hidden').removeAttr('id').addClass('clone-row');
				window.templateClone.getData(param.input);

				if (data != null) {
					window.templateClone.setData(cloneItem, param.prefix);

					contentItem.find('#'+ template + '-default').addClass('hidden');

					cloneItem.find('.action').html('<a href="#" class="text-danger remove" data-typeclone="' +typeClone+ '"\
						 data-template="' +template+'" data-content="' +content+ '" data-availableadd="' +maxAdd+ '" data-inputprefix="' +param.prefix+ '"\
						 ><i class="fa fa-trash"></i> Hapus</a>');

					contentItem.append(cloneItem);
					window.templateClone.buttonRemove();
				}
				window.wizard.resizeContent();

				break;
			case 'form':
				var template 	= window.templateClone.template;
				var content 	= window.templateClone.content;

				var templateItem 	= $('#'+ template);
				var contentItem 	= $('#'+ content);
				var cloneItem 		= templateItem.clone(true); 

				// append template to section clone
				cloneItem.find('input').removeAttr('disabled');
				contentItem.append(cloneItem);

				param.button.addClass('hidden');

				break;
			case 'form-with-value':
				var template 	= window.templateClone.template;
				var content 	= window.templateClone.content;

				var templateItem 	= $('#'+ template);
				var contentItem 	= $('#'+ content);
				var cloneItem 		= templateItem.children().clone(true); 

				// get element qty, diskon, harga
				var qtyInput = cloneItem.find('.qty');
				var diskonInput = cloneItem.find('.diskon');
				var hargaInput = cloneItem.find('.harga');

				qtyInput.attr('data-flag', param.item + 1);
				diskonInput.attr('data-flag', param.item + 1);
				hargaInput.attr('data-flag', param.item + 1);

				// var qtyInput = cloneItem[0].getElementsByClassName('qty')[0];
				// var diskonInput = cloneItem[0].getElementsByClassName('diskon')[0];
				// var hargaInput = cloneItem[0].getElementsByClassName('harga')[0];

				// // add event listener keypress on qty, diskon, harga
				// this.initEventKeyPress(qtyInput, 'item' + (param.item + 1));
				// this.initEventKeyPress(diskonInput, 'item' + (param.item + 1));
				// this.initEventKeyPress(hargaInput, 'item' + (param.item + 1));

				cloneItem.addClass('item' + (param.item + 1));

				if (param.item != 0) {
					cloneItem.find('.add').addClass('hide');
					cloneItem.find('.remove').removeClass('hide');

					// replace icon button add to remove
					lengthButtonAdd = contentItem.find('.add').length;
					contentItem.find('.add').attr('data-item', param.item + 1);
					cloneItem.find('.remove').attr('data-item', param.item + 1);
					// contentItem.getElementsByClassName('add')[lengthButtonAdd - 1].dataset.item = item + 1;
					// cloneItem.getElementsByClassName('remove')[0].getElementsByTagName('i')[0].classList.add('fa-minus-circle');
					// cloneItem.getElementsByClassName('remove')[0].getElementsByTagName('i')[0].classList.remove('fa-plus-circle');

					// set total item in button add
					// lengthButtonAdd = contentItem.getElementsByClassName('add').length;
					// set total item in button remove
					// cloneItem.getElementsByClassName('remove')[0].dataset.item = item + 1;
				} else {
					cloneItem.find('.add').attr('data-item', param.item + 1);
					cloneItem.find('.remove').attr('data-item', param.item + 1);
					// cloneItem.getElementsByClassName('add')[0].dataset.item = item + 1;
					// cloneItem.getElementsByClassName('remove')[0].dataset.item = item + 1;
					// 
					// add event listener keypress on qty, diskon, harga
				}

					// window.templateClone.initEventKeyPress(qtyInput, 'item' + (param.item + 1));
					// window.templateClone.initEventKeyPress(diskonInput, 'item' + (param.item + 1));
					// window.templateClone.initEventKeyPress(hargaInput, 'item' + (param.item + 1));
				// var qtyInput = cloneItem.getElementsByClassName('qty')[0];
				// var diskonInput = cloneItem.getElementsByClassName('diskon')[0];
				// var hargaInput = cloneItem.getElementsByClassName('harga')[0];

				
				
				// add class item with jumlah item div clone item
				// cloneItem.classList.add('item' + (item + 1));

				// var buttonAdd = cloneItem.getElementsByClassName('add')[0];
				// var buttonRemove = cloneItem.getElementsByClassName('remove')[0];

				// add clone item to content item
				if (param.item != 0) {
					contentItem.prepend(cloneItem);
				} else {
					contentItem.append(cloneItem);
				}

				window.templateClone.buttonRemove();
				window.templateClone.initEventKeyPress();

				// function initEventKeyPress(elem, flag) {
				// 	elem.dataset.flag = flag;
				// 	// elem.onkeypress = function(e) {
				// 	// 	e.preventDefault();
				// 	// 	e.stopPropagation();
				// 	// 	// setTimeout(function() {
				// 	// 	// 	totalRow(flag);
				// 	// 	// }, 300);
				// 	// }
				// }

				break;
		}
	},
	methodRemove: function (elem, flag) {
		switch (flag) {
			/**
			 * tableRemove
			 * description: untuk menghapus row dari tabel
			 */
			case 'table':
				var template 	= window.templateClone.template;
				var content 	= window.templateClone.content;
				var maxAdd 		= window.templateClone.maxAdd;
			
				var templateItem 	= $('#'+ template);
				var contentItem 	= $('#'+ content);

				elem.parent().parent().remove();

				i = 1;
				contentItem.find('tr.clone-row').each( function() {
					$(this).find('.nomor').html(i);
					i++;
				});

				countData = window.templateClone.countItemClone(contentItem);	// ambil total data yang sudah diclone
				window.templateClone.fillableAdd(countData - 1, maxAdd);
				
				if (countData == 1) {
					contentItem.find('tr[id*="' +template+ '-default"]').removeClass('hidden');	// hidden data tabel default
				}

				window.wizard.resizeContent();
				break;
			case 'form':
				break;
			case 'form-with-value':
				var content = window.templateClone.content;

				var contentItem = $('#'+ content);
				var rowID 	= elem.data('item');
				
				contentItem.find('.item' + rowID).remove();
				window.templateClone.setSubTotal();
				// var contentItem = document.getElementById('content-item');
				// remove item 
				// contentItem.getElementsByClassName(id)[0].remove();

				break;
		}
	},
	countItemClone: function (content) {
		count = content.find('tr.clone-row').length + 1;
		return count;
	},
	/**
	 * element for table clone (fillableAdd)
	 * description: data yang boleh diclone
	 */
	fillableAdd: function (countItem, availableAdd) {
		if (countItem >= availableAdd) {
			$('#' + window.templateClone.content).parent().parent().find('.modal-add-jaminan').addClass('disabled');
			$('#' + window.templateClone.content).parent().parent().find('.modal-add-jaminan').siblings('.info-add').removeClass('hidden');
		} else {
			$('#' + window.templateClone.content).parent().parent().find('.modal-add-jaminan').removeClass('disabled');
			$('#' + window.templateClone.content).parent().parent().find('.modal-add-jaminan').siblings('.info-add').addClass('hidden');
		}
	},
	/**
	 * element for table clone (getData)
	 * description: get data dari modal add
	 */
	getData: function (elem) {
		$(elem).each( function(i, v) {
			var field = $(this).data('field');
			var value = $(this).val();

			window.templateClone.data[field] = value;
		});
	},
	/**
	 * element for table clone (setData)
	 * description: set data from modal to table and call function addinputhidden
	 */
	setData: function (itemClone, prefix) {
		data = window.templateClone.data;
		if (data !== null) {
			$.each(data, function(k, v) {
				if ((v !== '') & (v != null)) {
					value = v.replace('_', ' ').toLowerCase();
				} else {
					value = v;
				}
				itemClone.find('.' + k).html(value);
				inputHidden = window.templateClone.addInputHidden(prefix + '[' + k + '][]', v);
				itemClone.append(inputHidden);
			});
			
		}

		dataCount = window.templateClone.countItemClone($('#'+ window.templateClone.content));

		itemClone.find('.nomor').html(dataCount);
	},
	/**
	 * element for table clone (addInputHIdden)
	 * description: add input hidden in row per table
	 */
	addInputHidden: function(field, value) {
		$input = $('<input type="hidden" />');
		$input.attr('name', field).val(value);
		return $input;
	},
	initEventKeyPress: function(elem, flag) {
		// elem.onkeypress = function(e) {
		// 	setTimeout(function() {
		// 		window.templateClone.setTotal(flag);
		// 		window.templateClone.setSubTotal();
		// 	}, 300);
		// }
		$('.qty').on('keypress', function(e) {
			idRow = $(this).data('flag');
			setTimeout(function(){
				window.templateClone.setTotal('item' +idRow);
				window.templateClone.setSubTotal();
			}, 200);
		});
		$('.diskon').on('keypress', function(e) {
			idRow = $(this).data('flag');
			setTimeout(function(){
				window.templateClone.setTotal('item' +idRow);
				window.templateClone.setSubTotal();
			}, 200);
		});
		$('.harga').on('keypress', function(e) {
			idRow = $(this).data('flag');
			setTimeout(function(){
				window.templateClone.setTotal('item' +idRow);
				window.templateClone.setSubTotal();
			}, 200);
		});
	},
	setTotal: function (idRow) {
		var content = window.templateClone.content;
		var parent = $('#'+ content).find('.' + idRow);
		// var parent = document.getElementById('content-item').getElementsByClassName(rowID)[0];

		var qty = parseInt(parent.find('.qty').val());
		// var diskon = parent.find('.diskon').val().replace(/\./g, '').slice(3);
		var diskon = parseInt(parent.find('.diskon').val());
		// var harga = parent.find('.harga').val().replace(/\./g, '').slice(3);
		var harga = parseInt(parent.find('.harga').val());

		// get total row and parse to data attribute total in row 
		total = (harga - diskon)*qty;
		parent.attr('data-total', total);
		// parent.dataset.total = total;
	},
	setSubTotal: function () {
		var subTotalInput = $('.subtotal');
		var temp = 0;

		// get & set total all item
		$('.item').each(function(i, k) {
			total = parseInt($(k).attr('data-total'));
			temp += total;
		});

		subTotalInput.val(temp);
	},
	init: function () {
		this.buttonAdd();
	}


	// 	$template 		= $(this);
	// 	rootTemplate 	= $template.data('root-template');		// class root dari template clone
	// 	availableAdd 	= $template.data('available-add');		// jumlah yang boleh diclone
	// 	typeClone 		= $template.data('type-clone');			// type clone
	// 	templateClone 	= $template.data('template-clone');

	// 	switch (typeClone) {
	// 		case 'table':
	// 			var inputParsing 	= $template.data('input-get');	// class input yang diparsing di form yang diclone
	// 			var inputPrefix 	= $template.data('input-prefix');
	// 			var countAdd 		= countDataClone(rootTemplate);	// ambil total data yang sudah diclone

	// 			checkAvailableAdd(countAdd, availableAdd); // check data template lbh dari 3
	// 			rowAdd($template, inputParsing, inputPrefix);

	// 			$('body .modal').modal('hide');
	// 			break;
	// 		case 'form':
	// 			formAdd($template);
	// 			break;
	// 	}

	// 	$('.remove').on('click', function(e) {
	// 		e.preventDefault();

	// 		rootTemplate 	= $(this).data('root-template');
	// 		availableAdd 	= $(this).data('available-add');
	// 		typeClone 		= $(this).data('type-clone');

	// 		switch (typeClone) {
	// 			case 'table':
	// 				rowRemove($(this));
	// 		}
		// });
}
	
	// var buttonAdd = document.getElementsByClassName('add')[0];
// console.log(buttonAdd);
	// add event click listener to button add
	// if (typeof (buttonAdd) !== 'undefined') {
	// 	buttonAdd.addEventListener('click', function(e) {
			
	// 	});
	// 	// first call to clone template
	// 	buttonAdd.click();
	// }


	// function addFormWithValue (elem) {
	// 	var dataTemplate = elem.dataset.template;
	// 	var dataContent = elem.dataset.content;

	// 	var templateItem = document.getElementById(dataTemplate);
	// 	var contentItem = document.getElementById(dataContent);
	// 	var cloneItem = templateItem.firstElementChild.cloneNode(true);
	// 	var item = parseInt(elem.dataset.item);

	// 	if (item != 0) {
	// 		cloneItem.getElementsByClassName('add')[0].classList.add('hide');
	// 		cloneItem.getElementsByClassName('remove')[0].classList.remove('hide');

	// 		// replace icon button add to remove
	// 		cloneItem.getElementsByClassName('remove')[0].getElementsByTagName('i')[0].classList.add('fa-minus-circle');
	// 		cloneItem.getElementsByClassName('remove')[0].getElementsByTagName('i')[0].classList.remove('fa-plus-circle');

	// 		// set total item in button add
	// 		lengthButtonAdd = contentItem.getElementsByClassName('add').length;
	// 		contentItem.getElementsByClassName('add')[lengthButtonAdd - 1].dataset.item = item + 1;
	// 		// set total item in button remove
	// 		cloneItem.getElementsByClassName('remove')[0].dataset.item = item + 1;
	// 	} else {
	// 		cloneItem.getElementsByClassName('add')[0].dataset.item = item + 1;
	// 		cloneItem.getElementsByClassName('remove')[0].dataset.item = item + 1;
	// 	}

	// 	// get element qty, diskon, harga
	// 	var qtyInput = cloneItem.getElementsByClassName('qty')[0];
	// 	var diskonInput = cloneItem.getElementsByClassName('diskon')[0];
	// 	var hargaInput = cloneItem.getElementsByClassName('harga')[0];

	// 	// add event listener keypress on qty, diskon, harga
	// 	initEventKeyPress(qtyInput, 'item' + (item + 1));
	// 	initEventKeyPress(diskonInput, 'item' + (item + 1));
	// 	initEventKeyPress(hargaInput, 'item' + (item + 1));
		
	// 	// add class item with jumlah item div clone item
	// 	cloneItem.classList.add('item' + (item + 1));

	// 	var buttonAdd = cloneItem.getElementsByClassName('add')[0];
	// 	var buttonRemove = cloneItem.getElementsByClassName('remove')[0];

	// 	// add event click listener to button add
	// 	buttonAdd.addEventListener('click', function(e) {
	// 		e.preventDefault();
	// 		// call function clone add
	// 		addFormWithValue(this);
	// 	});

	// 	// add event click listener to button remove
	// 	buttonRemove.addEventListener('click', function(e) {
	// 		e.preventDefault();
	// 		// get row item id 
	// 		var itemID = this.dataset.item;
	// 		removeFormWithValue('item' + itemID);
	// 	});

	// 	window.formInputMask();

	// 	// add clone item to content item
	// 	if (item != 0) {
	// 		contentItem.prepend(cloneItem);
	// 	} else {
	// 		contentItem.append(cloneItem);
	// 	}

	// }

	// function removeFormWithValue (id) {
	// 	var contentItem = document.getElementById('content-item');
	// 	// remove item 
	// 	contentItem.getElementsByClassName(id)[0].remove();
	// }

	// function initEventKeyPress(elem, flag) {
	// 	elem.dataset.flag = flag;
	// 	elem.onkeypress = function(e) {
	// 		setTimeout(function() {
	// 			totalRow(flag);
	// 		}, 300);
	// 	}
	// }

	// function totalRow (rowID) {
	// 	var parent = document.getElementById('content-item').getElementsByClassName(rowID)[0];
	// 	var qty = parent.getElementsByClassName('qty')[0].value;
	// 	var diskon = parent.getElementsByClassName('diskon')[0].value.replace(/\./g, '').slice(3);
	// 	var harga = parent.getElementsByClassName('harga')[0].value.replace(/\./g, '').slice(3);

	// 	// get total row and parse to data attribute total in row 
	// 	total = (harga - diskon)*qty;
	// 	parent.dataset.total = total;

	// 	// call function sub total
	// 	subtotal();
	// }

	// function subtotal () {
	// 	var lengthContent = document.getElementById('content-item').getElementsByClassName('item').length;
	// 	var content = document.getElementById('content-item').getElementsByClassName('item');
	// 	var subTotal = document.getElementsByClassName('subtotal')[0];

	// 	// get & set total all item
	// 	var temp = 0;
	// 	for (var i=0; i<lengthContent; i++) {
	// 		temp += parseInt(content[i].dataset.total);
	// 	}

	// 	subTotal.value = temp;
	// }

/**
 * on document ready triger click btn 'add' for template clone & event pjax:end
 */
$(document).ready(function() {
	window.templateClone.init();
	$('.add.init-add-one').trigger('click');
});
/**
 * function template add
 * description: ...
 */
// function addForm(element) {
// 	temp = $('.' +templateClone).clone(true);

// 	// append template to section clone
// 	temp.find('input').removeAttr('disabled');
// 	$('.' +rootTemplate).append(temp);

// 	element.addClass('hidden');
// }
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
// function replaceQuickSelect(el) {
// 	el.find('.quick-select-clone').removeClass('quick-select-clone').addClass('quick-select');
// }

// cek data jumlah data clone
// function countDataClone(rootTemplate) {
// 	count = $('.' + rootTemplate).find('tr.clone-row').length + 1;
// 	return count;
// }

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

// function renameInputHidden($temp, inputHidden, count) {
// 	$temp.find('input[type="hidden"]').each(function() {
// 		name = $(this).attr('name');
// 		$(this).attr('name', inputHidden+ '[' +(count-1)+ ']' +name );
// 	});
// }