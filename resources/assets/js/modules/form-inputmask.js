window.formInputMask = function () {
	// element class use plugin inputmask
	elMoney = $('.money');
	elMoneyRight = $('.money-right');
	elDateFormat = $('.date-format');

	// money indonesia standard
	elMoney.inputmask({ 
		rightAlign: false, 
		alias: 'numeric',
		prefix: 'IDR ',
		radixPoint: '',
		placeholder: '',
		autoGroup: !0,
		digitsOptional: !1,
		groupSeparator: '.',
		groupSize: 3,
		repeat: 15 }, 
	'unmaskedvalue');
	
	// money indonesia align right
	elMoneyRight.inputmask({
		rightAlign: true,
		alias: 'numeric',
		prefix: 'IDR ',
		radixPoint: '',
		placeholder: '',
		autoGroup: !0,
		digitsOptional: !1,
		groupSeparator: '.',
		groupSize: 3,
		repeat: 15 },
	'unmaskedvalue');

	// date format indonesia
	elDateFormat.inputmask({
		placeholder: "dd/mm/yyyy",
		alias: "dd/mm/yyyy"
	});

	$('.id-card').inputmask('99-99-99-99-99-99-9999');
	$('.no-hp').inputmask('9999 9999 9999');
}