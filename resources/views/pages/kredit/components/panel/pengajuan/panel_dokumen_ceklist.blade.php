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

				
				{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => '', 'method' => 'PUT', 'data-pjax' => 'true', 'data-ajax-submit' => 'true']) !!}
					<div class="checkbox">
						<label class="text-light">
							<input type="checkbox" {{ ($value['is_added']) ? 'checked' : '' }} name="ceklist[is_added]" value="{{ $value['is_added'] }}" onChange="this.form.submit()" style="height: inherit">
							<p class="text-regular">{{ $value['judul'] }}</p>
							{{ Form::hidden('ceklist[id]', $value['id']) }}
						</label>
					</div>
				{!! Form::close() !!}
			@empty
			@endforelse	
		</div>
	</div>
</div>