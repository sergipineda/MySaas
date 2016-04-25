<?php

namespace App\Listeners;

use App\Events\ShoutoutAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoutoutAddedSendNotification
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
     * @param  ShoutoutAdded  $event
     * @return void
     */
    public function handle(ShoutoutAdded $event)
    {
        //
    }
}
