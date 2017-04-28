<?php 

namespace TKredit\Survei\Models\Observers;

/**
 * Observer JaminanTanahBangunan
 *
 * Digunakan untuk Observe Model JaminanTanahBangunan_A in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class JaminanTanahBangunan_AObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param JaminanTanahBangunan_A $model
	* @return boolean
	*/
	public function saving($model)
	{
		unset($model->alamat);
	}
}