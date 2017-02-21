window.optimizeHeight = function () {
	$('._window').each(function() {
		$(this).optHeight();
	});
};

$.fn.optHeight = function(){
	if($(this).data( "padd-top" ) == 'auto'){
		padd_top = $(this).offset().top;
	}else{
		padd_top = $(this).data( "padd-top" );
	}

	h = ($(window).height() - ( padd_top + $(this).data( "padd-bottom" )) );
	$(this).css('height',h);
    $(this).niceScroll();
};

$( window ).load(function() { 
	$('._window').each(function() {
		$(this).optHeight();
	});
});
$( window ).resize(function() {
	$('._window').each(function() {
		$(this).optHeight();
	});
});