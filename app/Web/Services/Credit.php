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

/**
 * Kelas Credit
 *
 * Digunakan untuk pengajuan Credit.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Credit 
{
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
	 */
	public static function save($person, $finance, $asset, $credit)
	{
		//check if person alredy exists
		$person_repo 		= new PersonRepository;
		if($person instanceOf Person)
		{
			$person = $person_repo->store($person);
		}
		elseif(is_array($person))
		{
			//need to place try catch
			$registry_fact 	= new RegistryFactory;
			$person 		= $registry_fact->buildPersonFromArray((array) $person);
			$person  		= $person_repo->store($person);
		}
		else
		{
			throw new Exception("Person should be an instance of Person Entity or array of person", 1);
		}

		$credit_fact 		= new CreditFactory;
		$finance_repo 		= new FinanceRepository;
		
		//check if finance alredy exists
		if($finance instanceOf Finance)
		{
			$finance 		= $finance_repo->store($finance);
		}
		elseif(is_array($finance))
		{
			//need to place try catch
			$finance['owner']	= ['id' => $person->id, 'name' => $person->name];
			$finance 			= $credit_fact->buildFinanceFromArray((array) $finance);
			$finance 			= $finance_repo->store($finance);
		}

		$asset_repo 		= new AssetRepository;
		//check if finance alredy exists
		if($asset instanceOf Asset)
		{
			$asset 			= $asset_repo->store($asset);
		}
		elseif(is_array($asset))
		{
			//need to place try catch
			$asset['owner']		= ['id' => $person->id, 'name' => $person->name];
			$asset 				= $credit_fact->buildAssetFromArray((array) $asset);
			$asset 				= $asset_repo->store($asset);
		}

		$credit_repo 		= new CreditRepository;
		//check if finance alredy exists
		if($credit instanceOf Credit)
		{
			$credit 			= $credit_repo->store($credit);
		}
		elseif(is_array($credit))
		{
			//need to place try catch
			$credit['creditor']		= ['id' => $person->id, 'name' => $person->name];
			$credit 				= $credit_fact->buildCreditFromArray((array) $credit);
			$credit 				= $credit_repo->store($credit);
		}

		return self::merge_credit_detail($person, $finance, $asset, $credit);
	}

	/**
	 * Menampilkan semua data credit
	 *
	 * @return array $all
	 */
	public static function all()
	{
		$data 	= new CreditRepository();

		return $data->all();
	}

	/**
	 * Menampilkan semua data credit
	 *
	 * @return array $detailed
	 */
	public static function detailed($id)
	{
		$credit_repo 		= new CreditRepository();
		$person_repo 		= new PersonRepository();
		$finance_repo 		= new FinanceRepository();
		$asset_repo 		= new AssetRepository();

		$credit 			= new CreditProxy();
		$credit->credit		= $credit_repo->findByID($id);
		$credit->creditor	= $person_repo->findByID($credit->credit->creditor->id);
		$credit->finance	= $finance_repo->findByOwnerID($credit->credit->creditor->id);
		$credit->asset		= $asset_repo->findByOwnerID($credit->credit->creditor->id);

		return $credit;
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
}