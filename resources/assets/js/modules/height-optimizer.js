/*
	author: budi
	description : measure perfect height for an element
	usage : use class _window and set data attribute : 
			- data-padd-top : this element padding from top (0), 
			  or set auto and this plugins will calculates it for you
			- data-padd-bottom : this element padding from bottom (0)
*/

// core
$.fn.optHeight = function(){
	// get this element distance from top
	if($(this).data( "padd-top" ) == 'auto'){
		padd_top = $(this).offset().top;
	}else{
		padd_top = $(this).data( "padd-top" );
	}

	// calculate optimum height for this element
	h = ($(window).height() - ( padd_top + $(this).data( "padd-bottom" )) );

	// apply optimum height
	$(this).css('height',h);

	// optional : apply nicescroll. you have include niceScroll plugin first.
    $(this).niceScroll();
};

// registering function to webpack. So, you can use call this function on another js function
window.optimizeHeight = function () {
	$('._window').each(function() {
		$(this).optHeight();
	});
};

// handle on resize event
$( window ).resize(function() {
	$('._window').each(function() {
		$(this).optHeight();
	});
});

// load event
$('._window').each(function() {
	$(this).optHeight();
});

