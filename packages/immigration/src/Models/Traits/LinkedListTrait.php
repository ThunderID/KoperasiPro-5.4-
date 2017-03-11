<?php

namespace Thunderlabid\Immigration\Models\Traits;

use Thunderlabid\Immigration\Models\Scopes\LinkedListScope;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait LinkedListTrait {
 
	/**
	 * Boot the scope.
	 * 
	 * @return void
	 */
	public static function bootLinkedListTrait()
	{
		static::addGlobalScope(new LinkedListScope);
	}
	
	/**
	 * with log
	 *
	 * @return void
	 */			
	public function WithLog()
	{
		return with(new static)->newQueryWithoutScope(new LinkedListScope);
	}
}