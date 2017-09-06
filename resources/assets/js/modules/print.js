/**
 * Module Button Print
 * author: @agilma
 * description: event click button print
 * usage: 
 * 	- class: 'btn-print'
 * 	- data-url: url for get page element window
 */
window.printModule = {
 	button: function () {
 		$('.btn-print').on('click', function(e) {
 			e.preventDefault();
 			url = $(this).attr('data-url');
 			window.printModule.openWindow(url);
 		});
 	},
 	openWindow: function (url) {
 		// new window using url on button print
		newWindow = window.open(url, 'test', 'directories=no, titlebar=no, toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no');
		// window open dialog print
		newWindow.print();
		// newWindow.close();
 	},
 	init: function () {
 		window.printModule.button();
 	}
}
$(document).ready( function() {
	window.printModule.init();
});

$(document).on('click', '.trigger-print', function() {
	var target = $(this).closest('#area-print')[0];
	window.thunder.printElement.setElementPrint(target);
	window.thunder.printElement.print();
});