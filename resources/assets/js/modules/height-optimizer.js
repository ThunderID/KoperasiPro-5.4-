/*
	author: budi
	description : measure perfect height for an element
	usage : use class _window and set data attribute : 
			- data-padd-top : this element padding from top (0), 
			  or set auto and this plugins will calculates it for you
			- data-padd-bottom : this element padding from bottom (0)
*/

// core
$.fn.optHeight = function(on_mobile){
	//init
	var stop_at_screen_width = 0;

	// responsive
	if(on_mobile == null || on_mobile == true){
		stop_at_screen_width = 0;
	}else{
		stop_at_screen_width = 768;
	}

	if($( window ).width() >= stop_at_screen_width){

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
	    // $(this).niceScroll();
	    $(this).css('overflow-y', 'scroll');

	}else{

		// apply optimum height
		$(this).css('height','auto');

	    $(this).css('overflow-y', 'hidden');

	}

};

// registering function to webpack. So, you can use call this function on another js function
window.optimizeHeight = function () {
	$('._window').each(function() {
		$(this).optHeight($(this).attr('on-mobile'));
	});
};

// handle on resize event
$( window ).resize(function() {
	$('._window').each(function() {
		$(this).optHeight($(this).attr('on-mobile'));
	});
});

// load event
$('._window').each(function() {
	$(this).optHeight($(this).attr('on-mobile'));
});

