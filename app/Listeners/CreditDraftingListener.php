<?php

namespace App\Listeners;

use Thunderlabid\Credit\Event\CreditDraftingEvent;

use Thunderlabid\Notification\Factory\NotificationFactory;
use Thunderlabid\Notification\Repository\NotificationRepository;

class CreditDraftingListener
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
	 * @param  CreditDraftingEvent  $event
	 * @return void
	 */
	public function handle(CreditDraftingEvent $event)
	{
		//create new draft event
		$array 		= [
						'id'			=> null,
						'description'	=> 'Pengajuan Kredit Baru sejumlah '.$event->credit->credit_amount->IDR(). ' atas nama '.$event->credit->creditor->name,
						'when'			=> 'now',
						'link'			=> route('credit.show', $event->credit->id),
						'office'		=> ['id' => $event->credit->office->id, 'name' => $event->credit->office->name],
						'labels'		=> ['drafting_credit']
		];

		$factory    = new NotificationFactory();
		$factory 	= $factory->buildFromArray($array);

		$repository	= new NotificationRepository();
		$repository->store($factory);

		return true;
	}
}
