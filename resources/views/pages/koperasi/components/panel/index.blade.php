
		@forelse($page_datas->users as $key => $value)
			<div class="row">
				<div class="col-sm-2 col-md-1">
					<i class="fa fa-user-circle-o fa-4x" aria-hidden="true"></i>
				</div>
				<div class="col-sm-10 col-md-11">
					<div class="row">
						<div class="col-xs-8">
							<h4>{{ $value['pengguna']['nama'] }}</h4>
							<div class="row m-b-xs">
								<div class="col-xs-5">
									<p>Last Login</p>
								</div>
								<div class="col-xs-7">
									<p>{{ $value['last_logged'] == '' ? '_' : $value['last_logged'] }}</p>
								</div>
							</div>
							<div class="row m-b-xs">
								<div class="col-xs-5">
									<p>Email</p>
								</div>
								<div class="col-xs-7">
									<p>{{ $value['pengguna']['email'] }}</p>
								</div>
							</div>
							<div class="row m-b-xs">
								<div class="col-xs-5">
									<p>Role</p>
								</div>
								<div class="col-xs-7">
									<p>{{ ucwords($value['role']) }}</p>
								</div>
							</div>
							<div class="row m-b-xs">
								<div class="col-xs-5">
									<p>Scope</p>
								</div>
								<div class="col-xs-7">
									@foreach($value['scopes'] as $keyScope => $scope)
										<span class="badge badge-primary">{{ ucwords(str_replace("_"," ", $scope['list'])) }}</span>
									@endforeach
								</div>
							</div>																					
						</div>
						<div class="col-xs-4 text-right p-r-none">
							<a href="#" class="btn" data-toggle="hidden" data-target="edit_{{$value['id']}}" data-panel="data-index" no-data-pjax>
								<i class="fa fa-pencil" aria-hidden="true"></i> Edit
							</a>				
							<a href="#" data-url="#" data-toggle="modal" data-target="#modal-delete" class="btn danger" data-url="{{ route('pengguna.destroy',['id' => $value['id']] ) }}">
								<i class="fa fa-trash" aria-hidden="true"></i> Hapus
							</a>										
						</div>
					</div>
				</div>
			</div>
			<hr/>
		@empty
			<div class="row">
				<div class="col-xs-12 text-center p-t-sm p-b-sm">
					Data Pengguna Belum Ada
				</div>
			</div>
		@endforelse