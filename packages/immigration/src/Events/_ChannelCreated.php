<?php

namespace Thunderlabid\Immigration\Events;

use \Thunderlabid\Immigration\Events\Interfaces\IEvent;
use \Thunderlabid\Immigration\Entities\Channel;
use \Illuminate\Queue\SerializesModels;

class ChannelCreated implements IEvent
{
	use SerializesModels;

	public $channel;
	public $occur_at;

	/**
	 * Create a new event instance.
	 *
	 * @param  channel  $channel
	 * @return void
	 */
	public function __construct(Channel $channel)
	{
		$this->channel = $channel;
		$this->occur_at = \Carbon\Carbon::now();
	}
}