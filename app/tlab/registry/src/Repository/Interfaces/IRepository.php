<?php

namespace Thunderlabid\Registry\Repository\Interfaces;

use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Jenssegers\Mongodb\Eloquent\Model;

interface IRepository { 

	////////////////////////////////
	// RETRIEVING FROM PERSISTENT //
	////////////////////////////////
	public static function all();
	public static function FindById($id);

	////////////////////////////////
	// STORING 				 	  //
	////////////////////////////////
	public static function store(IEntity $entity);

	////////////////////////////////
	// DELETING				 	  //
	////////////////////////////////
	public static function delete(IEntity $entity);

	////////////////////////////////
	// ADAPTOR				 	  //
	////////////////////////////////
	public static function ToEntity(Model $model);

	////////////////////////////////
	// METHOD				 	  //
	////////////////////////////////

}