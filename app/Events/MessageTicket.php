<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageTicket extends Event
{
    use SerializesModels;
    public $reservering = [];
    public $user = [];
    public $pdf;
    

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reservering,$user,$pdf)
    {
        $this->reservering = $reservering;
        $this->user = $user;
        $this->pdf = $pdf;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
