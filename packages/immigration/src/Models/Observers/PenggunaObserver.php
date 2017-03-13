<?php 

namespace Thunderlabid\Immigration\Models\Observers;

use Thunderlabid\Immigration\Models\Visa_A; 
use Thunderlabid\Immigration\Models\Koperasi_RO; 
use Thunderlabid\Immigration\Models\Pengguna as Model; 

/**
 * Observer Pengguna
 *
 * Digunakan untuk Observe Model Pengguna in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class PenggunaObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Pengguna $model
	* @return boolean
	*/
	public function saving($model)
	{
	}
}