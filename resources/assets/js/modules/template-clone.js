$(function (){
	i=1;
	$('.add').click( function (){
		template_add();
		$('.wizard .content').css({ height: $('.body.current').outerHeight() });
		i++;
		console.log(i);
	});
});

function template_add() {
	tmp = $('#template-clone');
	dest = $('#content-clone');

	tmp.clone();
	dest.append(tmp);
}