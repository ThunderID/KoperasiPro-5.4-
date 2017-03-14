<?php

namespace Thunderlabid\Credit\Models\Traits;

use Thunderlabid\Credit\Exceptions\IndirectModificationException;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait AggregateTrait 
{
	public function __set ($name, $value)
	{
		if(!str_is('*_at', strtolower($name)))
		{
			throw new IndirectModificationException($name, 1);
		}
	}
}