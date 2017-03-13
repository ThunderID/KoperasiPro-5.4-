<?php 

namespace Thunderlabid\Credit\Models\Observers;

use Thunderlabid\Credit\Models\Petugas_RO as Model; 

/**
 * Observer Petugas_RO
 *
 * Digunakan untuk Observe Model Petugas_RO in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Petugas_ROObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Petugas_RO $model
	* @return boolean
	*/
	public function saving($model)
	{
	}
}