<?php 
namespace Thunderlabid\Notification\Model\Observers;

use Thunderlabid\Notification\Model\Notification as Model; 

/**
 * Observer Notification
 *
 * Digunakan untuk Observe Model Notification in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class NotificationObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Notification $model
	* @return boolean
	*/
	public function creating($model)
	{
		if(empty($model->next_list))
		{
			//initial next list
			$model->next_list 	= 0;

			return true;
		}
	}

	/**
	* Update dokumen sebelumnya
	*
	* @param Notification $model
	* @return boolean
	*/
	public function updating($model)
	{
		//check perubahan status
		if($model->isDirty() && !isset($model->isDirty()['next_list']))
		{
			//save new data
			$new_dokumen 				= new Model;
			$new_dokumen->fill($model->getOriginal());
			$new_dokumen->next_list 	= $model->_id;
			$new_dokumen->save();
		}
		return true;
	}
}