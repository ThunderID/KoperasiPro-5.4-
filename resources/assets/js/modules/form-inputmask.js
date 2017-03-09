window.formInputMask = function () {
	// element class use plugin inputmask
	elMoney = $('.mask-money');
	elMoneyRight = $('.mask-money-right');
	elDateFormat = $('.mask-date-format');

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

	$('.mask-year').inputmask({
		alias: "yyyy",
		yearrange: { minyear: 1900, maxyear: 2099 }
	});

	$('.mask-id-card').inputmask('99-99-99-99-99-99-9999');
	$('.mask-no-telp').inputmask('9999 9999 9999');
	$('.mask-kodepos').inputmask('99999');
	$('.mask-number-xs').inputmask({ "mask": "9", "repeat": 3, "greedy": false });
	$('.mask-number-sm').inputmask({ "mask": "9", "repeat": 6, "greedy": false });
}