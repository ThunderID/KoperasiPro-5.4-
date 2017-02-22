<?php

namespace Thunderlabid\Notification\Service;

use Thunderlabid\Notification\Factory\NotificationFactory;
use Thunderlabid\Notification\Repository\NotificationRepository;

use Thunderlabid\Notification\Entity\Notification as NotificationEntity;

/**
 * Kelas Notification
 *
 * Digunakan untuk pengajuan Notification.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Notification 
{
    /**
     * Creates a new instance of Notification
	 * @param NotificationRepository $notification
	 * @param NotificationFactory $factory
     */
	public function __construct(NotificationRepository $notification, NotificationFactory $factory)
	{
		$this->repository	= $notification;
		$this->factory		= $factory;
	}

	/**
	 * Membuat object Notification baru dari data array
	 *
	 * @param array $array
	 * @return Notification $notification
	 */
	public function buildThisNotification($array)
	{
		return $this->factory->buildFromArray($array);
	}

	/**
	 * Menampilkan semua data Notification
	 *
	 * @return array $all
	 */
	public function allNotification()
	{
		return $this->repository->all();
	}

	/**
	 * Menampilkan data Notification tertentu
	 *
	 * @return Notification $notification
	 */
	public function NotificationByID($variable)
	{
		return $this->repository->findByID($variable);
	}

	/**
	 * Menyimpan data Notification
	 *
	 * @param Notification $notification
	 * @return Notification $notification
	 */
	public function saveThisNotification(NotificationEntity $notification)
	{
		if($this->repository->store($notification))
		{
			return $notification;
		}

		return $notification;
	}

	/**
	* Hapus data Notification
	*
	* @param string $variable
	* @return Notification $notification
	*/
	public function deleteThisNotification($variable)
	{
		return $this->repository->delete($variable);
	}
}