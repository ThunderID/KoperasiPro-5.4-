<?php 

namespace Thunderlabid\Immigration\Models\Observers;

use Thunderlabid\Immigration\Models\Koperasi_RO as Model; 

/**
 * Observer Koperasi_RO
 *
 * Digunakan untuk Observe Model Koperasi_RO in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Koperasi_ROObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Koperasi_RO $model
	* @return boolean
	*/
	public function saving($model)
	{
		return true;
	}
}