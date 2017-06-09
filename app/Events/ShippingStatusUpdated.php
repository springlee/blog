<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShippingStatusUpdated implements ShouldBroadcast
{
    /**
     * 物流状态更新信息.
     *
     * @var string
     */
    public $update;

    public function __construct($update)
    {
        $this->update = $update;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('order.1');
    }
}