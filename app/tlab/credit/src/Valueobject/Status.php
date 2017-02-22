<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class Status implements IValueObject { 

	use IValueObjectTrait;

	private $status;
	private $description;
	private $date;
	private $author;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $status   			[status of the Status]
	 * @param [string] $description    		[description of the Status]
	 * @param [string] $date    			[date of the Status]
	 * @param Author $author    			[author of the Status]
	 */
	public function __construct($status, $description, $date, $author)
	{
		$this->status			= $status;
		$this->description		= ucwords(strtolower($description));
		$this->date				= Carbon::parse($date);
		$this->author			= $author;
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($status)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$status instanceOf Status)
		{
			throw new Exception('Parameter 1 must be status of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->status	 			=== $status->status) && 
				($this->description			=== $status->description) && 
				($this->date				=== $status->date) && 
				($this->author				=== $status->author)
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
