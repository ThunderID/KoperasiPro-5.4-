$(document).ready(function() {
	$('.tab-with-scroll').find('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		let target = $('#' + $(e.target).attr("href").split('#')[1]);
		let doc = $(e.target).closest('._window');
		window.thunder.scrollTo.do(target.parent().parent(), doc);
	});
});