<?php

namespace App\Web\Services;

//Factory
use Thunderlabid\Registry\Factory\RegistryFactory;

//Repository
use Thunderlabid\Registry\Repository\PersonRepository;

//Entity
use Thunderlabid\Registry\Entity\Person as PersonEntity;

/**
 * Kelas Person
 *
 * Digunakan untuk pengajuan Person.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Person 
{
	/**
	 * Menampilkan semua data Person
	 *
	 * @return array $build
	 */
	public static function build($array)
	{
		$data 	= new RegistryFactory();

		return $data->buildPersonFromArray($array);
	}

	/**
	 * Menampilkan semua data Person
	 *
	 * @return array $all
	 */
	public static function all()
	{
		$data 	= new PersonRepository();

		return $data->all();
	}

	/**
	 * Menampilkan semua data Person berdasarkan nama
	 *
	 * @return array $all
	 */
	public static function findByName($name)
	{
		$data 	= new PersonRepository();

		return $data->findByName($name);
	}
}