<?php

namespace Thunderlabid\Credit\Event;

use Thunderlabid\Credit\Entity\Credit;
use Illuminate\Queue\SerializesModels;

class CreditAcceptedEvent
{
    use SerializesModels;

    public $credit;

    /**
     * Create a new event instance.
     *
     * @param  Credit  $credit
     * @return void
     */
    public function __construct(Credit $credit)
    {
        $this->credit = $credit;
    }
}