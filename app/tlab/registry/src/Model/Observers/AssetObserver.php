<?php 
namespace Thunderlabid\Registry\Model\Observers;

use Thunderlabid\Registry\Model\Asset as Model; 

/**
 * Observer Asset
 *
 * Digunakan untuk Observe Model Asset in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AssetObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Asset $model
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
	* @param Asset $model
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