@if (isset($page_datas->credit['debitur']) && !empty($page_datas->credit['debitur']))
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="m-t-xs m-b-xs text-capitalize text-sm"><strong>debitur</strong></p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					Nama
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['nama']) && !is_null($page_datas->credit['debitur']['nama'])) ? $page_datas->credit['debitur']['nama'] : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					tanggal lahir
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['tanggal_lahir']) && !is_null($page_datas->credit['debitur']['tanggal_lahir'])) ? $page_datas->credit['debitur']['tanggal_lahir'] : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					jenis kelamin
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['jenis_kelamin']) && !is_null($page_datas->credit['debitur']['jenis_kelamin'])) ? $page_datas->credit['debitur']['jenis_kelamin'] : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					No. Telepon
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				@if (isset($page_datas->credit['debitur']['telepon']) && !is_null($page_datas->credit['debitur']['telepon']))
					<p class="text-capitalize text-light m-b-xs">
						{{ $page_datas->credit['debitur']['telepon'] }}
					</p>
				@else
					<p>Belum ada data disimpan.</p>
				@endif
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					alamat
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				@if (isset($page_datas->credit['debitur']['alamat']) && !empty($page_datas->credit['debitur']['alamat']))
					@foreach ($page_datas->credit['debitur']['alamat'] as $k => $v)
						<p class="text-capitalize text-light m-b-xs">
							{{ (isset($v['alamat']) && !is_null($v['alamat'])) ? $v['alamat'] : '' }}
							RT {{ (isset($v['rt']) ? $v['rt'] : '-') }} / RW {{ isset($v['rw']) ? $v['rw'] : '-' }} <br/>
							{{ (isset($v['desa']) && !is_null($v['desa'])) ? $v['desa'] : '' }} 
							{{ (isset($v['distrik']) && !is_null($v['distrik'])) ? $v['distrik'] .'<br/>' : '' }}
							{{ (isset($v['regensi']) && !is_null($v['regensi'])) ? $v['regensi'] : '' }} - 
							{{ (isset($v['provinsi']) && !is_null($v['provinsi'])) ? $v['provinsi'] : '' }} - 
							{{ (isset($v['negara']) && !is_null($v['negara'])) ? $v['negara'] : '' }}
						</p>
					@endforeach
				@else
					<p>Belum ada data disimpan.</p>
				@endif
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					pekerjaan
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['pekerjaan']) && !is_null($page_datas->credit['debitur']['pekerjaan'])) ? str_replace('_', ' ', $page_datas->credit['debitur']['pekerjaan']) : '-' }}
				</p>
			</div>
		</div>
		<div class="row m-b-none">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<p class="text-capitalize text-light m-b-xs">
					penghasilan bersih
				</p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<p class="text-capitalize text-light m-b-xs">
					{{ (isset($page_datas->credit['debitur']['penghasilan_bersih']) && !is_null($page_datas->credit['debitur']['penghasilan_bersih'])) ? $page_datas->credit['debitur']['penghasilan_bersih'] : '-' }}
				</p>
			</div>
		</div>
	</div>
@else
@endif