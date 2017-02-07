@extends('template.cms_template')

@push('content')
	'hi'
	@include('components.alertbox')

	
@endpush

@push('scripts')
	$( document ).ready(function() {
		setTimeout(
		  function() 
		  {
		  	new notify('halo','this is hello world');
		  }, 1000
		);	
	});

	setTimeout(
	  function() 
	  {
	    new notify('halo',"i'am sleep");
	    new notify('halo',"i'am awake");
	  }, 5000
	);	

	function notify(msg, title){
		toastr.options = {
			"closeButton" : true,
			"timeOut": "2000",
			"onclick": null
		};
		toastr.success(title, msg);
	}
@endpush
