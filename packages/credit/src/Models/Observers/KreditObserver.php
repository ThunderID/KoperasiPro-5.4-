<?php 

namespace Thunderlabid\Credit\Models\Observers;

use Thunderlabid\Credit\Models\Kredit as Model; 

/**
 * Observer Kredit
 *
 * Digunakan untuk Observe Model Kredit in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class KreditObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Kredit $model
	* @return boolean
	*/
	public function saving($model)
	{
		$model->nomor_kredit 	= 'Manual';
	}
}