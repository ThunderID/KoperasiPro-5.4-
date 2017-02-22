<?php

namespace Thunderlabid\Credit\Model\Traits;

use Thunderlabid\Credit\Model\Scopes\LinkedListScope;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Credit
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
	 */			
	public function WithLog()
	{
		return with(new static)->newQueryWithoutScope(new LinkedListScope);
	}
}