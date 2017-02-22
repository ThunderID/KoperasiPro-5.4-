<?php

namespace Thunderlabid\Credit\Repository\Interfaces;

use Thunderlabid\Credit\Entity\Interfaces\IEntity;
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