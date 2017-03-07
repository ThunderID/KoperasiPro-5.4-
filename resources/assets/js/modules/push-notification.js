s/*
	-------------------------------------------------------------------------------------------
	Readme
	-------------------------------------------------------------------------------------------
	author 		: budi
	description : this is push notification module using pre-configured toastr jQuery plugins
	usage		: notify(TITLE,MESSAGE,MESSAGE TYPE[can be: error, success, info, or warning]);
	requirement	: toastr(https://github.com/CodeSeven/toastr). Don't forget register toastr to 
				  global variable in your app.js file (or where you include this module). 
					
				  	window.$ = window.toastr = require(YOUR TOASTR PATH);
	
	note 		: by registering toastr as global, you can create your custom notification 
				  (beside this one) by call toastr.PROCEDURE (read toastr documentation). 

	-------------------------------------------------------------------------------------------
*/

// Auto check notification on document load
htmlNotify();

// Bind from html element 
window.htmlNotify = function(){
	$('#push-notification').find('.message').first(){
		notify($(this).text(),$(this).attr('data-title'),$(this).attr('data-type'));
		$(this).remove();
	}
}

// Manual binding
window.notify = function(msg, title, type){
	// config toastr
	toastr.options = {
		tapToDismiss: false,
		toastClass: 'toast',
		containerId: 'toast-container',
		debug: false,
		fadeIn: 300,
		fadeOut: 1000,
		extendedTimeOut: 0,
		iconClass: 'toast-info',
		positionClass: 'toast-top-right',
		timeOut: 0,
		titleClass: 'toast-title',
		messageClass: 'toast-message',	
		closeButton : true,
		preventDuplicates: true,
	};

	// check message type and display toastr notification
	switch(type) {
	    case 'success':
			toastr.success(title, msg);
	        break;
	    case 'error':
			toastr.error(title, msg);
	        break;	
	    case 'warning':
			toastr.warning(title, msg);
	        break;	
	    case 'info':
			toastr.info(title, msg);
	        break;		        		        	    
        default:
			toastr.info(title, msg);
	}
}