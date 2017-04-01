/*
1. Toastr
Description : jQuery pop up notification plugins.
Usage and Documentation : https://github.com/CodeSeven/toastr#quick-start
*/
window.toastr = require('./plugins/toastr/toastr');

/*
2. nprogress
Description : jQuery plugins for displaying loading bar status (youtube style like)
Usage and Documentation : https://github.com/rstacruz/nprogress
Note : will be use on pjax
*/
window.NProgress = require('./plugins/nprogress/nprogress');
NProgress.configure({ 
	showSpinner: false,
	trickleSpeed: 300 
});

/*
3. jQuery Pjax
Description : request xhtml of page and replace page fragment using pushstate + ajax 
Usage and Documentation : https://github.com/defunkt/jquery-pjax
Note : 
- jquery version : 2 > your version > 3 
- need server side configuration. you should use pjaxmiddleware(laravel)
*/
window.pjax = require('./plugins/pjax/pjax');
$(document).ready(function(){
    $(document).pjax("a:not('[no-data-pjax]')", '#pjax-container');

	//using nprogress to indicate loading
	$(document).on('pjax:start', function() { 
		NProgress.start();

		//fix nice scroll bug: remove nice scroll
		$("div[class^='nicescroll-rails']").remove();
	});
	$(document).on('pjax:end',   function() { 
		NProgress.done();  
		
		// push notification
		htmlNotify();
		// call module enter to tabs
		formEntertoTabs();
		// call module form wizard();
		wizard();
		//optimize height
		optimizeHeight();
		// call module plugin print
		print();

		window.formEntertoTabs();
	});

    // Form Submit with get method
    $(document).on('submit', 'form[data-pjax]', function(event) {
      $.pjax.submit(event, '#pjax-container')
    })    

    // does current browser support PJAX
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 5000; // time in milliseconds
    }
});

/**
 * 4. JjQuery Step (for wizard form)
 * Description: form wizard
 * Usage & Documentation: http://www.jquery-steps.com/GettingStarted
 */
window.steps = require('./plugins/jquery-steps/jquery.steps');
$(document).ready(function() {
	wizard();
});

/**
 * 5. Jquery Validation & Additional
 * Description: jquery validation for form
 * Usage & Documentation: https://jqueryvalidation.org/
 */
window.validate = require('./plugins/jquery-validate/jquery.validate');

/**
 * 6. Jquery Cookies
 * Description: plugin jQuery browser cookies for save state jQuery steps
 * Usage & Documentation: https://github.com/js-cookie/js-cookie
 */
window.cookies = require('./plugins/jquery-cookie/js.cookie.js');
$(document).ready( function() {
	window.cookies();
});

/*
7. jQuery Inputmask
Description : formating input masking
Usage and Documentation : https://github.com/RobinHerbots/Inputmask
*/
window.inputmask = require('./plugins/inputmask/jquery.inputmask.bundle');
// class for inputmask
$(document).ready( function() {
	// call module form input mask 
	formInputMask();
});

/**
 * 8. jQuery quick selection
 * Description: plugin jQuery for select box with quick click
 * Usage & Documentation: http://quick-select.wstone.io/
 */
window.quickselect = require('./plugins/jquery-quick-selection/jquery.quickselect.min');

// /**
//  * 9. jQuery selectize
//  * Description: plugin jQuery customize select options 
//  * Usage & Documentation: http://selectize.github.io/selectize.js/
//  */
window.select2 = require('./plugins/select2/select2.min');
$(document).ready( function() {
	// window.select();
});

/**
 * 10. jQuery Nice Scroll
 * Description: plugin jQuery for better look of scrollbar
 * Usage & Documentation: http://nicescroll.areaaperta.com/
 */
window.nicescroll = require('./plugins/nicescroll/jquery.nicescroll.js');

/**
 * 11. jQuery plugin List-js
 * Description: plugin jQuery for list & search
 * Usage & Documentation: http://listjs.com/docs/
 */
window.list = require('./plugins/list-js/list.js');

/**
 * 12. jQuery plugin bootstrap-switch
 * Description: plugin jQuery for switch radion button
 * Usage & Documentation: https://github.com/Bttstrp/bootstrap-switch/
 */
window.bootstrapSwitch = require('./plugins/bootstrap-switch/bootstrap-switch');
$(document).ready( function() {
	$('.input-switch').bootstrapSwitch();
});