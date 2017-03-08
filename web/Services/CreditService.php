<?php

namespace Thunderlabid\Application\Services;

use Thunderlabid\Application\Services\Interfaces\IService;

///////////////////
//   Repository  //
///////////////////
use Thunderlabid\Credit\Repositories\CreditRepository as Repository;
use Thunderlabid\Registry\Repositories\PersonRepository;

///////////////////
// Specification //
///////////////////
use Thunderlabid\Credit\Repositories\Specifications\SpecificationByID;
use Thunderlabid\Credit\Repositories\Specifications\PageSpecification;

use Thunderlabid\Registry\Repositories\Specifications\SpecificationByID as PersonSpecificationByID;

///////////////////
//  Transformer  //
///////////////////
use Thunderlabid\Application\DataTransformers\Credit\CreditDTODataTransformer as DataTransformer;

///////////////////
//    Factory    //
///////////////////
use Thunderlabid\Credit\Factories\VisaFactory;
use Thunderlabid\Credit\Factories\CreditFactory as Factory;

use Thunderlabid\Registry\Factories\AssetFactory;
use Thunderlabid\Registry\Factories\FinanceFactory;
use Thunderlabid\Registry\Factories\CollateralFactory;
use Thunderlabid\Registry\Factories\PersonalityFactory;
use Thunderlabid\Credit\Factories\JaminanKendaraanFactory;
use Thunderlabid\Credit\Factories\JaminanTanahBangunanFactory;

///////////////////
//     Entity    //
///////////////////
use Thunderlabid\Credit\Entities\Credit;

/**
 * Class Services Application
 *
 * Meyimpan visa dari Credit tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class CreditService implements IService
{
	private $factory;
	private $repository;
	private $transformer;

	public function __construct() 
	{
		$this->repository 			= new Repository;
		$this->factory 				= new Factory;
		$this->transformer 			= new DataTransformer;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function pengajuan($data)
	{
		$authenticator 			= new SessionBasedAuthenticator;

		//parse data koperasi
		$data['koperasi']['id']		= $authenticator->activeOffice()['office']['id'];
		$data['koperasi']['nama']	= $authenticator->activeOffice()['office']['name'];

		//parse data riwayat status
		$data['riwayat_status'][]	= [
										'status'	=> 'pengajuan',
										'tanggal'	=> date('Y-m-d'),
										'petugas'	=> 	[
															'id'	=> $authenticator->loggedUser()['id'],
															'nama'	=> $authenticator->loggedUser()['name'],
														],
									];

		//parse data status
		$data['status']				= 'pengajuan';

		//build credit factory
		$credit				= $this->factory->build(null, 
												$data['pengajuan_kredit'], 
												$data['kemampuan_angsur'], 
												$data['jangka_waktu'], 
												$data['tujuan_kredit'], 
												$data['kreditur'], 
												$data['koperasi'], 
												$data['penjamin'], 
												$data['status'], 
												$data['riwayat_status']
											);

		$saved 				= $this->repository->store($credit);

		return $this->transformer->read($saved);
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function simpanSurveyKepribadian($credit_id, $data)
	{
		//fixing 
		$credit				= $this->repository->query([new SpecificationByID($credit_id)]);

		$person_repository	= new PersonRepository;
		$person 			= $person_repository->query([new PersonSpecificationByID($credit[0]->kreditur['id'])]);

		$person 			= $person[0];

		$factory 			= new PersonalityFactory;

		$person->changeKepribadian($factory->build($data['lingkungan_tinggal'],
													$data['lingkungan_pekerjaan'],
													$data['karakter'],
													$data['pola_hidup'],
													$data['keterangan']
		));

		$saved 				= $person_repository->store($person);

		return $this->transformer->read($credit[0]);
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function simpanSurveyKeuangan($credit_id, $data)
	{
		//fixing 
		$credit				= $this->repository->query([new SpecificationByID($credit_id)]);

		$person_repository	= new PersonRepository;
		$person 			= $person_repository->query([new PersonSpecificationByID($credit[0]->kreditur['id'])]);

		$person 			= $person[0];

		$factory 			= new FinanceFactory;

		$person->changeKeuangan($factory->build($data['pendapatan'],
												$data['pengeluaran']
		));

		$saved 				= $person_repository->store($person);

		return $this->transformer->read($credit[0]);
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function simpanSurveyAset($credit_id, $data)
	{
		//fixing 
		$credit				= $this->repository->query([new SpecificationByID($credit_id)]);

		$person_repository	= new PersonRepository;
		$person 			= $person_repository->query([new PersonSpecificationByID($credit[0]->kreditur['id'])]);

		$person 			= $person[0];

		$factory 			= new AssetFactory;

		$person->changeAset($factory->build($data['rumah'],
											$data['kendaraan'],
											$data['usaha']
		));

		$saved 				= $person_repository->store($person);

		return $this->transformer->read($credit[0]);
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function tambahJaminanKendaraan($credit_id, $data)
	{
		//fixing 
		$credit				= $this->repository->query([new SpecificationByID($credit_id)]);
		$credit 			= $credit[0];

		$factory 			= new JaminanKendaraanFactory;

		$credit->addJaminanKendaraan($factory->build($data));

		$saved 				= $this->repository->store($credit);

		return $this->transformer->read($credit);
	}


	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function tambahJaminanTanahBangunan($credit_id, $data)
	{
		//fixing 
		$credit				= $this->repository->query([new SpecificationByID($credit_id)]);
		$credit 			= $credit[0];

		$factory 			= new JaminanTanahBangunanFactory;

		$credit->addJaminanTanahBangunan($factory->build($data));

		$saved 				= $this->repository->store($credit);

		return $this->transformer->read($credit);
	}

	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function read($page, $per_page = 15)
	{
		$data 						= $this->repository->query([new PageSpecification($page, $per_page)]);
		
		$user_entities 				= [];

		$transformer 				= new DataTransformer;

		foreach ($data as $key => $value) 
		{
			$user_entities[]		= $transformer->read($value);
		}

		return 	$user_entities;
	}
}
