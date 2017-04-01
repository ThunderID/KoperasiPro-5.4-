<?php 

namespace Thunderlabid\Immigration\Models\Observers;

use Thunderlabid\Immigration\Models\Pengguna as Model; 

/**
 * Observer Event
 *
 * Digunakan untuk Observe Model Event in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class EventObserver 
{
	/**
	* raise event
	*
	* @param Event $model
	* @return boolean
	*/
	public function saved($model)
	{
		$model->raiseEvent();
	}
}