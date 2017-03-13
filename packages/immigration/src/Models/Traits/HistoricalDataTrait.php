<?php

namespace Thunderlabid\Immigration\Models\Traits;

use Thunderlabid\Immigration\Models\Scopes\HistoricalScope;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait HistoricalDataTrait {
 
	/**
	 * Boot the scope.
	 * 
	 * @return void
	 */
	public static function bootHistoricalDataTrait()
	{
		static::addGlobalScope(new HistoricalScope);
	}
	
	/**
	 * with log
	 *
	 * @return void
	 */			
	public function WithLog()
	{
		return with(new static)->newQueryWithoutScope(new HistoricalScope);
	}
}