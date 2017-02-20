window.wizard = function(){
	_validation();
	contentWizard = $('.wizard');
	contentWizard.steps({
		headerTag: 'h3',
		bodyTag: 'section',
		transitionEffect: "slideLeft",
		stepsOrientation: "vertical",
		titleTemplate: '<span class="number">Step #index# :</span> #title#',
		/* Labels */
		labels: {
			cancel: "Cancel",
			current: "current step:",
			pagination: "Pagination",
			finish: "Simpan",
			next: "Selanjutnya",
			previous: "Sebelumnya",
			loading: "Loading ..."
		},
		/* behavior */
		saveState: true,
		/* Event */
		onStepChanging: function (event, currentIndex, newIndex) {
			// check previous tanpa memunculkan error
			if (currentIndex > newIndex) {
				return true;
			}

			// check next apabila ada error di stage sebelumnya
			if (currentIndex < newIndex) {
				contentWizard.find(".body:eq(" + newIndex + ") label.error").remove();
				contentWizard.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}

			contentWizard.validate().settings.ignore = ":disabled,:hidden";
			return contentWizard.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex) {
			window.resizeWizard();
		}, 
		onInit: function (event, currentIndex) {
			window.resizeWizard();
		},
		onFinished: function (event, currentIndex) {
			$('.form').submit();
		},
	})
	.validate({
		errorPlacement: function errorPlacement(error, element) { 
			error.addClass('help-block');
			parent = element.parent().parent();

			// penempatan display message error validasi
			// check input original tanpa add on 
			if (parent.hasClass('row')) {
				parent.parent().append(error);
			// input yang ditambahkan add on
			} else {
				parent.parent().parent().append(error)
			}
			window.resizeWizard();
		}
	});
}

// fungsi otomatis resize content wizard
window.resizeWizard = function () {
	$('.wizard .content').css({ height: $('.body.current').outerHeight() });
}

function _validation()
{
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
		}, "Silahkan inputkan dengan format tanggal (dd/mm/yyyy)");

}