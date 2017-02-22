<?php

namespace Thunderlabid\Registry\Service;

use Thunderlabid\Registry\Factory\RegistryFactory;
use Thunderlabid\Registry\Repository\UserRepository;
use Thunderlabid\Registry\Repository\PersonRepository;
use Thunderlabid\Registry\Repository\AddressBookRepository;
use Thunderlabid\Registry\Repository\PersonalityRepository;

use Thunderlabid\Registry\Entity\User;
use Thunderlabid\Registry\Entity\Person;
use Thunderlabid\Registry\Entity\Personality;
use Thunderlabid\Registry\Entity\AddressBook;

/**
 * Kelas Registry
 *
 * Digunakan untuk pengajuan Registry.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Registry 
{
    /**
     * Creates a new instance of Registry
	 * @param PersonRepository $person
	 * @param AddressBookRepository $address
	 * @param UserRepository $user
	 * @param PersonalityRepository $personality
	 * @param RegistryFactory $factory
     */
	public function __construct(UserRepository $user, PersonRepository $person, AddressBookRepository $address, PersonalityRepository $personality, RegistryFactory $factory)
	{
		$this->user_repository 			= $user;
		$this->person_repository 		= $person;
		$this->address_repository	 	= $address;
		$this->personality_repository 	= $personality;
		$this->factory 					= $factory;
	}

	/**
	 * Membuat object person baru dari data array
	 *
	 * @param array $array
	 * @return Person $person
	 */
	public function buildThisPerson($array)
	{
		return $this->factory->buildPersonFromArray($array);
	}

	/**
	 * Membuat object address_book baru dari data array
	 *
	 * @param array $array
	 * @return AddressBook $address_book
	 */
	public function buildThisAddress($array)
	{
		return $this->factory->buildAddressBookFromArray($array);
	}

	/**
	 * Membuat object user baru dari data array
	 *
	 * @param array $array
	 * @return User $user
	 */
	public function buildThisUser($array)
	{
		return $this->factory->buildUserFromArray($array);
	}

	/**
	 * Membuat object personality baru dari data array
	 *
	 * @param array $array
	 * @return Personality $personality
	 */
	public function buildThisPersonality($array)
	{
		return $this->factory->buildPersonalityFromArray($array);
	}

	/**
	 * Menampilkan semua data person
	 *
	 * @return array $all
	 */
	public function allPerson()
	{
		return $this->person_repository->all();
	}

	/**
	 * Menampilkan semua data address
	 *
	 * @return array $all
	 */
	public function allAddress()
	{
		return $this->address_repository->all();
	}

	/**
	 * Menampilkan semua data user
	 *
	 * @return array $all
	 */
	public function allUser()
	{
		return $this->user_repository->all();
	}

	/**
	 * Menampilkan semua data personality
	 *
	 * @return array $all
	 */
	public function allPersonality()
	{
		return $this->personality_repository->all();
	}

	/**
	 * Menampilkan semua data person
	 *
	 * @return array $all
	 */
	public function PersonbyID($variable)
	{
		return $this->person_repository->findByID($variable);
	}

	/**
	 * Menampilkan all data address
	 *
	 * @return array $all
	 */
	public function AddressByID($variable)
	{
		return $this->address_repository->findByID($variable);
	}

	/**
	 * Menampilkan all data User
	 *
	 * @return array $all
	 */
	public function UserByID($variable)
	{
		return $this->user_repository->findByID($variable);
	}

	/**
	 * Menampilkan all data Personality
	 *
	 * @return array $all
	 */
	public function PersonalityByID($variable)
	{
		return $this->personality_repository->findByID($variable);
	}

	/**
	 * Menyimpan data person
	 *
	 * @param Person $person
	 * @return Person $person
	 */
	public function saveThisPerson(Person $person)
	{
		if($this->person_repository->store($person))
		{
			return $person;
		}

		return $person;
	}

	/**
	 * Menyimpan data address
	 *
	 * @param AddressBook $address
	 * @return AddressBook $address
	 */
	public function saveThisAddress(AddressBook $address)
	{
		if($this->address_repository->store($address))
		{
			return $address;
		}

		return $person;
	}

	/**
	 * Menyimpan data user
	 *
	 * @param User $user
	 * @return User $user
	 */
	public function saveThisuser(User $user)
	{
		if($this->user_repository->store($user))
		{
			return $user;
		}

		return $user;
	}

	/**
	 * Menyimpan data personality
	 *
	 * @param Personality $personality
	 * @return Personality $personality
	 */
	public function saveThisPersonality(Personality $personality)
	{
		if($this->personality_repository->store($personality))
		{
			return $personality;
		}

		return $user;
	}

	/**
	* Hapus data person
	*
	* @param string $variable
	* @return Person $person
	*/
	public function deleteThisPerson($variable)
	{
		return $this->person_repository->delete($variable);
	}

	/**
	* Hapus data address
	*
	* @param string $variable
	* @return address $address
	*/
	public function deleteThisAddress($variable)
	{
		return $this->address_repository->delete($variable);
	}

	/**
	* Hapus data user
	*
	* @param string $variable
	* @return user $user
	*/
	public function deleteThisUser($variable)
	{
		return $this->user_repository->delete($variable);
	}

	/**
	* Hapus data personality
	*
	* @param string $variable
	* @return Personality $personality
	*/
	public function deleteThisPersonality($variable)
	{
		return $this->personality_repository->delete($variable);
	}
}