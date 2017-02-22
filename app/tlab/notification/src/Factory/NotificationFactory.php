<?php

namespace Thunderlabid\Notification\Factory;


/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Notification\Valueobject\Office as OfficeVO;

////////////
// Entity //
////////////
use Thunderlabid\Notification\Entity\Interfaces\IEntity;
use Thunderlabid\Notification\Entity\Notification;

/**
 * Factory Notification
 *
 * Digunakan untuk create new entity
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class NotificationFactory
{
	/**
	* Membuat object baru dari data array
	*
	* @return Notification $notification_entity
	*/
	public function buildFromArray($array)
	{
		//////////////////////
		//   Notification   //
		//////////////////////
		//office
		$office					= new OfficeVO($array['office']['id'], 
										$array['office']['name']
								);

		//////////////////////
		//   Notification   //
		//////////////////////
		$notification_entity 	= new Notification($array['id'], 
										$array['description'],
										$array['when'],
										$array['link'],
										$office,
										$array['labels']
								);

		/////////////////////////
		// Return Notification //
		/////////////////////////
		return $notification_entity;
	}
}