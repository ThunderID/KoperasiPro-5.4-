<div class="row m-l-none m-r-none m-b-md">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{-- panel data kreditur --}}
		<div data-panel="data-kreditur">
			@include ('pages.kredit.components.data.pengajuan.data_kreditur', [
				'edit' => true
			])
		</div>
		
		{{-- panel form kreditur --}}
		<div class="hidden" data-form="kreditur">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form kreditur</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form kreditur --}}
				@include ('pages.kredit.components.form.pengajuan.kreditur', [
					'param'	=> [
						'data'		=> isset($page_datas->credit['kreditur']) ? $page_datas->credit['kreditur'] : null,
					]
				])
				
				{{-- button action form kreditur --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kreditur" data-target="kreditur">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- panel form kontak --}}
		<div class="hidden" data-form="kontak">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form kontak</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form kontak kreditur --}}
				@include('components.helpers.forms.contact', [ 
					'param'		=> [
						'prefix'	=> 'kreditur',
						'data'		=> null,
					],
				])
				
				{{-- button action form kreditur --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kreditur" data-target="kontak">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- panel form alamat --}}
		<div class="hidden" data-form="alamat">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form alamat</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form alamat kreditur --}}
				@include('components.helpers.forms.address', [
					'param'		=> [
						'prefix'	=> 'kreditur',
						'data'		=> null,
					],
					'data'		=> [
						'provinsi' 	=> $page_datas->provinsi
					],
				])
				
				{{-- button action form kreditur --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kreditur" data-target="alamat">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>

		{{-- panel form pekerjaan --}}
		<div class="hidden" data-form="pekerjaan">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="text-uppercase">form pekerjaan</h4>
					<hr/>
				</div>
			</div>

			{!! Form::open(['url' => route('credit.update', ['id' => $page_datas->credit['id']]), 'class' => 'form no-enter', 'method' => 'PUT']) !!}
				{{-- content form pekerjaan kreditur --}}
				@include('pages.kredit.components.form.pengajuan.pekerjaan', [
					'param'		=> [
						'data'		=> null,
					],
					'data'		=> [
						'select_jenis_pekerjaan' 	=> $page_datas->select_jenis_pekerjaan
					],
				])
				
				{{-- button action form kreditur --}}
				<div class="clearfix">&nbsp;</div>
				<div class="text-right">
					<a href="#" class="btn btn-default" data-dismiss="panel" data-panel="data-kreditur" data-target="pekerjaan">Cancel</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>