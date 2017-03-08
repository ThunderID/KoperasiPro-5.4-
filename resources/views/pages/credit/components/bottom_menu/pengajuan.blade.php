<?php
	$step_order = [
		0 => 'pengajuan',
		1 => 'survei',
		2 => 'realisasi',
	];
	
	// this status
	$status_index = array_search('pengajuan', $step_order);
?>

<div class="row p-t-none p-b-none">
	<div class="col-md-12" style="background-color: white; height: 37px; border-top: 1px solid #e6e8e6;">

		<div class="row" style="overflow-x: hidden;">

			<div class="col-md-12 p-r-none p-l-none" style="left: 15px;">
				<div class="row" id="step">

				@if($status_index == 0)
					<div class="col-sm-4 p-r-none p-l-none text-center triangle active">
				@else
					<div class="col-sm-4 p-r-none p-l-none text-center triangle">
				@endif
						<a href="#" class="btn btn-block">
							1. Pengajuan
						</a>
					</div>

				@if($status_index < 1)
					<div class="col-sm-4 p-r-none p-l-none text-center triangle disabled">
						<a href="#" class="btn btn-block disabled">
				@elseif($status_index == 1)
					<div class="col-sm-4 p-r-none p-l-none text-center triangle active">
						<a href="#" class="btn btn-block">
				@else
					<div class="col-sm-4 p-r-none p-l-none text-center triangle">
						<a href="#" class="btn btn-block">
				@endif					
							2. Survei
						</a>			
					</div>

				@if($status_index < 2)
					<div class="col-sm-4 p-r-none p-l-none text-center triangle last disabled">
						<a href="#" class="btn btn-block disabled">
				@elseif($status_index == 2)
					<div class="col-sm-4 p-r-none p-l-none text-center triangle last active">
						<a href="#" class="btn btn-block">
				@endif						
							3. Realisasi
						</a>			
					</div>
				</div>
				
			</div>
		</div>

	</div>
</div>	