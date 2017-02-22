<?php

namespace App\Listeners;

use Thunderlabid\Credit\Event\CreditAnalyzingEvent;

use Thunderlabid\Notification\Factory\NotificationFactory;
use Thunderlabid\Notification\Repository\NotificationRepository;

class CreditAnalyzedListener
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  CreditAnalyzingEvent  $event
	 * @return void
	 */
	public function handle(CreditAnalyzingEvent $event)
	{
		//create new draft event
		$array 		= [
						'id'			=> null,
						'description'	=> 'Pengajuan Kredit sejumlah '.$event->credit->credit_amount->IDR(). ' atas nama '.$event->credit->creditor->name. ' sudah di survey',
						'when'			=> 'now',
						'link'			=> route('survey.show', $event->credit->id),
						'office'		=> ['id' => $event->credit->office->id, 'name' => $event->credit->office->name],
						'labels'		=> ['surveyed_credit']
		];

		$factory    = new NotificationFactory();
		$factory 	= $factory->buildFromArray($array);

		$repository	= new NotificationRepository();
		$repository->store($factory);

		return true;
	}
}
