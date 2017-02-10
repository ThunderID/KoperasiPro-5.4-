window.wizard = function(){
	$('.wizard').steps({
		headerTag: 'h2',
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
			next: "SeLanjutnya",
			previous: "Sebelumnya",
			loading: "Loading ..."
		},
		/* Event */
		onStepChanged: function (event, currentIndex, priorIndex) {
			resizeJquerySteps();
		}, 
		onInit: function (event, currentIndex) {
			resizeJquerySteps();
		},
		onFinished: function (event, currentIndex) {
			$('.form').submit();
		},
	});
	function resizeJquerySteps() {
		$('.wizard .content').animate({ height: $('.body.current').outerHeight() }, "slow");
	}
}