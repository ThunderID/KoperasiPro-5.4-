
	$data['pengajuan_kredit'] 	= 4000000; 
	$data['kemampuan_angsur'] 	= 750000; 
	$data['jangka_waktu'] 		= 6; 
	$data['tujuan_kredit'] 		= 'Modal Usaha'; 
	$data['kreditur'] 			= ['id' => '5F603985-B405-400B-B6FC-CB3594123C85', 'nama' => 'Chelsy Mooy']; 
	$data['penjamin'] 			= []; 

	$content 	= new Thunderlabid\Application\Services\CreditService;
	dd($content->pengajuan($data));


	$data['id']				= '5F603985-B405-400B-B6FC-CB3594123C85';
	$data['nik'] 			= '3573035108930004'; 
	$data['nama'] 			= 'Chelsy Mooy'; 
	$data['tempat_lahir'] 	= 'Dili'; 
	$data['tanggal_lahir'] 	= '1993-08-11'; 
	$data['jenis_kelamin'] 	= 'Perempuan'; 
	$data['agama'] 			= 'Kristen Protestan'; 
	$data['pendidikan_terakhir'] 	= 'S1'; 
	$data['status_perkawinan'] 		= 'Belum Kawin'; 
	$data['kewarganegaraan'] 		= 'WNI';
	$data['alamat'][] = [
						'jalan'		=> 'Puri Cempaka Putih II AS 86 RT. 002 RW. 006',
						'kota'		=> 'Malang',
						'provinsi'	=> 'Jawa Timur',
						'negara'	=> 'Indonesia',
						'kode_pos'	=> '65135',
	];

	$data['kontak'][] 		= ['telepon' => '089654562911'];
	$data['relasi']			= null;
	// $data['relasi'][] 	= ['id' => '58b667a1eb7aaf00060e1bec', 'nama' => 'Aaliyah', 'hubungan' => 'Sahabat'];
	$data['pekerjaan'][] 	= ['jenis' => 'Pegawai Swasta', 'jabatan' => 'Web Developer', 'sejak' => '2014-02-17'];
	$content 	= new Thunderlabid\Application\Services\PersonService;
	dd($content->read(1));
