<?php 

namespace TTerritorial\Models\Observers;

/**
 * Observer Log
 *
 * Digunakan untuk Observe Model Log in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Territorial
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class LogObserver 
{
	/**
	*  Log
	*
	* @param Log $model
	* @return boolean
	*/
	public function deleting($model)
	{
		throw new Exception("Tidak dapat menghapus data log!", 1);
	}
}