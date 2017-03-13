<?php

namespace Thunderlabid\Credit\Models\Traits\Policies;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait IDRTrait {
 	 	
	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatMoneyFrom($value)
	{
		list($currency,$amount) 	= array_map('trim', explode(' ', $value));

		if(!str_is(strtolower($currency), 'rp'))
		{
			throw new CurrencyException('rp', 1);
		}

		return (str_replace('.', '', $amount)) * 1;
	}

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatMoneyTo($value)
	{
		return 'Rp '.number_format($value,0, "," ,".");
	}
}