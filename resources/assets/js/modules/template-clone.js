$(function (){
	i=1;
	$('.add').click( function (){
		template_add();
		$('.wizard .content').css({ height: $('.body.current').outerHeight() });
		i++;
		console.log(i);
	});
});

$(document).ready( function() {
	$('.template-content').find('.add').trigger('click');
});

function template_add() {
	tmp = $('#template-clone');
	dest = $('#content-clone');

	tmp.clone();
	dest.append(tmp);
}