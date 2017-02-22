<?php

namespace Thunderlabid\Registry\Valueobject\Interfaces;

interface IValueObject { 

	public function __get($property);
	public function equals($object);

}