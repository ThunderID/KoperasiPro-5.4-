<?php
	/*
		===========================================================================
		Readme
		===========================================================================
		name 		: custom paginator
		author 		: Budi
		description : laravel length aware paginator with custom range optimized 
					  with base controller.
		===========================================================================
		Required parameter
		===========================================================================
		$page_attributes->paging : lengthawarepagniator object from base controller
		$range 	   : integer, how much page range will be displayed
		=========================================================================== 
		Customize
		===========================================================================
		If you dont want use base controller and want to use this widgets, you 
		should modify this following code

		1. change $page_attributes->paging (on init section) variable with your own
		   variable and pass value from the place where you include it.

		   example:

		   on this widget

		   $paging 		= $new_var->currentpage();
		   $total_page 	= $new_var->lastPage();

		   on your view
		   
		   @include('custom_paginator', [
		 		'new_variable' => your length aware paginator object,
		 		'range' => 5 (or your desired number)
		   ])
	*/

	// init
	$paging 		= $page_attributes->paging->currentpage();
	$total_page 	= $page_attributes->paging->lastPage();
?>

<ul class="pagination">
	<li class="page-item {{ $paging  == 1 ? 'disabled' : '' }}">
		<a class="page-link no-decoration {{ $paging  == 1 ? 'disabled' : '' }}" href="{{ $paging  == 1 ? '#' : route('survey.index', ['page' => ($paging -1)]) }}""><i class="fa fa-angle-left"></i></a>
	</li>
	<?php $paging  = (int)$paging ; ?>
	@if ($total_page <= ((int)$paging  + floor($range/2)))
		<?php
			$start = max(0,$paging  - ($range - ($total_page - ($paging ))));
		?>
		@for ($i = 1; $i <= min($range, $total_page-$start); $i++)
			<li class="page-item {{ $paging  == $start+$i ? 'active' : '' }} hidden-sm-up">
				<a href="{{ route('survey.index', ['page' => $start + $i])}}" class='page-link no-decoration'>
					{{ $start + $i }}
				</a>
			</li>
		@endfor					
	@else
		@for ($i = 0; $i < $range; $i++)
			@if (max(1, $paging  - 2) + $i <= $total_page)
				<li class="page-item {{ $paging  == max(1, $paging  - 2) + $i? 'active' : '' }} hidden-sm-up">
					<a href="{{ route('survey.index', ['page' => max(1, $paging  - 2) + $i])}}" class='page-link no-decoration'>
						{{ max(1, $paging  - 2) + $i }}
					</a>
				</li>
			@endif
		@endfor
	@endif					

	<li class="page-item {{ $paging  == $total_page ? 'disabled' : '' }}">
		<a class="page-link no-decoration" href="{{ $paging  == $total_page ? '#' : route('survey.index', ['page' => ($paging +1)]) }}""><i class="fa fa-angle-right"></i></a>
	</li>						
</ul>
