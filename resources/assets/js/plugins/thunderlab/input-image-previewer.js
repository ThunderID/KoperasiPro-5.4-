/*
	Input File Previewer 
	Author: Budi
	Version: 0.1
	19-07-2017

	Documentation
	-------------

	Note: 
	- This plugin designs only for image.
	- Only One Image Supported this time

	I. Required HTML element
		-. an input file with 
			html class : file-preview-source,
			data attributes: 
				data-target-canvas-previewer -> reff to id of your image html element to preview selected file
				data-target-path-previewer -> reff to id of your label to display selected filename


	II. Done
*/

$(document).on('change', '.file-preview-source', function(e) {

	// need image preview?
	if($(this).data('target-canvas-previewer')){
	
		var reader = new FileReader();
		var target = $('#' + $(this).data('target-canvas-previewer'));
        
        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }

        reader.onloadend = function (e) {
		    // init form wizard window
	        window.wizard.resizeContent();
        }

        reader.readAsDataURL($(this).context.files[0]);
	}

	// need path preview?
	if($(this).data('target-path-previewer')){
		$('#' + $(this).data('target-path-previewer')).val($(this).val().replace(/C:\\fakepath\\/i, ''));
	}
});