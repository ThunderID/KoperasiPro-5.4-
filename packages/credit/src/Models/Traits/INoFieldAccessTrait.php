<?php

namespace Thunderlabid\Credit\Models\Traits;

////////////////
// Exceptions //
////////////////
use InvalidArgumentException;
use Thunderlabid\Credit\Exceptions\FieldAccessForbiddenException;

trait INoFieldAccessTrait
{
	public function setAttribute($key, $value)
	{
		if ((!str_is(strtolower($key), $this->getUpdatedAtColumn())) && 
			(!str_is(strtolower($key), $this->getCreatedAtColumn())) && 
			((method_exists($this, 'getDeletedAtColumn') && !str_is(strtolower($key), $this->getDeletedAtColumn())) || !method_exists($this, 'getDeletedAtColumn'))
			)
		{
			throw new FieldAccessForbiddenException("Direct assignment to field '$key' is not allowed", 1);
		}
		else
		{
			parent::setAttribute($key, $value);
		}
	}
}