<?php
	/*
	===================================================================
	Readme
	===================================================================
	Component Name 	:  Modal Component
	Author  		:  Budi - budi-purnomo@outlook.com
	Description 	:  Basic dialog pop up modal based on 
					   bootstrap 3 modal. 
	Requirement 	:  This component only works on laravel 5.4 
	===================================================================
	Usage
	===================================================================
	to use this component, simply include this component using 
	component laravel blade direvtive, and passing your parameters.

	Example

	Include this component : 
		@component('components.modal', [parameters])
		    <>This is your alert html content<>
		@endcomponent

	Binding :
		<button type="button" class="btn btn-info btn-lg" 
		data-toggle="modal" data-target=Your modal id>
			Open Modal
		</button>	

	* you can bind it into any clickable object. This is only example.
	===================================================================
	Parameters
	===================================================================
	Pass this parameter inside an array. Some parameters are required 
	and some not. Make sure that you always pass required one.

	List of parameter:
	1. 	id
		required 	: yes
		value 		: string only (snake case format; ie : halo_modal)
		description : this will be the binding id of your modal. 
					  Use this as your data-target on your binding 
					  object.

	2. 	title
		required 	: yes
		value 		: string only (wysiwyg)
		description : this will be the modal title. 

	3. 	settings
		required 	: no
		description : this will contains some parameters inside.

		a.  closeable
		   	required 	: no
			value 		: boolean (true/false)
			description : is modal has close button or not
		b.  ok_only
		   	required 	: no
			value 		: boolean (true/false)
			description : is modal has cancel button or not
		c. 	overrides
			required 	: no
			description : this will contains some parameters inside.	
			
			c.1	action_ok
				required 	: no
				description : this parameter options override the 
							  default button action ok default.
				parameters  : 	
								title : string
								style : danger, default, primary, 
										warning, info, or success
								link  : url										

			c.2	action_cancel
				required 	: no
				description : this parameter options override the 
							  default button action cancel default.
				parameters  : 	
								title : string
								style : danger, default, primary, 
										warning, info, or success	
								link  : url										

		d.  hide_buttons
		   	required 	: no
			value 		: boolean (true/false)
			description : is modal has action button or not																							
	===================================================================
	*/

	// Functions
	// show button parameter
	$hide_buttons = false;
	if(isset($settings['hide_buttons'])){
		if($settings['hide_buttons'] == true){
			$hide_buttons = true;
		}
	}	

	// ok only
	$ok_only = false;
	if(isset($settings['ok_only'])){
		if($settings['ok_only'] == true){
			$ok_only = true;
		}
	}		
?>

<div id="{{ $id }}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">
					{{$title}}
				</h4>
			</div>
			<div class="modal-body">
				{{ $slot }}
			</div>

			@if($hide_buttons == false)
				<div class="modal-footer">
					@if($ok_only == false)
					<a type='button' class="btn btn-{{ isset($settings['overrides']['action_cancel']['style']) ? $settings['overrides']['action_cancel']['style'] : 'default' }}" data-dismiss='modal' 
					{{ isset($settings['overrides']['action_cancel']['link']) ? "href=''" : "no-data-pjax"}} >
						{{ isset($settings['overrides']['action_cancel']['title']) ? $settings['overrides']['action_cancel']['title'] : 'Cancel' }}
					</a>
					@endif
					<a type="button" class="btn btn-{{ isset($settings['overrides']['action_ok']['style']) ? $settings['overrides']['action_ok']['style'] : 'success' }}" {{ isset($settings['overrides']['action_ok']['link']) ? "href=''" : "no-data-pjax"}} >
						{{ isset($settings['overrides']['action_ok']['title']) ? $settings['overrides']['action_ok']['title'] : 'Ok' }}
					</a>
				</div>
			@endif
		</div>
	</div>
</div>