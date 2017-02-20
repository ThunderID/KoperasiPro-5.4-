$(function (){
	$('.add').click( function (){
		template_add();
		// form wizard automatic height after add template
		window.resizeWizard();
	});
});

$(document).ready( function() {
	$('.content-clone').find('.add').trigger('click');
});

function template_add() {
	elClone = $('#template-clone');
	contentClone = $('#section-clone');

	temp = elClone.clone();
	contentClone.append(temp);
}