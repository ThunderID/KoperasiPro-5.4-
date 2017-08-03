/*
	=====================================================================
	imagePreviewer
	=====================================================================
	Version		: 0.1
	Author 		: Budi
	Requirement : jQuery

	Notes:
	1. previewer and path must be inside same "form-group" parent wrapper class 
*/

var imagePreviewer = function(){
	/* --------------------------
	Setting & Parameter 
	-------------------------- */
	// note: 1 draw only 

	/* overrides core settings */
	/*
		1. Target Input Class
		Description 	: target input file that will be observed for event change
	*/	
	const target_input_class = 'thunder-imagePreview-source';

	/*
		2. Target Canvas Class
		Description 	: target canvas that will be drawed as previewer
	*/	
	const target_canvas_class = 'thunder-imagePreview-canvas';	

	/*
		3. Target Path Class
		Description 	: target path that will be drawed as path previewer
	*/	
	const target_path_class = 'thunder-imagePreview-path';	

	/* --------------------------
	Core Engine
	-------------------------- */	
	// interfaces
	this.init = function() {	
		$(document).on('change', '.' + target_input_class, function(e) {
			// need image preview?
			if($(e.target).hasClass(target_input_class)){
				
				// handling on empty
				if($(e.target).val() == ''){
					$(e.target).closest('.form-group').find('.' + target_canvas_class).attr('src', $(e.target).attr('data-default'));
					$(e.target).closest('.form-group').find('.' + target_path_class).val('');
					return true;
				}

				$(e.target).attr('data-default', $(e.target).closest('.form-group').find('.' + target_canvas_class).attr('src'));

				// not empty? continue next
				drawImage($(this).prop('files')[0], $(e.target).closest('.form-group').find('.' + target_canvas_class));
				drawPath($(this));
			}
		});
	}

	this.preview = function(file, target){
		return drawImage(file, target);
	}

	/* --------------------------
	Modules
	-------------------------- */	


	var drawImage = function(file, target){

		// validate on multply
		if(file.constructor === Array){
			return false;
		}

		// draw image
		var reader = new FileReader();

		reader.onload = function (file) {
			target.attr('src', file.target.result);
		}

		reader.readAsDataURL(file);

		return reader;	
	}

	var drawPath = function (el){
		if(el.val()){
			el.closest('.form-group').find('.' + target_path_class).val(el.val().replace(/C:\\fakepath\\/i, ''));
		}
	}
}

// This the interface
window.thunder.imagePreviewer = new imagePreviewer();