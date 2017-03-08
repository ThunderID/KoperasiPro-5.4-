<?php

namespace Thunderlabid\Application\DataTransformers\Interfaces;

/**
 * Interface class untuk DataTransformers Application
 *
 * Digunakan untuk scaffold dari data transformer lain.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
interface IDataTransformer
{
	/**
	 * Write, translate DTO to Entity
	 * 
	 * @param mixed $param
	 */
	public function write($param);

	/**
	 * Read, translate Model to DTO
	 * 
	 * @param mixed $param
	 */
	public function read($param);
}
