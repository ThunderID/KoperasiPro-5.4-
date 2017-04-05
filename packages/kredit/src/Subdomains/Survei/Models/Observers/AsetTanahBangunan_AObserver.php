<?php 

namespace TKredit\Survei\Models\Observers;

/**
 * Observer AsetTanahBangunan
 *
 * Digunakan untuk Observe Model AsetTanahBangunan_A in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AsetTanahBangunan_AObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param AsetTanahBangunan_A $model
	* @return boolean
	*/
	public function saving($model)
	{
		unset($model->alamat);
	}
}