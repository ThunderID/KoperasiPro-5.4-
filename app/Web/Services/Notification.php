<?php

namespace App\Web\Services;

//Repository
use Thunderlabid\Notification\Repository\NotificationRepository;

/**
 * Kelas Notification
 *
 * Digunakan untuk pengajuan Notification.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Notification 
{
	/**
	 * Menampilkan semua data Notification
	 *
	 * @return array $all
	 */
	public static function all()
	{
		$data 	= new NotificationRepository();

		return $data->all();
	}
}