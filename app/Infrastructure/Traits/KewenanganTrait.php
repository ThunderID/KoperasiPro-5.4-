<?php

namespace App\Infrastructure\Traits;

use Exception, TAuth;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    TTagihan
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait KewenanganTrait {
 	 
 	private function legal($status, $limit = null)
	{
		$this->kewenangan_active_office 		= TAuth::activeOffice();
	
		foreach ((array)$this->kewenangan_active_office['scopes'] as $key => $value) 
		{
			switch (strtolower($status)) 
			{
				case 'survei':
					if($value['list']=='survei_kredit')
					{
						return true;
					}
					break;
				case 'menunggu_persetujuan':
					if($value['list']=='survei_kredit')
					{
						return true;
					}
					break;
				case 'menunggu_realisasi':
					if($value['list']=='setujui_kredit')
					{
						if(!is_null($this->kewenangan_active_office['limit_max']) && $limit > $this->kewenangan_active_office['limit_max'])
						{
							throw new Exception("Anda tidak memiliki wewenang untuk menyetujui kredit ini", 1);
						}
						return true;
					}
					break;
				case 'tolak':
					if($value['list']=='setujui_kredit')
					{
						if(!is_null($this->kewenangan_active_office['limit_max'] && $limit > $this->kewenangan_active_office['limit_max']))
						{
							throw new Exception("Anda tidak memiliki wewenang untuk menyetujui kredit ini", 1);
						}
						return true;
					}
					break;
				case 'realisasi':
					if($value['list']=='realisasi_kredit')
					{
						if(!is_null($this->kewenangan_active_office['limit_max'] && $limit > $this->kewenangan_active_office['limit_max']))
						{
							throw new Exception("Anda tidak memiliki wewenang untuk menyetujui kredit ini", 1);
						}
						return true;
					}
					break;
				case 'lunas':
					if($value['list']=='realisasi_kredit')
					{
						return true;
					}
					break;
			}
		}
		throw new Exception("Anda tidak memiliki wewenang untuk memproses kredit ini", 1);
	}
}