window.wizard = {
	validation: function () {
		define(["jquery-validation"], function( $ ) {
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
		});
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
	init: function () {
		// window.wizard.validation();
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
				form = $('.wizard');
				// // check previous tanpa memunculkan error
				// if (currentIndex > newIndex) {
					return true;
				// }

				// // check next apabila ada error di stage sebelumnya
				// if (currentIndex < newIndex) {
				// 	form.find(".body:eq(" + newIndex + ") label.error").remove();
				// 	form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
				// }

				// form.validate().settings.ignore = ":disabled,:hidden";
				// return form.valid();
			},
			onStepChanged: function (event, currentIndex, priorIndex) {
				window.wizard.resizeContent();
				window.setFocusModule.init();
				window.wizard.customButtonActions();
				window.wizard.disablePreviousButtonOnFirstStep(currentIndex);
				window.formInputMask.init();
				// window.select();
			}, 
			onInit: function (event, currentIndex) {
				window.wizard.resizeContent();
				window.setFocusModule.init();
				window.wizard.customButtonActions();
				window.wizard.disablePreviousButtonOnFirstStep(currentIndex);
				window.formInputMask.init();
				// $('.input-switch').bootstrapSwitch(); // active switch button
				// window.select();
			},
			onFinishing: function (event, currentIndex) {
				form = $('.wizard');
				// form.validate().settings.ignore = ":disabled,:hidden";
				// return form.valid();
				return form;
			},
			onFinished: function (event, currentIndex) {
				form = $('.wizard');
				form.submit();
			},
		});
		// .validate({
		// 	errorClass: 'has-error',
		// 	errorPlacement: function errorPlacement(error, element) { 
		// 		error.addClass('help-block');
		// 		parent = element.parent().parent();

		// 		// penempatan display message error validasi
		// 		// check input original tanpa add on 
		// 		if (parent.hasClass('row')) {
		// 			parent.parent().append(error);
		// 		// input yang ditambahkan add on
		// 		} else {
		// 			parent.parent().parent().append(error)
		// 		}
		// 		window.wizard.resizeContent();
		// 	},
		// 	highlight: function(element, errorClass) {
		// 		$(element).closest('fieldset.form-group').addClass(errorClass);
		// 	},
		// 	unhighlight: function(element, errorClass) {
		// 		$(element).closest('fieldset.form-group').removeClass(errorClass);
		// 	}
		// });
	}
}
$(document).ready(function() {
	window.wizard.init();
});