<?php
/*
	==============================================================
	Readme 
	==============================================================
	Preface
	--------------------------------------------------------------
	This breadcrumb components that have been optimized for 
	Thunder CMS Layout. But you can still use this components and 
	modify some parameter to get this plugins works with your 
	needs. 
	--------------------------------------------------------------
	Parameter
	--------------------------------------------------------------
	This component using breadcrumb parameter that encapsulated
	within $page_attributes object variable. You can modify this
	by replacing $page_attributes->breadcrumb variable bellow 
	using your given breadcrumb data.

	--------------------------------------------------------------
	Data Structure
	--------------------------------------------------------------	
	Data structure that used in this component is describbed 
	bellow. 
	
		[
			Bread crumb label => Routing,
			Bread crumb label => Routing,
			and so on....
     	] 

	You can modify data structure to match your own, but 
	firstly you must make sure that given data to this component
	will match to your custom data structure.

*/
?>

<ol class="breadcrumb">
	<li>
		<a class="base" href="#">
			<i class="fa fa-dashboard"></i>
			Dashboard
		</a>
	</li>
	<?php 
		$ctr =	1;
	?>
	@foreach($page_attributes->breadcrumb as $b_label => $b_routing)
		@if($ctr == count($page_attributes->breadcrumb))
			<li class="active">
				<a>{{ ucwords($b_label) }}</a>
			</li>
		@else
			<li>
				<a href="{{ $b_routing }}">{{ ucwords($b_label) }}</a>
			</li>
		@endif
		<?php 
			$ctr += 1;
		?>
	@endforeach
</ol>
