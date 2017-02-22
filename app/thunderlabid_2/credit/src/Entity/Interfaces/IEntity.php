<?php

namespace Thunderlabid\Credit\Entity\Interfaces;

interface IEntity { 

	//////////////
	// Accessor //
	//////////////
	public function __get($property);

	/////////////
	// Mutator //
	/////////////
	public function __set($property, $value);
	
	/////////////
	// Methods //
	/////////////
	public function isDirty();
	public function original();
	public function equals(IEntity $entity);
}