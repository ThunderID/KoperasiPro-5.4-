/*
1. toastr
description : jquery pop up notification plugins.
usage and documentation : https://github.com/codeseven/toastr#quick-start
*/
window.toastr = require('./plugins/toastr/toastr');

/*
2. nprogress
description : jquery plugins for displaying loading bar status (youtube style like)
usage and documentation : https://github.com/rstacruz/nprogress
note : will be use on pjax
*/
window.nprogress = require('./plugins/nprogress/nprogress');
nprogress.configure({ 
	showspinner: false,
	tricklespeed: 300 
});

/*
3. jquery pjax
description : request xhtml of page and replace page fragment using pushstate + ajax 
usage and documentation : https://github.com/defunkt/jquery-pjax
note : 
- jquery version : 2 > your version > 3 
- need server side configuration. you should use pjaxmiddleware(laravel)
*/
window.pjax = require('./plugins/pjax/pjax');
$(document).ready(function(){
	$(document).pjax("a:not('[no-data-pjax]')", '#pjax-container');

	//using nprogress to indicate loading
	$(document).on('pjax:start', function() { 
		nprogress.start();
		// window.select();
		//fix nice scroll bug: remove nice scroll
		$("div[class^='nicescroll-rails']").remove();
	});
	$(document).on('pjax:end',   function() { 
		nprogress.done();  
		
		// push notification
		htmlnotify();
		// call module enter to tabs
		// call module form wizard();
		//optimize height
		optimizeheight();
		// call module plugin print
		// print();

		// plugin yang tidak jalan ketikan n-progress
		window.tabscrolling.init();
		// window.formentertotabs.init();
		window.noentertosubmit.init();
		window.forminputmask.init();
		window.wizard.init();
		window.selectdropdown.init();
		// $('.input-switch').bootstrapswitch();
		window.printmodule.init();
		
		// khusus module template clone
		window.templateclone.init();
		$('.add.init-add-one').trigger('click');
	});

	// form submit with get method
	$(document).on('submit', 'form[data-pjax]', function(event) {
		$.pjax.submit(event, '#pjax-container')
		$('.modal').modal('hide');
	})    

	// does current browser support pjax
	if ($.support.pjax) {
		$.pjax.defaults.timeout = 5000; // time in milliseconds
	}
});

/**
 * 4. jjquery step (for wizard form)
 * description: form wizard
 * usage & documentation: http://www.jquery-steps.com/gettingstarted
 */
window.steps = require('./plugins/jquery-steps/jquery.steps');

/**
 * 5. jquery validation & additional
 * description: jquery validation for form
 * usage & documentation: https://jqueryvalidation.org/
 */
window.validate = require('./plugins/jquery-validate/jquery.validate');

/**
 * 6. jquery cookies
 * description: plugin jquery browser cookies for save state jquery steps
 * usage & documentation: https://github.com/js-cookie/js-cookie
 */
// window.cookies = require('./plugins/jquery-cookie/js.cookie.js');
// $(document).ready( function() {
// 	window.cookies();
// });

/*
7. jquery inputmask
description : formating input masking
usage and documentation : https://github.com/robinherbots/inputmask
*/
window.inputmask = require('inputmask');

/**
 * 8. jquery quick selection
 * description: plugin jquery for select box with quick click
 * usage & documentation: http://quick-select.wstone.io/
 */
window.quickselect = require('./plugins/jquery-quick-selection/jquery.quickselect.min');

/**
 * 9. jquery selectize
 * description: plugin jquery customize select options 
 * usage & documentation: http://selectize.github.io/selectize.js/
 */
window.select2 = require('./plugins/select2/select2.min');

/**
 * 10. jquery nice scroll
 * description: plugin jquery for better look of scrollbar
 * usage & documentation: http://nicescroll.areaaperta.com/
 */
window.nicescroll = require('./plugins/nicescroll/jquery.nicescroll.js');

/**
 * 11. jquery plugin list-js
 * description: plugin jquery for list & search
 * usage & documentation: http://listjs.com/docs/
 */
window.list = require('./plugins/list-js/list.js');

/**
 * 12. jquery plugin bootstrap-switch
 * description: plugin jquery for switch radion button
 * usage & documentation: https://github.com/bttstrp/bootstrap-switch/
 */
window.bootstrapswitch = require('./plugins/bootstrap-switch/bootstrap-switch');
$(document).ready( function() {
	// $('.input-switch').bootstrapswitch();
});

// map
require('./plugins/map/jquery-gmaps-latlon-picker.js');

// thunderlab buundle plugin
require('./plugins/thunderlab/core.js');

// date range
require('./plugins/daterange/daterangepicker.js');
$('#daterange').daterangepicker({
	autoupdateinput: false,
	locale: {
		cancellabel: 'clear',
		format: 'dd/mm/yyyy',
		startdate: null,
		enddate: null,
		separator:  '/',
		applylabel: 'ok',
		cancellabel: 'hapus',	
		daysofweek: [
			"sen",
			"sel",
			"rab",
			"kam",
			"jum",
			"sab",
			"min"
		],
		monthnames: [
			"januari",
			"februari",
			"maret",
			"april",
			"mei",
			"juni",
			"juli",
			"agustus",
			"september",
			"oktober",
			"november",
			"desember"
		],
		firstday: 0
	}
});	