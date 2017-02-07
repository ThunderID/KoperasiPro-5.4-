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
		  	notify('halo','this is hello world','success');
		  }, 1000
		);	
	});

	setTimeout(
	  function() 
	  {
	    notify('halo',"i'am sleep",'warning');
	    notify('halo',"i'am awake");
	  }, 5000
	);	

	setTimeout(
	  function() 
	  {
	    notify('halo',"you're wrong!",'error');
	  }, 15000
	);		
@endpush
