<?php

namespace Thunderlabid\Credit\Models\Traits;

use Thunderlabid\Credit\Models\Observers\LogObserver;

/**
 * Trait untuk data log
 *
 * Digunakan untuk semua tabel yang berfungsi sebagai table log (no delete!)
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait LogTrait 
{
	public static function bootLogTrait()
	{
        static::observe(new LogObserver());
	}
}