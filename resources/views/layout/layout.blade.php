<?php
	/*
	==============================================================
	Readme 
	==============================================================
	Preface
	--------------------------------------------------------------	
	This is the base low level page layout. 
	This contains only base resources of page and base layout 
	structure. You should not extend this templates to your view 
	directly, but you need to use from template instead.

	--------------------------------------------------------------
	Requirement Parameter
	--------------------------------------------------------------
	All requirement parameter are stored in single object variable 
	called $page_attributes. 

	Required parameter will be different based on your template 
	needs. Required parameter should be encapsulated by 
	$page_attributes object variables. 

	So, you can set parameter by writing your code like this on 
	your template: 
		
		$page_attributes->selected parameter => some value  		 


	You might wonder, where i can set those params, you have to 
	set it from controller.

	--------------------------------------------------------------
	Other Parameter
	--------------------------------------------------------------
	if you're need additional parameter for your template, use
	$page_datas object variables to encapsulate your parameter 
	that need to be send on your templates. 

	--------------------------------------------------------------
	Layout Yields  
	--------------------------------------------------------------	
	1. template
	description : this yield where you can work your templates 
				  here.

	2. template-modals
	description : this yield where you can work your templates 
				  modals here.

	3. template-scripts
	description : this yield where you can work your templates 
				  scripts here.				  
	*/
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>{{ Config::get('app.name') }}</title>

		<!-- Custom Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

		<style>
			@yield('template-styles')
		</style>	
	</head>
		<div class="wrapper">
			@yield('template')			
		</div>

		<!-- script -->
		<!-- common vendors -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

		<script src="{{ mix('js/app.js') }}"></script>
		
		<script type="text/javascript">
			@yield('template-scripts')
		</script>		
	</body>
</html>
