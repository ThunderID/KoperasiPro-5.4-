<?php

namespace Thunderlabid\Credit\Service;

use Thunderlabid\Credit\Factory\CreditFactory;
use Thunderlabid\Credit\Repository\CreditRepository;

use Thunderlabid\Credit\Repository\CollateralRepository;

use Thunderlabid\Credit\Entity\Credit as CreditEntity;
use Thunderlabid\Credit\Entity\Collateral as CollateralEntity;

/**
 * Kelas Credit
 *
 * Digunakan untuk pengajuan Credit.
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Credit 
{
    /**
     * Creates a new instance of Credit
	 * @param CreditRepository $credit
	 * @param CreditFactory $factory
     */
	public function __construct(CreditRepository $credit, CollateralRepository $collateral, CreditFactory $factory)
	{
		$this->credit_repository 		= $credit;
		$this->collateral_repository 	= $collateral;
		$this->factory 					= $factory;
	}

	/**
	 * Membuat object credit baru dari data array
	 *
	 * @param array $array
	 * @return Credit $credit
	 */
	public function buildThisCredit($array)
	{
		return $this->factory->buildCreditFromArray($array);
	}

	/**
	 * Membuat object credit baru dari data array
	 *
	 * @param array $array
	 * @return Credit $credit
	 */
	public function buildThisCollateral($array)
	{
		return $this->factory->buildCollateralFromArray($array);
	}

	/**
	 * Menampilkan semua data credit
	 *
	 * @return array $all
	 */
	public function allCredit()
	{
		return $this->credit_repository->all();
	}

	/**
	 * Menampilkan semua data collateral
	 *
	 * @return array $all
	 */
	public function allCollateral()
	{
		return $this->collateral_repository->all();
	}

	/**
	 * Menampilkan data credit tertentu
	 *
	 * @return Credit $credit
	 */
	public function CreditByID($variable)
	{
		return $this->credit_repository->findByID($variable);
	}

	/**
	 * Menampilkan data collateral tertentu
	 *
	 * @return Collateral $collateral
	 */
	public function CollateralByCreditID($variable)
	{
		return $this->collateral_repository->findByCreditID($variable);
	}

	/**
	 * Menyimpan data credit
	 *
	 * @param Credit $credit
	 * @return Credit $credit
	 */
	public function saveThisCredit(CreditEntity $credit)
	{
		if($this->credit_repository->store($credit))
		{
			return $credit;
		}

		return $credit;
	}

	/**
	 * Menyimpan data collateral
	 *
	 * @param Collateral $collateral
	 * @return Collateral $collateral
	 */
	public function saveThisCollateral(CollateralEntity $collateral)
	{
		if($this->collateral_repository->store($collateral))
		{
			return $collateral;
		}

		return $collateral;
	}

	/**
	* Hapus data credit
	*
	* @param string $variable
	* @return Credit $credit
	*/
	public function deleteThisCredit($variable)
	{
		return $this->credit_repository->delete($variable);
	}
}