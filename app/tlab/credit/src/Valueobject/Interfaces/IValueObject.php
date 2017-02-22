<?php

namespace Thunderlabid\Credit\Valueobject\Interfaces;

interface IValueObject { 

	public function __get($property);
	public function equals($object);

}