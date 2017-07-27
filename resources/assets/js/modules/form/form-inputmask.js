window.formInputMask = {
	money: function () {
		var money = new Inputmask({
			rightAlign: false,
			prefix: 'Rp ',
			groupSeparator: '.',
			alias: 'numeric',
			placeholder: '',
			autoGroup: !0,
			digit: 1,
			radixPoint: '',
			digitsOptional: !1,
			clearMaskOnLostFocus: !1
		});
		var selector = $('.mask-money');
		money.mask(selector);
	},
	moneyRight: function () {
		var moneyRight = new Inputmask({
			rightAlign: true,
			alias: 'numeric',
			prefix: 'Rp. ',
			radixPoint: '',
			placeholder: '',
			autoGroup: !0,
			digitsOptional: !1,
			groupSeparator: '.',
			groupSize: 3,
			repeat: 15
		});
		var selector = $('.mask-money-right');
		moneyRight.mask(selector);
	},
	birthDay: function () {
		var today = new Date();
		var year = today.getFullYear();

		var birthDate = new Inputmask({
			alias: 'dd/mm/yyyy',
			yearrange: {minyear: 1700, maxyear: (year - 10)}
		});
		var selector = $('.mask-birthdate');
		birthDate.mask(selector);
	},
	date: function () {
		var date = new Inputmask({
			alias: 'dd/mm/yyyy'
		});
		var selector = $('.mask-date');
		date.mask(selector);
	},
	year: function () {
		var year = new Inputmask({
			mask: "y",
			definitions: {
				y: {
					validator: "(19|20)\\d{2}",
					cardinality: 4,
					prevalidator: [{
						validator: "[12]",
						cardinality: 1,
					}, {
						validator: "(19|20)",
						cardinality: 2,
					}, {
						validator: "(19|20)\\d",
						cardinality: 3,
					}],
				},
			},
		});
		var selector = $('.mask-year');
		year.mask(selector);
	},
	idKTP: function () {
		var idKTP = new Inputmask('99-99-999999-9999');
		var selector = $('.mask-id-card');
		idKTP.mask(selector);
	},
	noTelp: function () {
		var noTelp = new Inputmask('9999 999 999 99');
		var selector = $('.mask-no-telp');
		var selector2 = $('.mask-no-handphone');
		noTelp.mask(selector);
		noTelp.mask(selector2);
	},
	noSertifikat: function () {
		var noSertifikat = new Inputmask('99999');
		var selector = $('.mask-no-sertifikat');
		noSertifikat.mask(selector);
	},
	rtRw: function () {
		var rtRw = new Inputmask('999');
		var selector = $('.mask-rt-rw');
		rtRw.mask(selector);
	},
	kodepos: function () {
		var kodepos = new Inputmask('99999');
		var selector = $('.mask-kodepos');
		kodepos.mask(selector);
	},
	numberSmall: function () {
		var numberSmall = new Inputmask(
			'numeric', {
				rightAlign: false,
				mask: '9{1,2}',
		});
		var selector = $('.mask-number-small');
		numberSmall.mask(selector);
	},
	numberDefault: function () {
		// var number = new Inputmask(
		// 	'numeric', {
		// 		rightAlign: false,
		// 		mask: "9{1,6}",
		// });
		var number = new Inputmask({
			alias: "decimal",
			allowMinus: false,
			autoGroup: true,
			digitsOptional: true,
			digits: 3,
			groupSeparator: '.',
			rightAlign: false,
			radixPoint: ',',
		});

		var selector = $('.mask-number');
		number.mask(selector);
	},
	numberWithDelimiter: function () {
		var numberWithDelimiter = new Inputmask({
			rightAlign: false,
			groupSeparator: ".",
			alias: "numeric",
			placeholder: "",
			autoGroup: 3,
			digit: 1,
			radixPoint: '',
			digitsOptional: !1,
			clearMaskOnLostFocus: !1
		});
		var selector = $('.mask-number-delimiter');
		numberWithDelimiter.mask(selector);
	},
	init: function () {
		this.money();
		this.moneyRight();
		this.date();
		this.birthDay();
		this.year();
		this.idKTP();
		this.noTelp();
		this.noSertifikat();
		this.rtRw();
		this.kodepos();
		this.numberSmall();
		this.numberDefault();
		this.numberWithDelimiter();
	}
}
$(document).ready(function(){
	window.formInputMask.init();
});