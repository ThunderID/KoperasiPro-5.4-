window.wizard = function(){
	window.__validation();
	contentWizard = $('.wizard');
	contentWizard.steps({
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
			window.setFocus();
			window.customButtonActions();
			window.select();
		}, 
		onInit: function (event, currentIndex) {
			window.resizeWizard();
			window.setFocus();
			window.customButtonActions();
			// window.select();
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

window.setFocus = function () {
	$('.focus').focus();
}

window.customButtonActions = function() {
	$('.wizard .actions').find('a').addClass('btn');
	$('.wizard .actions').find('li[aria-disabled="true"]').children().removeClass('btn-primary').addClass('btn-default');
	$('.wizard .actions').find('li[aria-disabled="false"]').children().addClass('btn-primary');
}