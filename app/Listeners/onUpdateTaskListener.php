<?php

namespace App\Listeners;

use App\Events\onUpdateTaskEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class onUpdateTaskListener
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
     * @param  onUpdateTaskEvent  $event
     * @return void
     */
    public function handle(onUpdateTaskEvent $event)
    {
        //
    }
}
