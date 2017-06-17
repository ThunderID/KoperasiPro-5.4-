	$('#modal-koperasi').on('shown.bs.modal', function (e) {
		$(window).trigger('resize');
		console.log(1);
		$obj = $( "#modal-koperasi" ).gMapsLatLonPicker();

		$obj.params.strings.markerText = "Drag this Marker (example edit)";

		$obj.params.displayError = function(message) {
			console.log("MAPS ERROR: " + message); // instead of alert()
		};

		$obj.init( $(this) );		
	});