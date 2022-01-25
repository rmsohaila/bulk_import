<?php

namespace App\Listeners;

use App\Events\MasterDataMappedCompletedEvent;
use Illuminate\Support\Facades\Log;

class MasterDataMappedCompletedHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MasterDataMappedCompletedEvent  $event
     * @return void
     */
    public function handle(MasterDataMappedCompletedEvent $event)
    {
        Log::info('Event');
        Log::info($event->user);
    }
}
