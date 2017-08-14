/*
	=====================================================================
	Cloner
	=====================================================================
	Version		: 0.1
	Author 		: Budi
	Requirement : jQuery

	Notes:
	1. wrap your input file with div wrapper, with class selector 
		matching variable target_input_file_wrapper_class
*/

var cloner = function(){
/* --------------------------
	Setting & Parameter 
	-------------------------- */

	/* overrides core settings */
	/*
		1. Target Element Wrapper Class
		Description 	: html class selector that will be set up with cloner.
	*/	
	const target_el_wrapper_class = 'thunder-cloner';


	/*
		2. Target Element Template Class
		Description 	: html class selector that will be clone.
	*/	
	const target_template_class = 'thunder-cloner-template';

	/*
		3. Target Append Class
		Description 	: html class selector that will be appended.
	*/	
	const target_append_to = 'thunder-cloner-append';	

	/*
		4. Target Element Add Element
		Description 	: link/btn that trigger clone
	*/	
	const target_element_add_element = 'thunder-cloner-add';

	/*
		5. Target Element Remove Element
		Description 	: link/btn that trigger remove
	*/	
	const target_element_remove_element = 'thunder-cloner-remove';
	
	/*
		6. Cloned Data Class
		Description 	: Class encapsulates cloned data
	*/	
	const cloned_data_class = 'thunder-cloner-data';


	/* --------------------------
	Core Engine
	-------------------------- */	
	this.init = function() {
		var el = $( document.getElementsByClassName(target_el_wrapper_class) );

		// init
		el.each(function() {
			// ui init
			uiInit($(this));
		});

		//detect button clone

		$(document).on('click', '.' + target_element_add_element, function(e){
			var target = $(e.target).closest('.' + target_el_wrapper_class);
			copyElementTo(target.find('.' + target_append_to), target.find('.' + target_template_class));
		});

		//detect button remove
		$(document).on('click', '.' + target_element_remove_element, function(e){
			removeElement($(e.target).closest('.' + cloned_data_class));
		});

		return true;
	}

	this.clone = function(target, template){
		return copyElementTo(target, template);
	}

	this.remove = function(target){
		return removeElement(target);
	}

	var copyElementTo = function(target, template){
		var tmplt = $('<div class="' + cloned_data_class +'">' + template.html() + '</div>');
		target.append(tmplt);
		return tmplt;
	}

	var removeElement = function(target){
		try {
			target.remove();
		} catch(e) {
			console.log("%cError: cloner" + "\n" + "on: removeElement" + "\n" + "detail: " + e  , 'color: red;');
		}
		return true;
	}	

	/* --------------------------
	UI
	-------------------------- */
	var uiInit = function(el){
		el.find('.' + target_template_class).css('display','none');
	}
};

// This the interface
window.thunder.cloner = new cloner();