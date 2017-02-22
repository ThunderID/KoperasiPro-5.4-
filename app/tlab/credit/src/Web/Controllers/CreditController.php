<?php 

namespace Thunderlabid\Credit\Web\Controllers;

use App\Http\Controllers\Controller;
use Credit, Input, Redirect;

class CreditController extends Controller 
{
	/**
	 * lihat Credit
	 *
	 * @return Response
	 */
	public function index()
	{
		$credit        = Credit::allCredit();
		
		return view('credit::credit.index', compact('credit'));
	}

	/**
	 * lihat Credit tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$credit        = Credit::allCredit();
		
		$credit_detail = Credit::CreditByID($id);
	
		return view('credit::credit.show', compact('credit', 'credit_detail'));
	}

	/**
	 * simpan Credit
	 *
	 * @return Response
	 */
	public function store()
	{
		$array  =   [
				'id'					=> null,
				'creditor'				=> [
					'id'				=> '123456789',
					'name'				=> 'Ulala Bumbum',
				],
				'credit_amount'			=> 9000000,
				'installment_capacity'	=> 500000,
				'period'				=> 18,
				'purpose'				=> 'Modal usaha',
				'warrantor'				=> [
					'id'				=> '234567891',
					'name'				=> 'Y Pandie',
				],
				'collaterals'			=> [
					[
						'type' 				=> 'motor', 
						'legal' 			=> 'bpkb', 
						'ownership_status' 	=> 'milik_pribadi', 
					]
				],
				'office'				=> [
					'id'				=> '589d9c415590a800073cd078',
					'name'				=> 'Thunderlab Indonesia',
				],
				'statuses'				=> [
					[
						'status' 		=> 'drafting', 
						'description' 	=> 'Menunggu notifikasi', 
						'date'		 	=> 'today', 
						'author'		=> ['id' => '123456789', 'name' => 'Yuyu Soleha', 'role' => 'Marketing'], 
					]
				],
			];

		$new_entity 	= Credit::buildThisCredit($array);

		Credit::saveThisCredit($new_entity);

		return Redirect::route('credit.index');
	}

}