<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Ekonomi Makro</h4>
		<hr/>
	</div>
</div>

@if(empty($page_datas->credit->survey->macro))
<!-- No Data -->
<div class="row">
	<div class="col-sm-12">
		<p>Belum ada data disimpan. <a href="#ekonomi-makro" data-toggle="modal" data-target="#eco_macro" no-data-pjax> Tambahkan Sekarang </a></p>
	</div>
</div>
<div class="row clearfix">&nbsp;</div>
@else
<!-- With Data -->
<div class="row">

	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Prospek Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->prospect) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Persaingan Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->competition) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Perputaran Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->turn_over) }}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Jumlah Pelanggan Harian</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->daily_customer) }}
				</p>
			</div>
		</div>	

	</div>


	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Resiko Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->risk) }}
				</p>
			</div>
		</div>	
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Pengalaman Usaha</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->macro->experience) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Keterangan Lain</strong></p>
				<ul>
					@foreach($page_datas->credit->survey->macro->others as $other)
						<li>
							{{ ucfirst($other) }}
						</li>
					@endforeach
				</ul>
			</div>
		</div>		

	</div>
</div>
@endif