window.__validation = function () {
	// add rules validation class
	$.validator.addClassRules({
		required: {
			required: true,
		}, 
		email: {
			required: true,
			email: true
		},
		password: {
			required: true
		},
		number: {
			required: true,
			number: true
		},
		date: {
			required: true,
			dateIND: true
		}
	});

	// custom error message jQuery validation
	$.extend($.validator.messages, {
		required: "Inputan harus diisi",
		'email': "Silahkan inputkan dengan format email",
		'number': "Silahkan inputkan dengan format angka"
	});
	$.validator.addMethod(
		"dateIND", function (val, el){
			return val.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
		}, "Silahkan inputkan dengan format tanggal (dd/mm/yyyy)"
	);
}