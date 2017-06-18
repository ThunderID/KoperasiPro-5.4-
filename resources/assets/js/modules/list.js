window.listModule = {
	listKoperasi: function () {
		options = {
			valueNames: ['name']
		};
		var listKoperasi = new List('list-koperasi', options);
	},
	init: function () {
		this.listKoperasi();
	}
}

$(document).ready(function () {
	window.listModule.init();
});