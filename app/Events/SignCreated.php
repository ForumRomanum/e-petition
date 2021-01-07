<?php

namespace App\Events;

use App\Models\Sign;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SignCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Sign
     */
    private $sign;

    /**
     * Create a new event instance.
     *
     * @param Sign $sign
     */
    public function __construct(Sign $sign)
    {
        $this->sign = $sign;
    }

    public function getSign(): Sign
    {
        return $this->sign;
    }
}
