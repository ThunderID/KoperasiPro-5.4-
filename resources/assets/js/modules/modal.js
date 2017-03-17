window.callModal =  function() {
	$('.modal').on('show.bs.modal', function(e) {
		// call plugin be use on modal
		window.quickSelect();
		window.select();
		window.formInputMask();
		$('.input-switch').bootstrapSwitch(); // active switch button

		modal = $(this);
		$(document).on('pjax:end', function() { 
			modal.modal('hide');
		});
	});
	$('.modal').on('shown.bs.modal', function(e) {
		
	});
}