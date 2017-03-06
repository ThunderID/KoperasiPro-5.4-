/**
 * Module Button Print
 * author: @agilma
 * description: event click button print
 * usage: 
 * 	- class: 'btn-print'
 * 	- data-url: url for get page element window
 */
window.print = function () {
	// class btn-print
	$('.btn-print').click( function() {
		// get data url
		url = $(this).data('url');
		// call function openWindow
		openWindow(url);
	});
}

// function to open new window no address bar
function openWindow(url) {
	// new window using url on button print
	newWindow = window.open(url, 'test', 'directories=no, titlebar=no, toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no');
	// window open dialog print
	newWindow.print();
	// newWindow.close();
}

$(document).ready( function() {
	print();
});