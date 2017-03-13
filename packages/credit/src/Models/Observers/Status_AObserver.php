<?php 

namespace Thunderlabid\Credit\Models\Observers;

use Thunderlabid\Credit\Models\Status_A as Model; 

/**
 * Observer Status_A
 *
 * Digunakan untuk Observe Model Status_A in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Status_AObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Status_A $model
	* @return boolean
	*/
	public function saving($model)
	{
	}
}