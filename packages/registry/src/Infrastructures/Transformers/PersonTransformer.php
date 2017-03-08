<?php

namespace Thunderlabid\Registry\Infrastructures\Transformers;

use \Thunderlabid\Registry\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Registry\Infrastructures\Models\Person as Eloquent;
use \Thunderlabid\Registry\Entities\Person as Entity;
use \Thunderlabid\Registry\Factories\PersonFactory as Factory;

use Thunderlabid\Registry\Entities\Interfaces\IEntity;

use Exception;

class PersonTransformer implements ITransformer { 

	/**
	 * Convert Eloquent Model to Entity
	 * @param [Model] $model 
	 */
	public function ToEntity($model)
	{
		////////////////////////////////////////////
		// Check if model is instance of Eloquent //
		////////////////////////////////////////////
		if (!$model instanceOf Eloquent)
		{
			throw new Exception(json_encode(['Parameter 1 must be instance of Registry Eloquent']));
		}

		//////////////////
		// Build Entity //
		//////////////////
		return Factory::build($model->_id, $model->nik, $model->nama, $model->tempat_lahir, $model->tanggal_lahir, $model->jenis_kelamin, $model->agama, $model->pendidikan_terakhir, $model->status_perkawinan, $model->kewarganegaraan, $model->alamat, $model->kontak, $model->relasi, $model->pekerjaan, $model->kepribadian, $model->keuangan, $model->aset, $model->makro);
	}

	/**
	 * Convert Entity to Eloquent
	 * @param [Model] $model 
	 */
	public function ToEloquent($entity)
	{
		////////////////////////////////////
		// Check if parameter 1 is entity //
		////////////////////////////////////
		if (!$entity instanceOf Entity)
		{
			throw new Exception(json_encode(['Parameter 1 must be instance of Registry Entity']));
		}

		///////////////////
		// Make Eloquent //
		///////////////////
		$model = Eloquent::findornew($entity->id);

		$model->_id 					= $entity->id;
		$model->nik 					= $entity->nik;
		$model->nama 					= $entity->nama;
		$model->tempat_lahir 			= $entity->tempat_lahir;
		$model->tanggal_lahir 			= $entity->tanggal_lahir;
		$model->jenis_kelamin 			= $entity->jenis_kelamin;
		$model->agama 					= $entity->agama;
		$model->pendidikan_terakhir 	= $entity->pendidikan_terakhir;
		$model->status_perkawinan 		= $entity->status_perkawinan;
		$model->kewarganegaraan			= $entity->kewarganegaraan;
		$model->alamat					= $entity->alamat;
		$model->kontak					= $entity->kontak;
		$model->relasi					= $entity->relasi;
		$model->pekerjaan				= $entity->pekerjaan;

		return $model;
	}

}
