<?php 

namespace Thunderlabid\Notification\Web\Controllers;

use App\Http\Controllers\Controller;
use Notification, Input, Redirect;

class NotificationController extends Controller 
{
	/**
	 * lihat Notification
	 *
	 * @return Response
	 */
	public function index()
	{
		$notification        = Notification::allNotification();
		
		return view('notification::notification.index', compact('notification'));
	}

	/**
	 * lihat Notification tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$notification        = Notification::allNotification();
		
		$notification_detail = Notification::NotificationByID($id);
	
		return view('notification::notification.show', compact('notification', 'notification_detail'));
	}

	/**
	 * simpan Notification
	 *
	 * @return Response
	 */
	public function store()
	{
		$array  						=   [
				'id'					=> null,
				'description'			=> 'Pengajuan Pinjaman Baru oleh Chelsy Mooy',
				'when'					=> 'today',
				'link'					=> 'http://google.co.id',
				'office'				=> [
					'id'				=> '123445667879',
					'name'				=> 'ThunderlabIndonesia',
				],
				'labels'				=> ['pengajuan'],
			];

		$new_entity 					= Notification::buildThisNotification($array);

		Notification::saveThisNotification($new_entity);

		return Redirect::route('notification.index');
	}

}