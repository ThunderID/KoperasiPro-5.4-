<?php 

namespace Thunderlabid\Registry\Infrastructures\Models\Observers;

use Thunderlabid\Registry\Infrastructures\Models\Finance as Model; 

/**
 * Observer Finance
 *
 * Digunakan untuk Observe Model Finance in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class FinanceObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Finance $model
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
	* @param Finance $model
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