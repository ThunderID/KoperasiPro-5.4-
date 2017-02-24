// window.choiceSelect = function () {
$.fn.choiceSelect = function(){	
	$(this).quickselect({
		buttonTag: 'a',
		activeButtonClass: 'btn-success active',
		breakOutAll: true,
		buttonClass: 'btn btn-default btn-sm auto-tabindex',
		wrapperClass: 'btn-group'
	});
}
$(document).ready( function() {
	$('.quick-select').choiceSelect();
});