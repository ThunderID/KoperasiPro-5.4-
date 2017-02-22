<?php

namespace Thunderlabid\Notification\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Notification\Valueobject\Office as OfficeVO;

/////////////
// Entity  //
/////////////
use Thunderlabid\Notification\Entity\Interfaces\IEntity;
use Thunderlabid\Notification\Entity\Traits\IEntityTrait;

////////////////////
// Aggregate root //
////////////////////
use Thunderlabid\Notification\Entity\Interfaces\IAggregateRoot;
use Thunderlabid\Notification\Entity\Traits\IAggregateRootTrait;

//////////////
// Utilitis //
//////////////
use Exception, Validator;
use \Illuminate\Support\Collection;
use Carbon\Carbon;

/**
 * Entity Notification
 *
 * Digunakan untuk menyimpan data Notification.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Notification implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param array $description
	 * @param array $when
	 * @param array $link
	 * @param array $office
	 * @param sring $labels
	 */

	public function __construct($id = null, $description = null, $when = 'today', $link = null, $office = [], $labels = [])
	{
		if (!$id)
		{
			$this->attributes['id'] = $this->guid();
		}
		else
		{
			$this->attributes['id'] = $id;
		}

		////////////////////
		// Set attributes //
		////////////////////

		$this->description 			= $description;
		$this->when 				= Carbon::parse($when);
		$this->link 				= $link;

		#office
		if ($office instanceOf OfficeVO)
		{
			$this->addOffice($office);
		}

		#labels
		if (isset($labels[0]))
		{
			foreach ($labels as $label)
			{
				$this->addLabel($label);
			}
		}
		elseif(!empty($labels))
		{
			$this->addLabel($labels);
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * mengubah attribute Description
	 * @param string $description
	 */
 	public function changeDescription($description)
	{
		$this->Description 	= $description;
	}
	
	/**
	 * construct set attribute Description
	 * @param string $description
	 */
	private function setDescriptionAttribute($description)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['description' => $description], ['description' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['description'] = $description;
	}

	/**
	 * mengubah attribute when
	 * @param date $when
	 */
 	public function changeWhen($when)
	{
		$this->when 		= $when;
	}
	
	/**
	 * construct set attribute when
	 * @param date $when
	 */
	private function setWhenAttribute($when)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['when' => $when->format('Y-m-d')], ['when' => 'date_format:"Y-m-d"']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		/////////
		// Set //
		/////////
		$this->attributes['when'] = $when;
	}

	/**
	 * mengubah attribute link
	 * @param string $link
	 */
 	public function changeLink($link)
	{
		$this->link 		= $link;
	}
	
	/**
	 * construct set attribute link
	 * @param string $link
	 */
	private function setLinkAttribute($link)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['link' => $link], ['link' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['link'] = $link;
	}

	/**
	 * [addOffice description]
	 * @param OfficeVO $office 	[description]
	 * @return [boolean]    [true if success, exception if fail]
	 */
	public function addOffice(OfficeVO $office)
	{
		$this->attributes['office'] 	= $office;

		return true;
	}

	/**
	 * [removeOffice description]
	 * @param  OfficeVO $office [description]
	 * @return [boolean]    [true if success, exception if fail]
	 */
	public function removeOffice(OfficeVO $office)
	{
		unset($this->attributes['office']);

		return false;
	}

	/**
	 * [addLabel description]
	 * @param string		$label [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addLabel($label)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Notification is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('labels', $this->attributes) && is_array($this->attributes['labels']))
		{
			foreach ($this->attributes['labels'] as $key => $value)
			{
				if (str_is($value, $label))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['labels'] = [];
			$isInList = false;
		}

		////////////////////////////////////////////////////
		// If not in list then add, otherwise return fail //
		////////////////////////////////////////////////////
		if ($isInList)
		{
			return false;
		}
		else
		{
			$this->attributes['labels'][] = $label;
			return true;
		}
	}

	/**
	 * [removeLabel description]
	 * @param  string 	$label [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeLabel($label)
	{
		$isInList 			= false;

		/////////////////////////////
		// Remove matching Notification //
		/////////////////////////////
		foreach ($this->attributes['labels'] as $key => $value)
		{
			if (str_is($value, $label))
			{
				$isInList 	= true;
				unset($this->attributes['labels'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove label. Not found");
			return false;
		}
	}
}