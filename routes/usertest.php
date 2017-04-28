	$model 	= new Thunderlabid\Immigration\Infrastructures\Models\User;
	$model = $model->first();
$model->name = 'Cool Pipo';
$model->save();
	dd($model);
	$data	= [
		'email'		=> 'admin@ksp.id',
		'password'	=> 'admin',
		'name'		=> 'Adminnya KSP',
		'visas'		=> [
			'role'		=> 'Pimpinan',
			'office'	=> ['id' => 'ARTHAJAYABLITAR33', 'name' => 'Artha Jaya Blitar']
		]
	];

	$data	= [
			'user_id'	=> 'D1566AA8-44E4-485D-81B8-2524699C85C4',
			'role'		=> 'Surveyor',
			'office'	=> ['id' => 'MAJUPERKASAKEDIRI77', 'name' => 'Maju Perkasa Kediri']
	];

	$content 	= new Thunderlabid\Web\Services\UserService;
	dd($content->read(1));
