/*
	=====================================================================
	ScrollTo
	=====================================================================
	Version		: 0.1
	Author 		: Budi
	Requirement : jQuery
*/

var scrollTo = function(){

	/* --------------------------
	Core Engine
	-------------------------- */	
	this.init = function() {
		return true;
	}

	this.do = function(target, doc, adjustment){
		// get target height
		if(!adjustment){
			adjustment = 0;
		}

		let h = $(target).position().top + adjustment;
		// $(doc).scrollTop(h);
		$(doc).animate({scrollTop:h}, 500, 'swing');
	}
};

// This the interface
window.thunder.scrollTo = new scrollTo();