window.wizard = function(){
	window.__validation();
	$('.wizard').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		transitionEffect: "slideLeft",
		stepsOrientation: "vertical",
		titleTemplate: '<span class="number">Step #index# :</span> #title#',
		actionContainerTag: 'div',
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
			form = $(this);
			// check previous tanpa memunculkan error
			if (currentIndex > newIndex) {
				return true;
			}

			// check next apabila ada error di stage sebelumnya
			if (currentIndex < newIndex) {
				form.find(".body:eq(" + newIndex + ") label.error").remove();
				form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}

			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex) {
			window.resizeWizard();
			window.setFocus();
			window.customButtonActions();
			window.disablePreviousButtonOnFirstStep(currentIndex);
		}, 
		onInit: function (event, currentIndex) {
			window.resizeWizard();
			window.setFocus();
			window.customButtonActions();
			window.disablePreviousButtonOnFirstStep(currentIndex);
			$('.input-switch').bootstrapSwitch(); // active switch button
			window.select();
		},
		onFinishing: function (event, currentIndex) {
			form = $(this);
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onFinished: function (event, currentIndex) {
			form = $(this);
			form.submit();
		},
	})
	.validate({
		errorClass: 'has-error',
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
		},
		highlight: function(element, errorClass) {
			$(element).closest('fieldset.form-group').addClass(errorClass);
		},
		unhighlight: function(element, errorClass) {
			$(element).closest('fieldset.form-group').removeClass(errorClass);
		}
	});
}

// fungsi otomatis resize content wizard
window.resizeWizard = function () {
	$('.wizard .content').css({ height: $('.body.current').outerHeight() });
}

window.setFocus = function () {
	$('.focus').focus();
}

window.customButtonActions = function() {
	$('.wizard .actions').find('a').addClass('btn');
	$('.wizard .actions').find('li[aria-disabled="true"]').children().removeClass('btn-primary');
	$('.wizard .actions').find('li[aria-disabled="false"]').children().addClass('btn-primary');
}

window.disablePreviousButtonOnFirstStep = function(index) {
	if (index == 0) {
		$(".wizard .actions a[href='#previous']").hide();
	} else {
		$(".wizard .actions a[href='#previous']").show();
	}
}