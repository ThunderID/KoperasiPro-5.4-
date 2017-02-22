<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception;
use Carbon\Carbon;

class Work implements IValueObject { 

	use IValueObjectTrait;

	private $position;
	private $area;
	private $since;
	private $office;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $position   		[position]
	 * @param [string] $siup     		[siup]
	 * @param [string] $area 			[area]
	 * @param [string] $since 			[since]
	 */
	public function __construct($position = null, $area, $since, Office $office)
	{
		$this->position		= ucwords(strtolower($position));
		$this->area			= $area;
		$this->since		= Carbon::parse($since);
		$this->office 		= $office;
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($work)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$work instanceOf Work)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->position	=== $work->position) && 
				($this->area		=== $work->area) && 
				($this->since		=== $work->since) && 
				($this->office	 	=== $work->office) 
			)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
