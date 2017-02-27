<div class="row">
	<div class="col-sm-12">
		<h4 class="text-uppercase">Data Kepribadian
			@if(!is_null($page_datas->credit->survey->personality->character))
			<span class="pull-right">
				<small>
				<a href="#data-kepribadian" data-toggle="modal" data-target="#data_kepribadian" no-data-pjax>
					<i class="fa fa-pencil" aria-hidden="true"></i>
					 Edit
				</a>
				</small>
			</span>
			@endif
		</h4>
		<hr/>
	</div>
</div>


@if(is_null($page_datas->credit->survey->personality->character))
<!-- no data -->
<div class="row">
	<div class="col-sm-12">
		<p>Belum ada data disimpan. <a href="#data-kepribadian" data-toggle="modal" data-target="#data_kepribadian" no-data-pjax> Tambahkan Sekarang </a></p>
	</div>
</div> 
<div class="row clearfix">&nbsp;</div>
<div class="row clearfix">&nbsp;</div>
@else
<!-- with data -->
<div class="row">
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Karakter</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->personality->character) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Lingkungan Tinggal</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->personality->residence['acquinted']) }}
				</p>
			</div>
		</div>
		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Lingkungan Kerja</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->personality->workplace['acquinted']) }}
				</p>
			</div>
		</div>

	</div>
	<div class="col-sm-6">

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Pola Hidup</strong></p>
				<p>
					{{ ucwords($page_datas->credit->survey->personality->lifestyle) }}
				</p>
			</div>
		</div>		

		<div class="row m-b-xl">
			<div class="col-sm-12">
				<p style="margin-bottom: 7px;"><strong>Keterangan Lain</strong></p>
				<ul>
					@foreach($page_datas->credit->survey->personality->notes as $note)
						<li>
							{{ ucfirst($note['description']) }}
						</li>
					@endforeach
				</ul>
			</div>
		</div>

	</div>
</div>
@endif