<?php 

namespace Thunderlabid\Immigration\Models\Observers;

use Thunderlabid\Immigration\Models\Visa_A as Model; 

/**
 * Observer Visa_A
 *
 * Digunakan untuk Observe Model Visa_A in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Visa_AObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Visa_A $model
	* @return boolean
	*/
	public function saving($model)
	{
		return true;
	}
}