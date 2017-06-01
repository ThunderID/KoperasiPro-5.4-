window.wizard = {
	step: function () {
		
	},
	resizeContent: function () {
		$('.wizard').find('.content').css({ height: $('.body.current').outerHeight() });
	},
	customButtonActions: function () {
		$('.wizard').find('.actions').find('a').addClass('btn');
		$('.wizard').find('.actions').find('a[href="#previous"]').addClass('btn-success');
		$('.wizard').find('.actions').find('a[href="#next"], a[href="#finish"]').addClass('btn-primary');
	},
	disablePreviousButtonOnFirstStep: function (index) {
		if (index == 0) {
			$(".wizard .actions a[href='#previous']").hide();
		} else {
			$(".wizard .actions a[href='#previous']").show();
		}
	},
	validation: function () {
		window.__validation();
	},
	init: function () {
		this.validation();
		$('.wizard').steps({
			/* appreance */
			headerTag: 'h3',
			bodyTag: 'section',
			transitionEffect: "slideLeft",
			stepsOrientation: "vertical",
			actionContainerTag: 'div',
			/* templates */
			titleTemplate: '<span class="number">Step #index# :</span> #title#',
			/* labels */
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
				// // check previous tanpa memunculkan error
				if (currentIndex > newIndex) {
					return true;
				}

				// // check next apabila ada error di stage sebelumnya
				if (currentIndex < newIndex) {
					form.find(".body:eq(" + newIndex + ") label.error").remove();
					form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
				}

				form.validate().settings.ignore = ":disabled,:hidden";
				return form.valid();
			},
			onStepChanged: function (event, currentIndex, priorIndex) {
				window.wizard.resizeContent();
				window.setFocusModule.init();
				window.wizard.customButtonActions();
				window.wizard.disablePreviousButtonOnFirstStep(currentIndex);
				window.formInputMask();
				window.select();
			}, 
			onInit: function (event, currentIndex) {
				window.wizard.resizeContent();
				window.setFocusModule.init();
				window.wizard.customButtonActions();
				window.wizard.disablePreviousButtonOnFirstStep(currentIndex);
				window.formInputMask();
				// $('.input-switch').bootstrapSwitch(); // active switch button
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
				window.wizard.resizeContent();
			},
			highlight: function(element, errorClass) {
				$(element).closest('fieldset.form-group').addClass(errorClass);
			},
			unhighlight: function(element, errorClass) {
				$(element).closest('fieldset.form-group').removeClass(errorClass);
			}
		});
	}
}

$(document).ready(function (){
	window.wizard.init();
});

$(document).on('pjax:end',   function() { 
	window.wizard.init();
});