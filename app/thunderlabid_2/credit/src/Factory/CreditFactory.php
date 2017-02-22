<?php

namespace Thunderlabid\Credit\Factory;


/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Credit\Valueobject\Collateral as CollateralVO;
use Thunderlabid\Credit\Valueobject\Owner as OwnerVO;
use Thunderlabid\Credit\Valueobject\Author as AuthorVO;
use Thunderlabid\Credit\Valueobject\Office as OfficeVO;
use Thunderlabid\Credit\Valueobject\Status as StatusVO;
use Thunderlabid\Credit\Valueobject\CollateralLand;
use Thunderlabid\Credit\Valueobject\CollateralVehicle;
use Thunderlabid\Credit\Valueobject\CollateralBuilding;
use Thunderlabid\Credit\Valueobject\CollateralAssess;
use Thunderlabid\Credit\Valueobject\CollateralBank;
use Thunderlabid\Credit\Valueobject\Credit as CreditVO;

////////////
// Entity //
////////////
use Thunderlabid\Credit\Entity\Interfaces\IEntity;
use Thunderlabid\Credit\Entity\Credit;
use Thunderlabid\Credit\Entity\Collateral;
use Thunderlabid\Credit\Entity\EcoMacro;

/**
 * Factory Credit
 *
 * Digunakan untuk create new entity
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class CreditFactory
{
	/**
	* Membuat object baru dari data array
	*
	* @return Credit $credit_entity
	*/
	public function buildCreditFromArray($array)
	{
		////////////////
		//   Credit   //
		////////////////

		//collaterals
		$collaterals 		= [];
		foreach ($array['collaterals'] as $collateral)
		{
			//collateral
			$collaterals[]	= new CollateralVO($collateral['type'], 
									$collateral['legal'], 
									$collateral['ownership_status'] 
							);
		}

		//statuses
		$statuses 		= [];
		foreach ($array['statuses'] as $status)
		{
			$author 	= new AuthorVO($status['author']['id'],$status['author']['name'],$status['author']['role']);
			//status
			$statuses[]	= new StatusVO($status['status'], 
									$status['description'], 
									$status['date'],
									$author 
							);
		}

		//warrantor
		$warrantor			= new OwnerVO($array['warrantor']['id'], 
										$array['warrantor']['name']
							);

		//creditor
		$creditor			= new OwnerVO($array['creditor']['id'], 
										$array['creditor']['name']
							);

		//office
		$office				= new OfficeVO($array['office']['id'], 
										$array['office']['name']
							);

		////////////
		// Credit //
		////////////
		$credit_entity 		= new Credit($array['id'], 
										$creditor,
										$array['credit_amount'],
										$array['installment_capacity'],
										$array['period'],
										$array['purpose'],
										$warrantor,
										$collaterals,
										$statuses,
										$office
							);

		///////////////////
		// Return Credit //
		///////////////////
		return $credit_entity;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return StatusVO $status
	*/
	public function buildStatusFromArray($array)
	{
		////////////////
		//   Status   //
		////////////////
		$author 	= new AuthorVO($array['author']['id'],$array['author']['name'],$array['author']['role']);
		//status
		$status		= new StatusVO($array['status'], 
								$array['description'], 
								$array['date'],
								$author 
						);

		///////////////////
		// Return Credit //
		///////////////////
		return $status;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return Collateral $collateral
	*/
	public function buildCollateralFromArray($array)
	{
		////////////////
		// Collateral //
		////////////////
		//credit
		$credit 			= new CreditVO($array['credit']['id']);


		//lands
		$lands 				= [];
		foreach ((array) $array['lands'] as $land)
		{
			$value 			= new CollateralAssess($land['land_value'], $land['assessed']);

			$lands[]		= new CollateralLand($land['name'], 
											$land['address'], 
											$land['certification'],
											$land['surface_area'],
											$land['road'],
											$land['road_wide'],
											$land['location_by_street'],
											$land['environment'],
											$land['deed'],
											$land['lastest_pbb'],
											$land['insurance'],
											$land['pbb_value'],
											$land['liquidation_value'],
											$value
						);
		}

		//buildings
		$buildings 			= [];
		foreach ((array) $array['buildings'] as $building)
		{
			$value 			= new CollateralAssess(($building['land_value'] + $building['building_value']), $building['assessed']);

			$buildings[]	= new CollateralBuilding($building['name'], 
											$building['address'], 
											$building['certification'],
											$building['surface_area'],
											$building['building_area'],
											$building['building_function'],
											$building['building_shape'],
											$building['building_construction'],
											$building['floor'],
											$building['wall'],
											$building['electricity'],
											$building['water'],
											$building['telephone'],
											$building['air_conditioner'],
											$building['others'],
											$building['road'],
											$building['road_wide'],
											$building['location_by_street'],
											$building['environment'],
											$building['deed'],
											$building['lastest_pbb'],
											$building['insurance'],
											$building['pbb_value'],
											$building['liquidation_value'],
											$building['land_value'],
											$building['building_value'],
											$value
							);
		}

		//vehicles
		$vehicles 			= [];
		foreach ((array) $array['vehicles'] as $vehicle)
		{
			$value 			= new CollateralAssess($vehicle['market_value'], $vehicle['assessed']);
			$bank 			= new CollateralBank($vehicle['market_value'], $vehicle['bank']);

			$vehicles[]		= new CollateralVehicle($vehicle['merk'],
												$vehicle['type'],
												$vehicle['police_number'],
												$vehicle['color'],
												$vehicle['year'],
												$vehicle['name'],
												$vehicle['address'],
												$vehicle['bpkb_number'],
												$vehicle['machine_number'],
												$vehicle['frame_number'],
												$vehicle['valid_until'],
												$vehicle['functions'],
												$vehicle['invoice'],
												$vehicle['purchase_memo'],
												$vehicle['memo'],
												$vehicle['valid_ktp'],
												$vehicle['physical_condition'],
												$vehicle['ownership_status'],
												$vehicle['insurance'],
												$value,
												$bank
							);
		}

		//collateral
		$collateral 		= new Collateral($array['id'], 
										$credit,
										$lands,
										$buildings,
										$vehicles
							);

		///////////////////////
		// Return Collateral //
		///////////////////////
		return $collateral;
	}

	/**
	* Membuat object baru dari data array
	*
	* @return EcoMacro $eco_macro
	*/
	public function buildEcoMacroFromArray($array)
	{
		//////////////////
		//   EcoMacro   //
		//////////////////
		//credit
		$credit					= new CreditVO($array['credit']['id']);

		//////////////////////
		//   EcoMacro   //
		//////////////////////
		$eco_macro 				= new EcoMacro($array['id'], 
										$credit,
										$array['competition'],
										$array['prospect'],
										$array['turn_over'],
										$array['experience'],
										$array['risk'],
										$array['daily_customer'],
										$array['others']
								);

		/////////////////////////
		// Return EcoMacro //
		/////////////////////////
		return $eco_macro;
	}
}