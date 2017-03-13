<?php 

namespace Thunderlabid\Credit\Models\Observers;

/**
 * Observer Event
 *
 * Digunakan untuk Observe Model Event in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class IDObserver 
{
	/**
	* raise event
	*
	* @param Event $model
	* @return boolean
	*/
	public function creating($model)
	{
		$model->{$model->getKeyName()} = 'set_id';
	}
}