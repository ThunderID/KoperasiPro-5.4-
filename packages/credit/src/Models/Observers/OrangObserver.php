<?php 

namespace Thunderlabid\Credit\Models\Observers;

use Thunderlabid\Credit\Models\Orang as Model; 

/**
 * Observer Orang
 *
 * Digunakan untuk Observe Model Orang in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class OrangObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Orang $model
	* @return boolean
	*/
	public function saving($model)
	{
	}
}