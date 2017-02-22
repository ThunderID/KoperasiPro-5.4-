<?php

namespace Thunderlabid\Registry\Entity;

/////////////
// Entity  //
/////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Traits\IEntityTrait;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Owner;

////////////////////
// Aggregate root //
////////////////////
use Thunderlabid\Registry\Entity\Interfaces\IAggregateRoot;
use Thunderlabid\Registry\Entity\Traits\IAggregateRootTrait;

//////////////
// Utilitis //
//////////////
use Exception, Validator;
use \Illuminate\Support\Collection;
use Carbon\Carbon;

/**
 * Entity Personality
 *
 * Digunakan untuk menyimpan data Personality.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Personality implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $owner 
	 * @param string $residence
	 * @param string $workplace
	 * @param string $character
	 * @param string $lifestyle
	 * @param string $notes
	 */
	public function __construct($id = null, $owner = [], $residence = [], $workplace = [], $character = null, $lifestyle = null, $notes = [])
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
		$this->character 		= $character;
		$this->lifestyle 		= $lifestyle;

		#owner
		if ($owner instanceOf Owner)
		{
			$this->attributes['owner'] 	= $owner;
		}

		#residence
		$this->addResidence($residence);

		#workplace
		$this->addWorkplace($workplace);


		#notes
		if (isset($notes[0]))
		{
			foreach ($notes as $note_array)
			{
				$this->addNote($note_array);
			}
		}
		elseif(!empty($notes))
		{
			$this->addNote($notes);
		}
		else
		{
			$this->attributes['notes']	= [];
		}

		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
	}

	/**
	 * [addResidence description]
	 * @param array		$residence [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addResidence(array $residence)
	{
		$this->attributes['residence']['acquinted'] 	= $residence['acquinted'];
		
		return true;
	}

	/**
	 * [removeResidence description]
	 * @param  array 	$residence [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeResidence(array $residence)
	{
		unset($this->attributes['residence']);

		return false;
	}

	/**
	 * [addWorkplace description]
	 * @param array		$workplace [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addWorkplace(array $workplace)
	{
		$this->attributes['workplace']['acquinted'] 	= $workplace['acquinted'];
		
		return true;
	}

	/**
	 * [removeWorkplace description]
	 * @param  array 	$workplace [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeWorkplace(array $workplace)
	{
		unset($this->attributes['workplace']);

		return false;
	}

	/**
	 * mengubah attribute character
	 * @param string $character
	 */
 	public function changeCharacter($character)
	{
		$this->character 	= $character;
	}
	
	/**
	 * construct set attribute character
	 * @param string $character
	 */
	private function setCharacterAttribute($character)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['character' => (string) $character], ['character' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['character'] = $character;
	}

	/**
	 * mengubah attribute lifestyle
	 * @param string $lifestyle
	 */
 	public function changeLifestyle($lifestyle)
	{
		$this->lifestyle 	= $lifestyle;
	}
	
	/**
	 * construct set attribute lifestyle
	 * @param string $lifestyle
	 */
	private function setLifestyleAttribute($lifestyle)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['lifestyle' => (string) $lifestyle], ['lifestyle' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['lifestyle'] = $lifestyle;
	}


	/**
	 * [addNote description]
	 * @param array		$note [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addNote(array $note)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Credit is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('notes', $this->attributes) && is_array($this->attributes['notes']))
		{
			foreach ($this->attributes['notes'] as $key => $value)
			{
				if ($value->equals($note))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['notes'] = [];
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
			$this->attributes['notes'][] = $note;
			return true;
		}
	}

	/**
	 * [removeNote description]
	 * @param  array 	$note [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeNote(array $note)
	{
		$isInList 			= false;

		/////////////////////////////
		// Remove matching Credit //
		/////////////////////////////
		foreach ($this->attributes['notes'] as $key => $value)
		{
			if (
				($value['description']	=== $note['description']) 
			)
			{
				$isInList 	= true;
				unset($this->attributes['notes'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove Note. Not found");
			return false;
		}
	}
}