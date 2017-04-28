<?php 

namespace TKredit\Survei\Models\Observers;

/**
 * Observer Kredit
 *
 * Digunakan untuk Observe Model Kredit in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class SurveiObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Kredit $model
	* @return boolean
	*/
	public function saving($model)
	{
		unset($model->petugas);
	}
}