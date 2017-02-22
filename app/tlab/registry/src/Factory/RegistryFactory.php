<?php

namespace Thunderlabid\Registry\Factory;


/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Work;
use Thunderlabid\Registry\Valueobject\Relative;
use Thunderlabid\Registry\Valueobject\Reference;
use Thunderlabid\Registry\Valueobject\Address;
use Thunderlabid\Registry\Valueobject\LatLng;

use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\Office;
use Thunderlabid\Registry\Valueobject\Access;
use Thunderlabid\Registry\Valueobject\Phone;

use Thunderlabid\Registry\Valueobject\Finance as FinanceVO;
use Thunderlabid\Registry\Valueobject\AssetHouse as AssetHouseVO;
use Thunderlabid\Registry\Valueobject\AssetCompany as AssetCompanyVO;
use Thunderlabid\Registry\Valueobject\AssetVehicle as AssetVehicleVO;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\User;
use Thunderlabid\Registry\Entity\Person;
use Thunderlabid\Registry\Entity\Personality;
use Thunderlabid\Registry\Entity\AddressBook;
use Thunderlabid\Registry\Entity\Asset;
use Thunderlabid\Registry\Entity\Finance;

/**
 * Factory Registry
 *
 * Digunakan untuk create new entity
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class RegistryFactory
{
	/**
	* Membuat object baru dari data array
	*
	* @return Person $person_entity
	*/
	public function buildPersonFromArray($array)
	{
		////////////////
		//   Person   //
		////////////////

		//phones
		$phones 				= [];
		foreach ((array)$array['phones'] as $phone)
		{
			$phones[] 			= new Phone($phone['number']);
		}

		//works
		$works 		= [];
		foreach ((array)$array['works'] as $work)
		{
			$office 		= new Office($work['office']['id'], $work['office']['name']);
			//work
			$works[]		= new Work($work['position'], 
									$work['area'], 
									$work['since'],
									$office
							);
		}

		//relatives
		$relatives 			= [];
		foreach ((array)$array['relatives'] as $relative)
		{
			//relative
			$relatives[]	= new Relative($relative['relation'], 
										$relative['id'], 
										$relative['name']
							);
		}

		////////////
		// Person //
		////////////
		$person_entity 		= new Person($array['id'], 
										$array['nik'],
										$array['name'],
										$array['place_of_birth'],
										$array['date_of_birth'],
										$array['gender'],
										$array['religion'],
										$array['highest_education'],
										$array['marital_status'],
										$phones,
										$works,
										$relatives
							);

		///////////////////
		// Return Person //
		///////////////////
		return $person_entity;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return User $user_entity
	*/
	public function buildUserFromArray($array)
	{
		////////////////
		//    User    //
		////////////////
		//owner
		$owner			= new Owner($array['owner']['id'], 
								$array['owner']['name'] 
						);

		//accesses
		$accesses 		= [];
		foreach ($array['accesses'] as $access)
		{
			//office
			$office 	= new Office($access['office']['id'], $access['office']['name']);

			$accesses[]	= new Access($access['role'], 
									$office 
						);
		}

		////////////
		// User //
		////////////
		$user_entity 	= new User($array['id'], 
									$array['email'],
									$array['password'],
									$owner,
									$accesses
						);

		///////////////////
		//  Return User  //
		///////////////////
		return $user_entity;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return AddressBook $addr_book_entity
	*/
	public function buildAddressBookFromArray($array)
	{
		/////////////////////
		//   AddressBook   //
		/////////////////////

		//houses
		$houses 		= [];
		foreach ((array)$array['houses'] as $house)
		{
			$houses[]	= new Owner($house['id'], 
									$house['name']
							);
		}

		$offices 		= [];
		foreach ((array)$array['offices'] as $office)
		{
			$offices[]	= new Office($office['id'], 
									$office['name']
							);
		}

		//alamat
		$alamat 		= new Address($array['street'],
									$array['city'],
									$array['province'],
									$array['country'],
									new LatLng($array['latitude'], $array['longitude'])
						);

		$addr_book_entity 	= new AddressBook($array['id'], 
											$houses,
											$offices,
											$alamat
							);

		////////////////////////
		// Return AddressBook //
		////////////////////////
		return $addr_book_entity;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return Personality $personality_entity
	*/
	public function buildPersonalityFromArray($array)
	{
		/////////////////
		// Personality //
		/////////////////
		//owner
		$owner			= new Owner($array['owner']['id'], 
								$array['owner']['name'] 
						);

		/////////////////
		// Personality //
		/////////////////
		$personality_entity	= new Personality($array['id'], 
									$owner,
									$array['residence'],
									$array['workplace'],
									$array['character'],
									$array['lifestyle'],
									$array['notes']
						);

		//////////////////////////
		//  Return Personality  //
		//////////////////////////
		return $personality_entity;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return Asset $asset_entity
	*/
	public function buildAssetFromArray($array)
	{
		///////////////
		//   Asset   //
		///////////////

		//houses
		$houses 		= [];
		foreach ((array) $array['houses'] as $house)
		{
			$houses[]		= new AssetHouseVO($house['ownership_status'], 
											$house['since'], 
											$house['to'],
											$house['installment'],
											$house['installment_period'],
											$house['size'],
											$house['worth']
							);
		}

		//companies
		$companies 			= [];
		foreach ((array) $array['companies'] as $company)
		{
			$companies[]	= new AssetCompanyVO($company['ownership_status'], 
									$company['share'], 
									$company['name'],
									$company['area'],
									$company['since'],
									$company['worth']
							);
		}

		//vehicles
		$vehicles 			= [];
		foreach ((array) $array['vehicles'] as $vehicle)
		{
			$vehicles[]		= new AssetVehicleVO($vehicle['four_wheels'], 
											$vehicle['two_wheels'], 
											$vehicle['worth']
							);
		}


		//owner
		$owner 				= new Owner($array['owner']['id'], 
										$array['owner']['name']
							);

		$asset_entity 		= new Asset($array['id'], 
										$owner,
										$houses,
										$vehicles,
										$companies
							);

		////////////////////
		// Return Asset //
		////////////////////
		return $asset_entity;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return Finance $finance_entity
	*/
	public function buildFinanceFromArray($array)
	{
		/////////////////
		//   Finance   //
		/////////////////

		//incomes
		$incomes 			= [];
		foreach ($array['incomes'] as $finance)
		{
			$incomes[]		= new FinanceVO($finance['description'], 
										$finance['amount']
							);
		}

		//expenses
		$expenses 			= [];
		foreach ($array['expenses'] as $finance)
		{
			$expenses[]		= new FinanceVO($finance['description'], 
										$finance['amount']
							);
		}

		//owner
		$owner 				= new Owner($array['owner']['id'], 
										$array['owner']['name']
							);

		$finance_entity 	= new Finance($array['id'], 
											$owner,
											$incomes,
											$expenses
							);

		////////////////////
		// Return Finance //
		////////////////////
		return $finance_entity;
	}
}