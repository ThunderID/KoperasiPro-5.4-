<div class="row m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div data-panel="data-ceklist-dokumen">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-capitalize m-b-sm text-lg">dokumen ceklist</p>
				</div>
			</div>

			@php $prev = '000_'; @endphp

			@forelse($page_datas->credit['dokumen_ceklist'] as $key => $value)

				@if(str_is('001*', $value['kode_dokumen']) && !str_is('001*', $prev))
					@php $prev = $value['kode_dokumen']; @endphp
					<p class="text-capitalize text-sm text-muted m-t-lg">
						Dokumen Nasabah
					</p>
				@elseif(str_is('002*', $value['kode_dokumen']) && !str_is('002*', $prev))
					@php $prev = $value['kode_dokumen']; @endphp
					<p class="text-capitalize text-sm text-muted m-t-lg">
						Dokumen Jaminan
					</p>
				@elseif(str_is('003*', $value['kode_dokumen']) && !str_is('003*', $prev))
					@php $prev = $value['kode_dokumen']; @endphp
					<p class="text-capitalize text-sm text-muted m-t-lg">
						Dokumen Realisasi
					</p>
				@endif

				<p class="text-light m-b-md">
					{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter form-inline m-t-md', 'method' => 'PUT']) !!}
						<label class="text-light m-b-md" style="display:block;padding-left:15px;text-indent:-15px;"> 
						<input type="checkbox" @if($value['is_added']) checked @endif name="ceklist[is_added]" value="{{$value['is_added']}}" style="width: 13px; height: 13px; padding: 0; margin:0; vertical-align: bottom; position: relative; top: -1px; *overflow: hidden;" onChange = "this.form.submit()">
							{{$value['judul']}}
						</label>
						{{Form::hidden('ceklist[id]', $value['id'])}}
					{{Form::close()}}
				</p>
			@empty
			@endforelse	

		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-l-none p-r-none">
		<hr>
	</div>
</div>
