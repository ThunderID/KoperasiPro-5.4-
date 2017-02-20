<?php

namespace App\Web\Services;

//Factory
use Thunderlabid\Credit\Factory\CreditFactory;
use Thunderlabid\Registry\Factory\RegistryFactory;

//Repository
use Thunderlabid\Credit\Repository\CreditRepository;
use Thunderlabid\Credit\Repository\FinanceRepository;
use Thunderlabid\Credit\Repository\AssetRepository;
use Thunderlabid\Registry\Repository\PersonRepository;

//Entity
use Thunderlabid\Credit\Entity\Credit as CreditEntity;
use Thunderlabid\Registry\Entity\Person as PersonEntity;
use Thunderlabid\Credit\Entity\Finance as FinanceEntity;
use Thunderlabid\Credit\Entity\Asset as AssetEntity;

// Services
use App\Web\Services\Person;

use Exception;

/**
 * Kelas Credit
 *
 * Digunakan untuk pengajuan Credit.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Credit extends baseService
{
	/**
	 * Creates construct from services to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Membuat object asset baru dari data array
	 *
	 * @param string $type
	 * @param array $array
	 */
	public static function buildFromArray($type, $array)
	{
		switch (strtolower($type)) 
		{
			case 'person':
				$data 	= new RegistryFactory;
				return $data->buildPersonFromArray($array);
				break;
			case 'finance':
				$data 	= new CreditFactory;
				return $data->buildFinanceFromArray($array);
				break;
			case 'asset':
				$data 	= new CreditFactory;
				return $data->buildAssetFromArray($array);
				break;
			case 'credit':
				$data 	= new CreditFactory;
				return $data->buildCreditFromArray($array);
				break;
			default:
				throw new Exception("type should be one of these : person, finance, asset, credit", 1);
				break;
		}
	}

	/**
	 * Membuat object asset baru dari data array
	 *
	 * @param array $array
	 * @return Asset $asset

	Parameter Requirements
	1. person entity
	2. address entity
	3. warrantor entity
	4. credit entity
	5. 
	 */

	public function save()
	{
		//store warrantor
		$warrantor  	  		= Person::save($this->datas->warrantor, $this->datas->warrantor['address']);

		//store person
		$person  		  		= Person::save($this->datas->person, $this->datas->address);
		// dd($person);

		//check if person alredy exists
		$person_repo 			= new PersonRepository;
		if($person instanceOf PersonEntity)
		{
			$person_repo->store($person);
		}
		elseif(is_array($person))
		{
			//need to place try catch
			$registry_fact 		= new RegistryFactory;
			$person 			= $registry_fact->buildPersonFromArray((array) $person);
			$person_repo->store($person);
		}
		else
		{
			throw new Exception("Person should be an instance of Person Entity or array of person", 1);
		}

		//credit 
		$credit_fact 			= new CreditFactory;
		$finance_repo 			= new FinanceRepository;

		$this->datas->credit['warrantor'] 		= 	[
														'id' => $warrantor->id,
														'name' => $warrantor->name
													];

		//check if finance alredy exists
		if($this->datas->finance instanceOf FinanceEntity)
		{
			$finance_repo->store($this->datas->finance );
		}
		elseif(is_array($this->datas->finance ))
		{
			//need to place try catch
			$this->datas->finance['owner']		= 	[
														'id' => $person->id, 
														'name' => $person->name
													];
			$this->datas->finance  				= $credit_fact->buildFinanceFromArray((array) $this->datas->finance );
			$finance_repo->store($this->datas->finance );
		}

		//check if finance alredy exists
		$asset_repo 			= new AssetRepository;
		if($this->datas->asset instanceOf AssetEntity)
		{
			$asset_repo->store($this->datas->asset);
		}
		elseif(is_array($this->datas->asset))
		{
			//need to place try catch
			$this->datas->asset['owner']		= 	[
														'id' 	=> $person->id,
														'name' 	=> $person->name
													];
			$this->datas->asset 				= $credit_fact->buildAssetFromArray((array) $this->datas->asset);
			$asset_repo->store($this->datas->asset);
		}

		//check if finance alredy exists
		$credit_repo 			= new CreditRepository;
		if($this->datas->credit instanceOf CreditEntity)
		{
			$credit_repo->store($this->datas->credit);
		}
		elseif(is_array($this->datas->credit))
		{
			//need to place try catch
			$this->datas->credit['statuses']	= 	[
														[
															'status' 		=> 'pending',
											 				'description' 	=> 'Menunggu notifikasi',
											 				'date' 			=> 'today',
											 				'author'		=> [
											 					'id' 		=> TAuth::loggedUser()->id, 
											 					'name' 		=> TAuth::loggedUser()->owner->name, 
											 					'role' 		=> TAuth::activeOffice()->role
												 			] 
											 			] 
													];

			$this->datas->credit['office']		= 	[
														'id' 	=> TAuth::activeOffice()->office->id, 
														'name' 	=> TAuth::activeOffice()->office->name
													];

			$this->datas->credit['creditor']	= 	[
														'id' 	=> $person->id, 
														'name' => $person->name
													];
			$this->datas->credit 				= $credit_fact->buildCreditFromArray((array) $this->datas->credit);
			$credit_repo->store($this->datas->credit);
		}

		return self::merge_credit_detail($person, $finance, $this->datas->asset, $this->datas->credit);
	}

	/**
	 * Menampilkan semua data credit
	 *
	 * @return array $all
	 */
	public static function all($status)
	{
		$status = TAuth::allowedCreditStatus();

		$data 	= new CreditRepository();

		return $data->findByStatusInOffice($status, TAuth::activeOffice()->office->id);
	}

	/**
	 * Menampilkan semua data credit berdasarkan pencarian nama
	 *
	 * @return array $all
	 */
	public static function findByName($status, $name)
	{
		$data 	= new CreditRepository();

		return $data->findByStatusInOfficeAndName($status, TAuth::activeOffice()->office->id, $name);
	}

	/**
	 * Menampilkan semua data credit
	 *
	 * @return array $findByID
	 */
	public static function findByID($id)
	{
		$credit_repo 		= new CreditRepository();
		$person_repo 		= new PersonRepository();
		// $finance_repo 		= new FinanceRepository();
		// $asset_repo 		= new AssetRepository();

		$credit 			= new CreditProxy();
		$credit->credit		= $credit_repo->findByID($id);

		if($credit->credit && str_is($credit->credit->office->id, TAuth::activeOffice()->office->id) && in_array($credit->credit->status, TAuth::allowedCreditStatus()))
		{
			$credit->creditor	= $person_repo->findByID($credit->credit->creditor->id);
			// $credit->finance	= $finance_repo->findByOwnerID($credit->credit->creditor->id);
			// $credit->asset		= $asset_repo->findByOwnerID($credit->credit->creditor->id);

			return $credit;
		}
	
		throw new Exception(" Forbidden ", 1);
	}

	/** Private function to merge credit detail information 
	 *
	 */
	private static function merge_credit_detail($person, $finance, $asset, $credit)
	{
		$credit 			= new CreditProxy();

		$credit->credit		= $credit;
		$credit->creditor	= $person;
		$credit->finance	= $finance;
		$credit->asset		= $asset;

		return $credit;
	}

	/**
	 * Menghapus data credit tertentu
	 *
	 * @return array $delete
	 */
	public static function delete($id)
	{
		$data 		= new CreditRepository();

		$credit		= $data->findByID($id);

		return $data->delete($credit);
	}

	/**
	 * Menampilkan status yang ada dalam koperasi
	 *
	 * @return array $nav
	 */
	public static function statusLists()
	{
		return 	[
					'drafting' 		=> 'Drafting',
					'analizing' 	=> 'Analizing'
				]; 
	}
}