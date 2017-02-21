<?php

namespace App\Web\Services;

//Factory
use Thunderlabid\Credit\Factory\CreditFactory;
use Thunderlabid\Credit\Factory\RegistryFactory;

//Repository
use Thunderlabid\Credit\Repository\CreditRepository;
use Thunderlabid\Credit\Repository\EcoMacroRepository;
use Thunderlabid\Credit\Repository\CollateralRepository;

use Thunderlabid\Registry\Repository\AssetRepository;
use Thunderlabid\Registry\Repository\PersonRepository;
use Thunderlabid\Registry\Repository\FinanceRepository;
use Thunderlabid\Registry\Repository\PersonalityRepository;

//Entity
use Thunderlabid\Registry\Entity\Person as PersonEntity;
use Thunderlabid\Credit\Entity\Credit as CreditEntity;

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
	 * Menyimpan object kredit baru dari data array
	 *
	 * @param string $array['id']
	 * @param numeric $array['credit_amount']
	 * @param numeric $array['installment_capacity']
	 * @param numeric $array['period']
	 * @param string $array['purpose']
	 * @param string $array['collaterals'][*][type]
	 * @param string $array['collaterals'][*][legal]
	 * @param string $array['collaterals'][*][ownership_status]
	 * @param PersonEntity $person
	 * @param PersonEntity $warrantor
	 * @return CreditEntity $credit_entity
	 */
	public static function new($array, PersonEntity $person, PersonEntity $warrantor)
	{
		$array['statuses']	= 	[
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

		$array['office']	= 	[
									'id' 	=> TAuth::activeOffice()->office->id, 
									'name' 	=> TAuth::activeOffice()->office->name
								];

		$array['creditor']	= 	[
									'id' 	=> $person->id, 
									'name' 	=> $person->name
								];

		if(!empty($warrantor))
		{
			$array['warrantor']	= 	[
										'id' 	=> $warrantor->id, 
										'name' 	=> $warrantor->name
									];

		}
		else
		{
			$array['warrantor']	= 	[
										'id' 	=> null, 
										'name' 	=> null
									];
		}

		$data 				= new CreditFactory;
		$data->buildCreditFromArray($array);

		$credit_repo 		= new CreditRepository;
		$credit_entity 		= $credit_repo->store($data);

		return $credit_entity;
	}

	/**
	 * Update Object
	 *
	 * @param string $type [in:status, keuangan, aset, jaminan, kepribadian, makro]
	 *
	 *
	 * @param string $array['status']['status'] 				[if:status]
	 * @param string $array['status']['description'] 			[if:status]
	 *
	 *
	 * @param string $array['incomes'][*]['description'] 		[if:keuangan]
	 * @param numeric $array['incomes'][*]['amount'] 			[if:keuangan]
	 * @param string $array['expenses'][*]['description'] 		[if:keuangan]
	 * @param numeric $array['expenses'][*]['amount'] 			[if:keuangan]
	 *
	 *
	 * @param string $array['houses'][*]['ownership_status'] 	[if:aset]
	 * @param string $array['houses'][*]['since'] 				[if:aset]
	 * @param string $array['houses'][*]['to'] 					[if:aset]
	 * @param numeric $array['houses'][*]['installment'] 		[if:aset]
	 * @param numeric $array['houses'][*]['installment_period'] [if:aset]
	 * @param numeric $array['houses'][*]['size'] 				[if:aset]
	 * @param numeric $array['houses'][*]['worth'] 				[if:aset]
	 *
	 * @param string $array['companies'][*]['ownership_status'] [if:aset]
	 * @param numeric $array['companies'][*]['share'] 			[if:aset]
	 * @param string $array['companies'][*]['name'] 			[if:aset]
	 * @param string $array['companies'][*]['area'] 			[if:aset]
	 * @param string $array['companies'][*]['since'] 			[if:aset]
	 * @param numeric $array['companies'][*]['worth'] 			[if:aset]
	 *
	 * @param numeric $array['vehicles'][*]['four_wheels'] 		[if:aset]
	 * @param numeric $array['vehicles'][*]['two_wheels'] 		[if:aset]
	 * @param numeric $array['vehicles'][*]['worth'] 			[if:aset]
	 *
	 * @param string $array['lands'][*]['name'] 				[if:jaminan]
	 * @param string $array['lands'][*]['address'] 				[if:jaminan]
	 * @param string $array['lands'][*]['certification'] 		[if:jaminan|in:hm,hgb]
	 * @param numeric $array['lands'][*]['surface_area'] 		[if:jaminan]
	 * @param string $array['lands'][*]['road'] 				[if:jaminan|in:tanah,batu,aspal]
	 * @param numeric $array['lands'][*]['road_wide'] 			[if:jaminan]
	 * @param string $array['lands'][*]['location_by_street'] 	[if:jaminan|in:sama,lebih_rendah,lebih_tinggi]
	 * @param string $array['lands'][*]['environment'] 			[if:jaminan|in:perumahan,perkantoran,kampung,pertokoan,pasar,industri]
	 * @param boolean $array['lands'][*]['deed'] 				[if:jaminan]
	 * @param boolean $array['lands'][*]['lastest_pbb'] 		[if:jaminan]
	 * @param boolean $array['lands'][*]['insurance'] 			[if:jaminan]
	 * @param numeric $array['lands'][*]['pbb_value'] 			[if:jaminan]
	 * @param numeric $array['lands'][*]['liquidation_value'] 	[if:jaminan]
	 * @param numeric $array['lands'][*]['assessed'] 			[if:jaminan]
	 * @param numeric $array['lands'][*]['land_value'] 			[if:jaminan]
	 *
	 * @param string $array['buildings'][*]['name'] 				[if:jaminan]
	 * @param string $array['buildings'][*]['address'] 				[if:jaminan]
	 * @param string $array['buildings'][*]['certification'] 		[if:jaminan|in:hm,hgb]
	 * @param numeric $array['buildings'][*]['surface_area'] 		[if:jaminan]
	 * @param string $array['buildings'][*]['building_area'] 		[if:jaminan]
	 * @param string $array['buildings'][*]['building_function'] 	[if:jaminan]
	 * @param string $array['buildings'][*]['building_shape'] 		[if:jaminan]
	 * @param string $array['buildings'][*]['building_construction'][if:jaminan]
	 * @param string $array['buildings'][*]['floor'] 				[if:jaminan]
	 * @param string $array['buildings'][*]['wall'] 				[if:jaminan]
	 * @param string $array['buildings'][*]['electricity'] 			[if:jaminan]
	 * @param string $array['buildings'][*]['water'] 				[if:jaminan]
	 * @param boolean $array['buildings'][*]['telephone'] 			[if:jaminan]
	 * @param boolean $array['buildings'][*]['air_conditioner'] 	[if:jaminan]
	 * @param string $array['buildings'][*]['others'] 				[if:jaminan]
	 * @param string $array['buildings'][*]['road'] 				[if:jaminan|in:tanah,batu,aspal]
	 * @param numeric $array['buildings'][*]['road_wide'] 			[if:jaminan]
	 * @param string $array['buildings'][*]['location_by_street'] 	[if:jaminan|in:sama,lebih_rendah,lebih_tinggi]
	 * @param string $array['buildings'][*]['environment'] 			[if:jaminan|in:perumahan,perkantoran,kampung,pertokoan,pasar,industri]
	 * @param boolean $array['buildings'][*]['deed'] 				[if:jaminan]
	 * @param boolean $array['buildings'][*]['lastest_pbb'] 		[if:jaminan]
	 * @param boolean $array['buildings'][*]['insurance'] 			[if:jaminan]
	 * @param numeric $array['buildings'][*]['pbb_value'] 			[if:jaminan]
	 * @param numeric $array['buildings'][*]['liquidation_value'] 	[if:jaminan]
	 * @param numeric $array['buildings'][*]['assessed'] 			[if:jaminan]
	 * @param numeric $array['buildings'][*]['land_value'] 			[if:jaminan]
	 * @param numeric $array['buildings'][*]['building_value'] 		[if:jaminan]
	 *
	 * @param string $array['vehicles'][*]['merk'] 				[if:jaminan]
	 * @param string $array['vehicles'][*]['type'] 				[if:jaminan]
	 * @param string $array['vehicles'][*]['police_number'] 	[if:jaminan]
	 * @param string $array['vehicles'][*]['color'] 			[if:jaminan]
	 * @param string $array['vehicles'][*]['year'] 				[if:jaminan]
	 * @param string $array['vehicles'][*]['name'] 				[if:jaminan]
	 * @param string $array['vehicles'][*]['address'] 			[if:jaminan]
	 * @param string $array['vehicles'][*]['bpkb_number']		[if:jaminan]
	 * @param string $array['vehicles'][*]['machine_number'] 	[if:jaminan]
	 * @param string $array['vehicles'][*]['frame_number'] 		[if:jaminan]
	 * @param string $array['vehicles'][*]['valid_until'] 		[if:jaminan]
	 * @param string $array['vehicles'][*]['functions'] 		[if:jaminan]
	 * @param boolean $array['vehicles'][*]['invoice'] 			[if:jaminan]
	 * @param boolean $array['vehicles'][*]['purchase_memo'] 	[if:jaminan]
	 * @param boolean $array['vehicles'][*]['memo'] 			[if:jaminan]
	 * @param boolean $array['vehicles'][*]['valid_ktp'] 		[if:jaminan]
	 * @param string $array['vehicles'][*]['physical_condition'] 	[if:jaminan|in:baik,cukup_baik,buruk]
	 * @param string $array['vehicles'][*]['ownership_status'] 		[if:jaminan|in:sendiri,orang_lain_milik_sendiri,orang_lain_dengan_surat_kuasa]
	 * @param boolean $array['vehicles'][*]['insurance'] 			[if:jaminan]
	 * @param numeric $array['vehicles'][*]['market_value'] 		[if:jaminan]
	 * @param numeric $array['vehicles'][*]['assessed'] 			[if:jaminan]
	 * @param numeric $array['vehicles'][*]['bank'] 				[if:jaminan]
	 *
	 *
	 * @param string $array['residence'][acquinted] 			[if:kepribadian|in:dikenal,kurang_dikenal,tidak_dikenal]
	 * @param string $array['workplace'][acquinted] 			[if:kepribadian|in:dikenal,kurang_dikenal,tidak_dikenal]
	 * @param string $array['character'][acquinted] 			[if:kepribadian|in:baik,cukup_baik,tidak_baik]
	 * @param string $array['lifestyle'][acquinted] 			[if:kepribadian|in:sederhana,mewah]
	 * @param string $array['notes'][*][description] 			[if:kepribadian]
	 *
	 *
	 * @param string $array['competition'] 						[if:makro|in:padat,sedang,biasa]
	 * @param string $array['prospect'] 						[if:makro|in:padat,sedang,biasa]
	 * @param string $array['turn_over'] 						[if:makro|in:padat,sedang,lambat]
	 * @param string $array['experience'] 						[if:makro]
	 * @param string $array['risk'] 							[if:makro|in:bagus,biasa,suram]
	 * @param numeric $array['daily_customer'] 					[if:makro]
	 * @param string $array['others'][*] 						[if:makro]
	 *
	 *
	 * @return CreditEntity $credit_entity
	 */
	public function update($type, $array, CreditEntity $credit)
	{
		switch (strtolower($type)) 
		{
			case 'status':
				$array['status']['date']	= 'today';
				$array['status']['author']	= 	[
								 					'id' 		=> TAuth::loggedUser()->id, 
								 					'name' 		=> TAuth::loggedUser()->owner->name, 
								 					'role' 		=> TAuth::activeOffice()->role
												];

				$status 					= new CreditFactory;
				$status->buildStatusFromArray($array['status']);

				$credit->addStatus($status);
			break;
			case 'keuangan':
				$array['owner']['id']		= $credit->creditor->id;
				$array['owner']['name']		= $credit->creditor->name;

				$finance 					= new RegistryFactory;
				$finance->buildFinanceFromArray($array);

				$finance_repo 				= new FinanceRepository;
				$finance_repo->save($finance);
			break;
			case 'aset':
				$array['owner']['id']		= $credit->creditor->id;
				$array['owner']['name']		= $credit->creditor->name;

				$asset 						= new RegistryFactory;
				$asset->buildAssetFromArray($array);

				$asset_repo 				= new AssetRepository;
				$asset_repo->save($asset);
			break;
			case 'jaminan':
				$array['credit']['id']		= $credit->id;

				$collateral 				= new CreditRepository;
				$collateral->buildCollateralFromArray($array);

				$collateral_repo 			= new CollateralRepository;
				$collateral_repo->save($collateral);
			break;
			case 'kepribadian':
				$array['owner']['id']		= $credit->creditor->id;
				$array['owner']['name']		= $credit->creditor->name;

				$personality 				= new RegistryFactory;
				$personality->buildPersonalityFromArray($array);

				$personality_repo 			= new PersonalityRepository;
				$personality_repo->save($personality);
			break;
			case 'makro':
				$array['owner']['id']		= $credit->creditor->id;
				$array['owner']['name']		= $credit->creditor->name;

				$makro 						= new CreditFactory;
				$makro->buildEcoMacroFromArray($array);

				$makro_repo 			= new EcoMacroRepository;
				$makro_repo->save($makro);
			break;
		}

		$credit_repo 			= new CreditRepository;
		$credit_repo->store($credit);

		return $credit_repo;
	}

	/**
	 * Menampilkan semua data credit
	 *
	 * @param array $status
	 * @return array $all
	 */
	public static function all($status = [])
	{
		if(empty($status))
		{
			$status 	= TAuth::allowedCreditStatus();
		}

		$data 			= new CreditRepository();

		return $data->findByStatusInOffice($status, TAuth::activeOffice()->office->id);
	}

	/**
	 * Menampilkan semua data credit berdasarkan pencarian nama
	 *
	 * @return array $all
	 */
	public static function findByName($status = [], $name)
	{
		if(empty($status))
		{
			$status 	= TAuth::allowedCreditStatus();
		}

		$data 			= new CreditRepository();

		return $data->findByStatusInOfficeAndName($status, TAuth::activeOffice()->office->id, $name);
	}

	/**
	 * Menampilkan data credit tertentu berdasarkan ID
	 *
	 * @return CreditEntity $credit_entity
	 */
	public static function findByID($id)
	{
		$credit_repo 		= new CreditRepository();
		$credit_entity		= $credit_repo->findByID($id);

		if($credit_entity && str_is($credit_entity->office->id, TAuth::activeOffice()->office->id) && in_array($credit_entity->status, TAuth::allowedCreditStatus()))
		{
			$credit			= new \Stdclass;
			$credit->credit = $credit_entity;
			
			$person 			= new PersonRepository();
			$credit->creditor 	= $person->findByID($credit_entity->creditor->id);

			return $credit;
		}
	
		throw new Exception(" Forbidden ", 1);
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
					'analyzing' 	=> 'Analyzing'
				]; 
	}
}