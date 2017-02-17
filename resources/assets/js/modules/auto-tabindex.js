/**
 * Module auto tab-index
 * Description: modul untuk otomatis tab-index sesuai dgn urutannya,
 * dengan menambahkan class auto-tabindex
 */
$(function () {
	$('.auto-tabindex').attr('tabindex', function (index, attr) {
		return index + 1;
	});
});