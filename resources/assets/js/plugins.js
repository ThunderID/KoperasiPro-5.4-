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
    $(document).pjax('a', '#pjax-container');

    //using nprogress to indicate loading
    $(document).on('pjax:start', function() { 
        NProgress.start();
    });
	$(document).on('pjax:end',   function() { 
        NProgress.done();  

        // call event form wizard();
        wizard();
    });

    // does current browser support PJAX
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 5000; // time in milliseconds
    }
});

/*
4. jQuery Pjax
Description : formating input masking
Usage and Documentation : https://github.com/RobinHerbots/Inputmask
*/
window.inputmask = require('./plugins/inputmask/inputmask');

/**
 * 5. JjQuery Step (for wizard form)
 * Description: form wizard
 * Usage & Documentation: http://www.jquery-steps.com/GettingStarted
 */
window.steps = require('./plugins/jquery-steps/jquery.steps');
$(document).ready(function() {
    // call event form wizard();
    wizard();
});

// window.$ = window.budi = 'haloo ';
// $.hi = window.hi = function(){
// 	alert(1);
// };

// $.budi = 'hihih';