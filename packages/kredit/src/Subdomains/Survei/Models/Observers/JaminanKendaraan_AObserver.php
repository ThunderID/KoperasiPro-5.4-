<?php 

namespace TKredit\Survei\Models\Observers;

/**
 * Observer JaminanTanahBangunan
 *
 * Digunakan untuk Observe Model JaminanKendaraan_A in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class JaminanKendaraan_AObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param JaminanKendaraan_A $model
	* @return boolean
	*/
	public function saving($model)
	{
		unset($model->alamat);
	}
}